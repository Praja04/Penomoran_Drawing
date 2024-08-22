<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PdfNumberModel;
use App\Models\SubProsesModel;
use App\Models\TypeSubModel;
use App\Models\OrderDrawing;
use App\Models\JenisProject;

class AdminController extends BaseController
{
    protected $pdfNumberModel;
    protected $subProsesModel;
    protected $orderDrawing;
    protected $TypesubModel;
    protected $JenisProject;

    public function __construct()
    {
        $this->pdfNumberModel = new PdfNumberModel();
        $this->subProsesModel = new SubProsesModel();
        $this->orderDrawing = new OrderDrawing();
        $this->TypesubModel = new TypeSubModel();
        $this->JenisProject = new JenisProject();
    }

    public function getTotalMasspro()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }


        $massproCount = $this->pdfNumberModel->countMasspro();

        return $this->response->setJSON(['massproCount' => $massproCount]);
    }

    public function subproses()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetAllsubproses = $this->subProsesModel->getAllData();
        $dataPdf['All'] = $GetAllsubproses;
        return view('admin/update_subproses', $dataPdf);
    }

    public function verifikasi()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetPdf = $this->pdfNumberModel->CekPDF();
        $GetAllPdf = $this->pdfNumberModel->getAll();
        $dataPdf['data'] = $GetPdf;
        $dataPdf['All'] = $GetAllPdf;
        return view('admin/verifikasi/verifikasi', $dataPdf);
    }

    public function logbook()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetPdf = $this->pdfNumberModel->showDistinct();
        $GetAllPdf = $this->pdfNumberModel->getAll();
        $dataPdf['data'] = $GetPdf;
        $dataPdf['All'] = $GetAllPdf;
        return view('admin/logbook/logbook', $dataPdf);
    }

    public function publish()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetPdf = $this->pdfNumberModel->CekPDF();
        $GetAllPdf = $this->pdfNumberModel->getAll();
        $dataPdf['data'] = $GetPdf;
        $dataPdf['All'] = $GetAllPdf;
        return view('admin/publish/publish', $dataPdf);
    }

    public function updateHasilVerifikasi($idpdf)
    {
        // Panggil model untuk melakukan update hasil verifikasi

        $data = [
            'verifikasi_admin' => 1 // Ubah hasil verifikasi 
        ];
        $result = $this->pdfNumberModel->update($idpdf, $data);
        // Buat respons JSON
        $response = array();
        if ($result) {
            $response['success'] = true;
            $response['message'] = 'Perubahan berhasil disimpan.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Gagal menyimpan perubahan.';
        }

        // Kembalikan respons sebagai JSON
        return $this->response->setJSON($response);
    }



    public function updateHasilVerifikasi2($idpdf)
    {
        // Panggil model untuk melakukan update hasil verifikasi
        $feedback = $this->request->getPost('feedback');

        $data = [
            'feedback_admin' => $feedback,
            'verifikasi_admin' => 2,
            'status' => null
        ];
        $result = $this->pdfNumberModel->update($idpdf, $data);
        // Buat respons JSON
        $response = array();
        if ($result) {
            $response['success'] = true;
            $response['message'] = 'Perubahan berhasil disimpan.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Gagal menyimpan perubahan.';
        }

        // Kembalikan respons sebagai JSON
        return $this->response->setJSON($response);
    }


    public function resetMassproAdmin($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        // Reset status masspro
        if ($this->pdfNumberModel->resetMassproStatusAdmin($id)) {
            session()->setFlashdata('success', 'Status masspro berhasil direset.');
        } else {
            session()->setFlashdata('error', 'Gagal mereset status masspro.');
        }

        return redirect()->back();
    }

    public function create_subproses()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        try {
            $data = [
                'no_sub_proses' => $this->request->getPost('nomor_sub'),
                'jenis_sub_proses' => $this->request->getPost('jenis_sub'),
                'proses' => $this->request->getPost('proses')
            ];

            $this->subProsesModel->insert($data);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Sub Proses berhasil disimpan.']);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat memperbarui data.']);
        }
    }

    public function delete_number($idpdf)
    {
        // Verifikasi login dan peran pengguna
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }

        // Cari record berdasarkan ID
        $record = $this->pdfNumberModel->find($idpdf);

        if ($record) {
            $number = $record['number'];

            // Cari semua file dengan nomor yang sama
            $files = $this->pdfNumberModel->where('number', $number)->findAll();

            foreach ($files as $file) {
                $filePath = ROOTPATH . 'public/uploads/' . $file['pdf_path'];

                // Periksa apakah file ada dan hapus
                if (file_exists($filePath)) {
                    if (!unlink($filePath)) {
                        $response = [
                            'success' => false,
                            'message' => 'Gagal menghapus file: ' . $file['pdf_path']
                        ];
                        return $this->response->setJSON($response);
                    }
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'File tidak ditemukan: ' . $file['pdf_path']
                    ];
                    return $this->response->setJSON($response);
                }
            }

            // Hapus record dari database
            if ($this->pdfNumberModel->where('number', $number)->delete()) {
                $response = [
                    'success' => true,
                    'message' => 'Berhasil dihapus.'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Gagal menghapus record dari database.'
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Record tidak ditemukan.'
            ];
        }

        return $this->response->setJSON($response);
    }


    //update
    public function order_drawing_external()
    {

        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $Getorders = $this->orderDrawing->getExternalOrders();
        $dataPdf = [
            'externalOrders' =>  $Getorders['externalOrders'],
            'externalAllOrders' =>  $Getorders['externalAllOrders']

        ];
        return view('admin/approved_order/eksternal', $dataPdf);
    }
    public function order_drawing_internal()
    {

        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }
        $Getorders = $this->orderDrawing->getExternalOrders();
        $dataPdf = [
            'internalOrders' =>  $Getorders['internalOrders']

        ];
        return view('admin/approved_order/internal', $dataPdf);
    }

    public function terima_order()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $id_order = $this->request->getPost('id-order');
        try {
            $data = [
                'terima_order' => $this->request->getPost('terima_order')
            ];
            $this->orderDrawing->update($id_order, $data);
            // Kirim respons sukses
            return $this->response->setJSON(['message' => 'Data berhasil diperbarui!']);
        } catch (\Exception $e) {
            // Log error dan kirim pesan kesalahan ke klien
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat memperbarui data.']);
        }
    }

    public function getTotalapprove()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }


        $ApproveCount = $this->orderDrawing->countApprove();

        return $this->response->setJSON(['ApproveCount' => $ApproveCount]);
    }
    public function getTrialdrawing()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }
        $GetTrial =
            $this->orderDrawing->getTrialdrawing();
        $dataPdf['data'] = $GetTrial;
        return view('admin/publish/trial', $dataPdf);
    }

    //untuk fitur sub proses
    public function updateSubProses()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $input = $this->request->getPost();
        $data = [
            'jenis_sub_proses' => $input['sub_proses']
        ];

        $subProsesModel = new SubProsesModel();
        $result = $subProsesModel->update($input['no'], $data);

        if ($result) {
            return $this->response->setJSON(['success' => true, 'message' => 'Sub Proses updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update Sub Proses']);
        }
    }

    public function deleteSubProses($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $subProsesModel = new SubProsesModel();
        $result = $subProsesModel->delete($id);

        if ($result) {
            return $this->response->setJSON(['success' => true, 'message' => 'Sub Proses deleted successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete Sub Proses']);
        }
    }
    //fitur type sub
    public function Typesubproses()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetAllsubproses = $this->TypesubModel->getAllData();
        $dataPdf['All'] = $GetAllsubproses;
        return view('admin/update_typesubproses', $dataPdf);
    }

    public function updateTypeSubProses()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $input = $this->request->getPost();
        $data = [
            'type_sub_proses' => $input['type_sub_proses']
        ];


        $result = $this->TypesubModel->update($input['no'], $data);

        if ($result) {
            return $this->response->setJSON(['success' => true, 'message' => 'Sub Proses updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update Sub Proses']);
        }
    }

    public function deleteTypeSubProses($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $result = $this->TypesubModel->delete($id);

        if ($result) {
            return $this->response->setJSON(['success' => true, 'message' => 'Sub Proses deleted successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete Sub Proses']);
        }
    }

    public function create_typesubproses()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        try {
            $data = [
                'no_type' => $this->request->getPost('no_type'),
                'proses' => $this->request->getPost('proses'),
                'type_sub_proses' => $this->request->getPost('type_sub_proses'),
                'sub_proses' => $this->request->getPost('sub_proses')
            ];

            $this->TypesubModel->insert($data);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Sub Proses berhasil disimpan.']);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat memperbarui data.']);
        }
    }
    // Jenis Project
    public function JenisProject(){
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetAlljenisProject = $this->JenisProject->getAllData();
        $dataPdf['All'] = $GetAlljenisProject;
        return view('admin/update_jenisProject', $dataPdf);
    }
    public function createProject()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        try {
            $data = [
                'nama_project' => $this->request->getPost('nama_project')
            ];
            $this->JenisProject->insert($data);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan!']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat memasukan data.']);
            
        }
    }

    public function deletejenisProject($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $result = $this->JenisProject->delete($id);

        if ($result) {
            return $this->response->setJSON(['success' => true, 'message' => 'Deleted successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete data']);
        }
    }

    public function updatejenisProject()
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $input = $this->request->getPost();
        $data = [
            'nama_project' => $input['nama_project']
        ];

        $result = $this->JenisProject->update($input['id'], $data);

        if ($result) {
            return $this->response->setJSON(['success' => true, 'message' => 'Jenis Project updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update Jenis Project']);
        }
    }
}

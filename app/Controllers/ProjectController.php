<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PdfNumberModel;
use App\Models\SubProsesModel;
use App\Models\TypeSubModel;
use App\Models\OrderDrawing;
use App\Models\UserModel;
use App\Models\DetailProject;
use App\Models\DokumenProjectModel;
use App\Models\ProjectModel;

class ProjectController extends BaseController
{
    protected $pdfNumberModel;
    protected $subProsesModel;
    protected $orderDrawing;
    protected $TypesubModel;
    protected $UserModel;
    protected $DetailProjectModel;
    protected $ProjectModel;
    protected $DokumenProjectModel;

    public function __construct()
    {
        $this->pdfNumberModel = new PdfNumberModel();
        $this->subProsesModel = new SubProsesModel();
        $this->orderDrawing = new OrderDrawing();
        $this->TypesubModel = new TypeSubModel();
        $this->UserModel = new UserModel();
        $this->DetailProjectModel = new DetailProject();
        $this->ProjectModel = new ProjectModel();
        $this->DokumenProjectModel = new DokumenProjectModel();
    }
    public function list_project()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $data['nama'] = session()->get('nama');
        $list_project = $this->ProjectModel->getAllData();

        // Cek apakah setiap project memiliki detail
        foreach ($list_project as &$project) {
            $project['has_detail'] = $this->ProjectModel->hasDetail($project['id_project']);
        }

        $data['list_project'] = $list_project;

        return view('kasi/project/list_project', $data);
    }
    public function detail_project($id_project)
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }

        $project = $this->ProjectModel->find($id_project);

        if (!$project) {
            session()->setFlashdata('error', 'Project tidak ditemukan.');
            return redirect()->to(base_url('/project'));
        }
        $project_detail = $this->DetailProjectModel->where('id_project', $id_project)->findAll();

        $dokumen_detail = $this->DokumenProjectModel->where('id_project', $id_project)->findAll();
        $orderDrawings = [];

        foreach ($project_detail as $detail) {
            $drawings = $this->orderDrawing->where('user_id', $detail['id_drafter'])
                ->where('project', $detail['nama_project'])
                ->where('nama_part', $detail['nama_part'])
                ->findAll();
            $orderDrawings = array_merge($orderDrawings, $drawings);
        }

        // Siapkan data untuk view
        $data = [
            'data_user' => $this->UserModel->getAllData(),
            'project' => $project,
            'project_detail' => $project_detail,
            'dokumen_detail' => $dokumen_detail,
            'order_drawings' => $orderDrawings
        ];

        return view('kasi/project/detail_project', $data);
    }



    public function saveProject()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }
        // Ambil data dari form
        try {
            $user_id = session()->get('npk');
            $nama_pengaju = $this->request->getPost('nama_pengaju');
            $nama_project = $this->request->getPost('nama_project');
            $keterangan_project = $this->request->getPost('keterangan_project');

            // Siapkan data untuk disimpan
            $data = [
                'user_id' => $user_id,
                'nama_pengaju' => $nama_pengaju,
                'nama_project' => $nama_project,
                'keterangan_project' => $keterangan_project
            ];


            // Simpan data ke database
            $this->ProjectModel->save($data);

            // Redirect atau tampilkan pesan sukses
            return $this->response->setJSON(['message' => 'Create Project Berhasil !']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Data yang anda masukan tidak valid !']);
        }
    }

    public function submit_detail()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $user_id = session()->get('npk');
        try {
            // Ambil data dari request

            $nama_project = $this->request->getPost('nama_project');
            $id_project = $this->request->getPost('id_project');
            $nama_drafter = $this->request->getPost('nama_drafter');
            $id_drafter = $this->request->getPost('drafter_id');
            $nama_part = $this->request->getPost('nama_part');
            $order_from = $this->request->getPost('seksi');
            $tanggal_order = $this->request->getPost('tanggal_order');
            $tanggal_jatuh_tempo = $this->request->getPost('tanggal_jatuh_tempo');
            $keterangan = $this->request->getPost('keterangan');
            $terima_order = 'yes';
            $data = [
                'user_id' => $id_drafter,
                'nama_drafter' => $nama_drafter,
                'nama_part' => $nama_part,
                'order_from' => $order_from,
                'tanggal_order' => $tanggal_order,
                'tanggal_jatuh_tempo' => $tanggal_jatuh_tempo,
                'terima_order' => $terima_order,
                'project' => $nama_project,
                'keterangan' => $keterangan
            ];
            $data2 = [
                'user_id' => $user_id,
                'nama_drafter' => $nama_drafter,
                'nama_part' => $nama_part,
                'nama_project' => $nama_project,
                'id_project' => $id_project,
                'id_drafter' => $id_drafter,
            ];

            // Simpan data ke report_perbaikan
            $this->orderDrawing->save($data);
            $this->DetailProjectModel->save($data2);
 
            // Data untuk email
            $emaildrafter = $this->UserModel->select('email')->where('nama', $nama_drafter)->first();
            $email_to = $emaildrafter;
            $email_subject = "Project " . $nama_project . ' - PCE';
            $email_message = "Halo " . $nama_drafter . ",\n\n" .
                "Kami dengan senang hati menginformasikan bahwa Anda telah resmi ditambahkan sebagai bagian dari tim " . $nama_project . ".\n" .
                "Anda akan berperan dalam proyek ini untuk menangani part: " . $nama_part . ".\n\n" .
                "Kami berharap Anda dapat berkolaborasi dengan baik bersama seluruh anggota tim demi kesuksesan proyek ini.\n" .
                "Cek project pada link berikut https://portal3.incoe.astra.co.id/portal_pce/public/status/order\n" .
                "Jika Anda memiliki pertanyaan atau memerlukan informasi lebih lanjut, jangan ragu untuk menghubungi kami.\n\n" .
                "Terima kasih,\n" .
                "from PCE";


            // Mengirim email menggunakan API
            $api_url = "https://portal2.incoe.astra.co.id/vendor_rating_infor/api/send_email_text";

            $post_data = [
                'to' => $email_to,
                'cc' => '', // Kosongkan CC
                'subject' => $email_subject,
                'message' => $email_message
            ];

            // untuk melakukan POST request ke API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

            $response = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);

            // Cek apakah request berhasil atau ada error
            if ($error) {
                return $this->response->setJSON(['error' => 'Gagal mengirim email: ' . $error]);
            }

            return $this->response->setJSON(['message' => 'Berhasil menambahkan dan mengirim notifikasi ke email drafter!']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Data yang anda masukan tidak valid !']);
        }
    }


    public function submit_dokumen()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        try {
            // Ambil data dari request
            $nama_project = $this->request->getPost('nama_project');
            $id_project = $this->request->getPost('id_project');
            $nama_dokumen = $this->request->getPost('nama_dokumen');
            $path_dokumen = $this->request->getFile('dokumen');
            $path_dokumen_name = $path_dokumen->getRandomName();
            $path_dokumen->move(ROOTPATH . 'public/uploads/dokumen', $path_dokumen_name);

            $data = [
                'nama_project' => $nama_project,
                'nama_dokumen' => $nama_dokumen,
                'id_project' => $id_project,
                'dokumen' => $path_dokumen_name

            ];

            // Simpan data ke report_perbaikan
            $this->DokumenProjectModel->save($data);
            return $this->response->setJSON(['message' => 'Berhasil menyimpan dokumen !']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Data yang anda masukan tidak valid !']);
        }
    }

    public function delete_drafter()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }
        // Ambil data dari form POST
        try {
            $id_drafter = $this->request->getPost('id_drafter');
            $nama_project = $this->request->getPost('nama_project');
            $nama_part = $this->request->getPost('nama_part');

            $this->DetailProjectModel->deleteByFields($nama_part, $nama_project, $id_drafter);
            $this->orderDrawing->deleteByFields($nama_part, $nama_project, $id_drafter);

            return $this->response->setJSON(['message' => 'Berhasil menghapus !']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Data yang anda masukan tidak valid !']);
        }
    }

    public function delete_dokumen()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }
        // Ambil data dari form POST
        try {
            // Ambil id_dokumen dari request
            $id_dokumen = $this->request->getPost('id_dokumen');

            // Cari data dokumen berdasarkan id_dokumen
            $dokumen = $this->DokumenProjectModel->find($id_dokumen);

            if ($dokumen) {
                // Ambil nama file dokumen dari database
                $nama_file = $dokumen['dokumen'];
                $path_file = FCPATH . 'uploads/dokumen/' . $nama_file;

                // Cek apakah file dokumen ada
                if (file_exists($path_file)) {
                    // Hapus file dari direktori
                    unlink($path_file);
                }

                // Hapus data dari database
                $this->DokumenProjectModel->delete($id_dokumen);

                // Kirim respons berhasil
                return $this->response->setJSON(['message' => 'Dokumen berhasil dihapus!']);
            } else {
                // Jika dokumen tidak ditemukan
                return $this->response->setJSON(['error' => 'Dokumen tidak ditemukan!'], 404);
            }
        } catch (\Exception $e) {
            // Jika terjadi error
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat menghapus dokumen!'], 500);
        }
    }

    public function updatedetail_Project()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');
        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }
        // Ambil data dari form POST
        try {
            $id_drafter = $this->request->getPost('id_drafter');
            $nama_project = $this->request->getPost('nama_project');
            $nama_part_old = $this->request->getPost('nama_part_old');
            $nama_part_new = $this->request->getPost('nama_part_new');
            $due_date_new = $this->request->getPost('due_date_new');

            $detailProjectUpdate = $this->DetailProjectModel->updateNamaPart($id_drafter, $nama_project, $nama_part_old, $nama_part_new);

            // Cek apakah update pada tabel detail_project berhasil
            if ($detailProjectUpdate) {
                // Jika berhasil, lanjutkan update di tabel order_drawing
                $orderDrawingUpdate =
                    $this->orderDrawing->updatedetailforProject($id_drafter, $nama_project, $nama_part_old, $nama_part_new,  $due_date_new);
                // Cek apakah update pada tabel order_drawing berhasil
                if ($orderDrawingUpdate) {
                    return $this->response->setJSON(['message' => 'Data berhasil diperbarui!']);
                } else {
                    return $this->response->setJSON(['error' => 'Gagal memperbarui data di tabel order_drawing!']);
                }
            } else {
                return $this->response->setJSON(['error' => 'Gagal memperbarui data di tabel detail_project!']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Data yang anda masukan tidak valid !']);
        }
    }

    public function delete_Project()
    {
        try {
            // Ambil data dari request
            $id_project = $this->request->getPost('id_project');
            $nama_project = $this->request->getPost('nama_project');

            // Start a transaction to ensure data consistency
            $db = \Config\Database::connect();
            $db->transStart();

            // Hapus data dari tabel order_drawing berdasarkan data dari detail_project
            $details = $this->DetailProjectModel->where('id_project', $id_project)->findAll();
            foreach ($details as $detail) {
                $id_drafter = $detail['id_drafter'];
                $nama_part = $detail['nama_part'];

                // Hapus dari order_drawing
                $this->orderDrawing->where('user_id', $id_drafter)
                    ->where('project', $nama_project)
                    ->where('nama_part', $nama_part)
                    ->delete();
            }

            // Hapus data dari tabel dokumen_project dan file terkait
            $dokumenRecords = $this->DokumenProjectModel->where('id_project', $id_project)->findAll();
            foreach ($dokumenRecords as $dokumen) {
                // Hapus file fisik di direktori 
                $filePath = FCPATH . 'uploads/dokumen/' . $dokumen['dokumen'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Hapus entri dokumen 
            $this->DokumenProjectModel->where('id_project', $id_project)->delete();

            // Hapus data dari detail_project
            $this->DetailProjectModel->where('id_project', $id_project)->delete();

            // Hapus data dari project
            $this->ProjectModel->delete($id_project);

            $db->transComplete();

            if ($db->transStatus() === false) {
                // Rollback jika ada kesalahan
                return $this->response->setJSON(['error' => 'Terjadi kesalahan saat menghapus data']);
            }

            return $this->response->setJSON(['message' => 'Project berhasil dihapus!']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Data yang anda masukkan tidak valid atau terjadi kesalahan!']);
        }
    }
}

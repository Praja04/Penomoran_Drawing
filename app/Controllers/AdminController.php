<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PdfNumberModel;
use App\Models\SubProsesModel;

class AdminController extends BaseController
{
    protected $pdfNumberModel;
    protected $subProsesModel;

    public function __construct()
    {
        $this->pdfNumberModel = new PdfNumberModel();
        $this->subProsesModel = new SubProsesModel();
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

        $data = [
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

    public function update_subproses()
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
            return $this->response->setJSON(['status' => 'success', 'message' => 'Revisi berhasil disimpan.']);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat memperbarui data.']);
        }
    }

    public function delete_number($idpdf)
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/'));
        }

        $record = $this->pdfNumberModel->find($idpdf);

        if ($record) {
            $number = $record['number'];

            $files = $this->pdfNumberModel->where('number', $number)->findAll();

            foreach ($files as $file) {
                $filePath =  ROOTPATH . 'public/uploads/' . $file['pdf_path'];

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $result = $this->pdfNumberModel->where('number', $number)->delete();

            $response = array();
            $response['success'] = true;

            $response['message'] = 'Berhasil di hapus.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Record not found.';
        }

        return $this->response->setJSON($response);
    }

}

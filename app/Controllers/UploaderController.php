<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PdfNumberModel;
use App\Models\SubProsesModel;
use App\Models\TypeSubModel;

class UploaderController extends BaseController
{
    protected $pdfNumberModel;
    protected $subProsesModel;
    protected $typeSubModel;

    public function __construct()
    {
        $this->pdfNumberModel = new PdfNumberModel();
        $this->subProsesModel = new SubProsesModel();
        $this->typeSubModel = new TypeSubModel();
    }

    public function index()
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $username['nama'] = session()->get('nama');
        return view('user/pdf_number_form', $username);
    }

    public function updatePdf($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        if ($this->request->is('post')) {
            // Fetch the existing record
            $existingPdf = $this->pdfNumberModel->find($id);
            if ($existingPdf) {
                // Store the old PDF path
                $oldPdfPath = $existingPdf['pdf_path'];
                $oldFilePath = ROOTPATH . 'public/uploads/' . $oldPdfPath; // Construct the full path

                // Delete the old PDF file if it exists
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                // Handle the new file upload
                $file = $this->request->getFile('pdf_drawing');
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName(); // Generate a new random name for the file
                    $file->move(ROOTPATH . 'public/uploads/', $newName); // Move the file to the uploads directory

                    // Update the database record with the new file path
                    $this->pdfNumberModel->update($id, [
                        'pdf_path' => $newName,
                    ]);

                    // Send a JSON response to the client
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'PDF has been updated successfully.',
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Failed to upload the new file.',
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'PDF record not found.',
                ]);
            }
        }

        // If not a POST request, return an error
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid request.',
        ]);
    }

    public function revisi()
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetAllPdf = $this->pdfNumberModel->getDistinctNumbers();
        return view('user/revisi/revisi', ['numbers' => $GetAllPdf]);
    }

    public function insertPdf()
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $GetPdf = $this->pdfNumberModel->getNumbersWithoutRevisiOne();
        $dataPdf['data'] = $GetPdf;
        return view('user/table_number', $dataPdf);
    }



    public function update()
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        try {
            $pdf = new PdfNumberModel();

            // Ambil data dari POST request
            $id_pdf = $this->request->getPost('id_pdf');
            $pdf_file = $this->request->getFile('pdf_drawing');

            // Validasi file upload
            if ($pdf_file && $pdf_file->isValid() && !$pdf_file->hasMoved()) {
                // Validasi ukuran dan tipe file
                $maxSize = 15 * 1024 * 1024; // 15MB
                $allowedTypes = ['application/pdf'];

                if ($pdf_file->getSize() > $maxSize) {
                    return $this->response->setJSON(['error' => 'Ukuran file terlalu besar. Maksimal 2MB.']);
                }

                if (!in_array($pdf_file->getMimeType(), $allowedTypes)) {
                    return $this->response->setJSON(['error' => 'Format file tidak didukung. Hanya JPEG, PNG, dan GIF.']);
                }

                // Generate nama file yang unik dan pindahkan file ke folder uploads
                $pdf_file_name = $pdf_file->getRandomName();
                $pdf_file->move(ROOTPATH . 'public/uploads', $pdf_file_name);

                // Update data di database
                $data = [
                    'pdf_path' => $pdf_file_name,
                    'verifikasi_admin' => 0
                ];
                $pdf->update($id_pdf, $data);

                // Kirim respons sukses
                return $this->response->setJSON(['message' => 'Data berhasil diperbarui!']);
            } else {
                return $this->response->setJSON(['error' => 'Gagal mengunggah file.']);
            }
        } catch (\Exception $e) {
            // Log error dan kirim pesan kesalahan ke klien
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat memperbarui data.']);
        }
    }
}

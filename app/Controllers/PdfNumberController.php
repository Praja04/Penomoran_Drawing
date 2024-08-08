<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PdfNumberModel;
use App\Models\SubProsesModel;
use App\Models\TypeSubModel;

class PdfNumberController extends BaseController
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
        return view('user/pdf_number_form');
    }

    public function getsubProses()
    {
        $Proses = $this->request->getGet('proses');

        if ($Proses) {
            $items = $this->subProsesModel->getItemSub($Proses);
            return $this->response->setJSON($items);
        }

        return $this->response->setJSON(['error' => 'data tidak ada']);
    }

    public function getTypeSub()
    {
        $typeSub = $this->request->getGet('typesub');
        if ($typeSub) {
            $items = $this->typeSubModel->getItemType($typeSub);
            return $this->response->setJSON($items);
        }

        return $this->response->setJSON(['error' => 'data tidak ada']);
    }

    public function getTypeSub2()
    {
        $subProses = $this->request->getGet('subProses');
        if ($subProses) {
            $items = $this->typeSubModel->getItemType2($subProses);
            return $this->response->setJSON($items);
        }

        return $this->response->setJSON(['error' => 'data tidak ada']);
    }

    public function generateNumber()
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $nama = session()->get('nama');
        // Validasi input dan generasi nomor berdasarkan logika yang diberikan
        $nama_file = $this->request->getPost('nama_file');
        $nama_penulis = $this->request->getPost('nama_penulis');
        $group2 = $this->request->getPost('group2');
        $group3 = $this->request->getPost('group3');
        $type = $this->request->getPost('proses_produksi');
        $no_mesin = $this->request->getPost('no_mesin');
        $subProses = $this->request->getPost('sub_proses');
        $typeSub = $this->request->getPost('type_sub');
        $group2String = $this->request->getPost('group2-string');
        $group3String = $this->request->getPost('group3-string');
        $no_mesinString = $this->request->getPost('no_mesin-string');
        $subProsesString = $this->request->getPost('sub_proses-string');
        $typeSubString = $this->request->getPost('type_sub-string');

        // Pastikan variabel tidak null dan bukan array
        if (is_array($no_mesin)) {
            $no_mesin = implode('', $no_mesin); // Gabungkan elemen array menjadi string
        } elseif (is_null($no_mesin)) {
            $no_mesin = ''; // Atur ke nilai default yang sesuai
        }

        if (is_array($no_mesinString)) {
            $no_mesinString = implode('', $no_mesinString);
        } elseif (is_null($no_mesinString)) {
            $no_mesinString = '';
        }

        $no_mesin = str_pad($no_mesin, 3, '0', STR_PAD_LEFT);
        $no_mesinString = str_pad($no_mesinString, 3, '0', STR_PAD_LEFT);
        // Buat string nomor PDF berdasarkan pilihan pengguna
        $baseNumber = "$group2$group3/$subProses/$typeSub/$no_mesin";
        $baseString = "$group2String-$group3String/$subProsesString/$typeSubString/$no_mesinString";
        $pdfnumber = '';
        $pdfString = '';

        // Cari nomor yang tidak ada di tabel
        $numberFound = false;
        for ($uniqueNum = 0; $uniqueNum < 100; $uniqueNum++) {
            $uniqueNumPadded = str_pad($uniqueNum, 2, '0', STR_PAD_LEFT);
            $number = "$group2$group3/$subProses/$typeSub/$uniqueNumPadded/$no_mesin";
            $String = "$group2String-$group3String/$subProsesString/$typeSubString/$uniqueNumPadded/$no_mesinString";

            // Periksa apakah nomor ini sudah ada di tabel
            if (!$this->pdfNumberModel->checkNumberExist($number)) {
                $pdfnumber = $number;
                $pdfString = $String;
                $numberFound = true;
                break;
            }
        }

        if (!$numberFound) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tidak dapat menghasilkan nomor yang unik. Coba lagi.'
            ]);
        }

        // Simpan nomor di tabel
        $dataNumber = [
            'number' => $pdfnumber,
            'pdf_number_string' => $pdfString,
            'nama_file' => $nama_file,
            'proses_produksi' => $type,
            'nama_penulis' => $nama,
            'verifikasi_admin' => 0
        ];
        $this->pdfNumberModel->insert($dataNumber);

        // Simpan nomor di session untuk nanti digunakan saat upload PDF
        session()->set('generated_number', $pdfnumber);
        session()->set('generated_string', $pdfString);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Nomor berhasil digenerate: ' . $pdfnumber,
            'generated_number' => $pdfnumber
        ]);
    }



    public function uploadForm($id)
    {
        // Ambil data berdasarkan id
        $data = $this->pdfNumberModel->find($id);
        return view('user/pdf_upload_form', ['data' => $data]);
    }

    public function uploadPdf()
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $pdfNumberString = session()->get('generated_number');
        $pdfNumberString2 = session()->get('generated_string');
        if (!$pdfNumberString && !$pdfNumberString2) {
            return redirect()->to('/pdfnumber')->with('error', 'Anda harus memilih nomor terlebih dahulu.');
        }

        $pdf = $this->request->getFile('pdf');
        if ($pdf->isValid() && !$pdf->hasMoved()) {
            $newName = $pdf->getRandomName();
            $pdf->move(WRITEPATH . 'uploads', $newName);

            $insertData = [
                //'number' => $pdfNumberString,
                'pdf_path' => $newName,
                //'pdf_number_string' => $pdfNumberString2
            ];

            $this->pdfNumberModel->savePdfNumber($insertData);

            return redirect()->to('/pdfnumber')->with('message', 'PDF berhasil diupload.');
        } else {
            return redirect()->back()->with('error', 'Upload PDF gagal. Silahkan coba lagi.');
        }
    }

    public function revisePdfNumber($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $nama = session()->get('nama');
        // Find existing PDF entry by ID
        $existingEntry = $this->pdfNumberModel->find($id);
        if (!$existingEntry) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nomor tidak ditemukan.']);
        }

        // Handle file upload
        $pdfFile = $this->request->getFile('pdf_path');
        if ($pdfFile->isValid() && !$pdfFile->hasMoved()) {
            $pdf_file_name = $pdfFile->getRandomName();
            $pdfFile->move(ROOTPATH . 'public/uploads', $pdf_file_name);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal mengunggah file PDF.']);
        }

        // Determine the new revision number
        $lastRevision = $this->pdfNumberModel->checkNumberRevisions($existingEntry['number']);
        $newRevision = ($lastRevision && $lastRevision['revisi'] !== null) ? $lastRevision['revisi'] + 1 : 1;

        // Prepare data for update
        $data = [
            'proses_produksi' => $this->request->getPost('proses_produksi'),
            'nama_file' => $this->request->getPost('nama_file'),
            'nama_penulis' => $nama,
            'number' => $existingEntry['number'],
            'pdf_path' => $pdf_file_name,
            'pdf_number_string' => $this->request->getPost('pdf_number_string'),
            'verifikasi_admin' => 0,
            'revisi' => $newRevision,
        ];

        // Save revised PDF entry
        $this->pdfNumberModel->savePdfNumber($data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Revisi berhasil disimpan.']);
    }

    public function resetMassproStatus($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        // Reset status masspro
        if ($this->pdfNumberModel->resetMassproStatus($id)) {
            session()->setFlashdata('success', 'Status masspro berhasil direset.');
        } else {
            session()->setFlashdata('error', 'Gagal mereset status masspro.');
        }

        return redirect()->back();
    }
    public function setStatusMasspro($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        // Ubah status menjadi 'masspro'
        if ($this->pdfNumberModel->setStatusMasspro($id)) {
            session()->setFlashdata('success', 'Status berhasil diubah menjadi masspro.');
        } else {
            session()->setFlashdata('error', 'Gagal mengubah status.');
        }

        return redirect()->back();
    }

    public function getRowsByNumber($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'uploader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $pdfNumber = $this->pdfNumberModel->find($id);
        if (!$pdfNumber) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nomor tidak ditemukan.');
        }
        $number = $pdfNumber['number'];
        $data['data'] = $this->pdfNumberModel->getRowsByNumber($number);
        return view('user/revisi/revisi_numbers', $data);
    }

    public function getRowsByNumberforAdmin($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $pdfNumber = $this->pdfNumberModel->find($id);
        if (!$pdfNumber) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nomor tidak ditemukan.');
        }
        $number = $pdfNumber['number'];
        $data['data'] = $this->pdfNumberModel->getRowsByNumber($number);
        return view('admin/verifikasi/verifikasi_numbers', $data);
    }
    public function getlogbookAdmin($id)
    {
        if (!session()->get('is_login') || session()->get('role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $pdfNumber = $this->pdfNumberModel->find($id);
        if (!$pdfNumber) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nomor tidak ditemukan.');
        }
        $number = $pdfNumber['number'];
        $data['data'] = $this->pdfNumberModel->getRowsByNumber($number);
        return view('admin/logbook/logbook_numbers', $data);
    }
}

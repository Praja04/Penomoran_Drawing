<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PdfNumberModel;
class ReaderController extends BaseController
{
    protected $pdfNumberModel;

    public function __construct()
    {
        $this->pdfNumberModel = new PdfNumberModel();
    }
  
    public function listpdf()
    {
        if (!session()->get('is_login') || session()->get('role') != 'reader') {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetAllPdf = $this->pdfNumberModel->getReader();
        $dataPdf['All'] = $GetAllPdf;
        return view('reader/listpdf', $dataPdf);
    }
}

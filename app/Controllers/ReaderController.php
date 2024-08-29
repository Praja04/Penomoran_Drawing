<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PdfNumberModel;
use App\Models\OrderDrawing;

class ReaderController extends BaseController
{
    protected $pdfNumberModel;
    protected $orderDrawing;

    public function __construct()
    {
        $this->pdfNumberModel = new PdfNumberModel();
        $this->orderDrawing = new OrderDrawing();
    }

    public function listpdf()
    {
        $allowed_roles = ['reader', 'reader_pce','uploader'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetAllPdf = $this->pdfNumberModel->getReader();
        $dataPdf['All'] = $GetAllPdf;
        return view('reader/listpdf', $dataPdf);
    }
}

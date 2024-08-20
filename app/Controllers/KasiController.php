<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PdfNumberModel;
use App\Models\SubProsesModel;
use App\Models\TypeSubModel;
use App\Models\OrderDrawing;

class KasiController extends BaseController
{
    protected $pdfNumberModel;
    protected $subProsesModel;
    protected $orderDrawing;
    protected $TypesubModel;

    public function __construct()
    {
        $this->pdfNumberModel = new PdfNumberModel();
        $this->subProsesModel = new SubProsesModel();
        $this->orderDrawing = new OrderDrawing();
        $this->TypesubModel = new TypeSubModel();
    }
    public function index()
    {
        $allowed_roles = ['kasi', 'admin','uploader','reader_pce'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $drafters = $this->orderDrawing->getUniqueDrafters();

        // Prepare data for the view
        $data['courses'] = [];
        foreach ($drafters as $drafter) {
            $data['courses'][] = [
                'user_id' => $drafter['user_id'],
                'title' => $drafter['nama_drafter'],
                'days_left' => '45 Days Left', // This can be replaced with dynamic data if available
                'bg_image' => 'st-1.svg' // You can adjust or vary this as needed
            ];
        }
        $data['status'] = $this->orderDrawing->getAllStatusOrderCount();
        $data['nama'] =  session()->get('nama');
        return view('kasi/dashboard/dashboard', $data);
    }

    public function all_logbook()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetPdf = $this->pdfNumberModel->showDistinct();
        $GetAllPdf = $this->pdfNumberModel->getAll();
        $dataPdf['data'] = $GetPdf;
        $dataPdf['All'] = $GetAllPdf;

        return view('kasi/logbook/logbook', $dataPdf);
    }
    public function logbook($id)
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $pdfNumber = $this->pdfNumberModel->find($id);
        if (!$pdfNumber) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nomor tidak ditemukan.');
        }
        $number = $pdfNumber['number'];
        $data['data'] = $this->pdfNumberModel->getRowsByNumber($number);
        return view('kasi/logbook/logbook_numbers', $data);
    }
    public function publish()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetPdf = $this->pdfNumberModel->CekPDF();
        $GetAllPdf = $this->pdfNumberModel->getAll();
        $dataPdf['data'] = $GetPdf;
        $dataPdf['All'] = $GetAllPdf;
        return view('kasi/publish/publish', $dataPdf);
    }
    public function trial()
    {
        $allowed_roles = ['kasi', 'admin', 'reader_pce'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $GetTrial =
            $this->orderDrawing->getTrialdrawing();
        $dataPdf['data'] = $GetTrial;
        return view('kasi/publish/trial', $dataPdf);
    }
    public function status_order_open()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $data = [
            'status' => $this->orderDrawing->getAllStatusorderOpen()
        ];

        return view('kasi/dashboard/status_order_open', $data);
    }
    public function status_order_proses()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $data = [
            'status' => $this->orderDrawing->getAllStatusorderProses()
        ];

        return view('kasi/dashboard/status_order_proses', $data);
    }
    public function status_order_done()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $data = [
            'status' => $this->orderDrawing->getAllStatusorderDone()
        ];

        return view('kasi/dashboard/status_order_done', $data);
    }
    public function status_order_over()
    {
        $allowed_roles = ['kasi', 'admin'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }

        $data = [
            'status' => $this->orderDrawing->getAllStatusorderOver()
        ];

        return view('kasi/dashboard/status_order_over', $data);
    }

    //grafik
    public function data_order()
    {
        $allowed_roles = ['kasi', 'admin','uploader','reader_pce'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $data['status'] = $this->orderDrawing->getAllStatusOrderCount();
        return $this->response->setJSON($data['status']);
    }
    public function data_drawing()
    {
        $allowed_roles = ['kasi', 'admin','uploader','reader_pce'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $data['data'] = $this->orderDrawing->getDrawingCounts();
        return $this->response->setJSON($data['data']);
    }
    public function data_drawing_drafters()
    {
        $allowed_roles = ['kasi', 'admin','uploader','reader_pce'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $data['data'] = $this->orderDrawing->getStatusOrderCountsByDrafter();
        return $this->response->setJSON($data['data']);
    }

    public function data_drafter($user_id)
    {
        $allowed_roles = ['kasi', 'admin','uploader','reader_pce'];
        $user_role = session()->get('role');

        if (!session()->get('is_login') || !in_array($user_role, $allowed_roles)) {
            session()->setFlashdata('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            return redirect()->to(base_url('/')); // Ganti '/' dengan URL halaman yang sesuai
        }
        $data = [
            'drawing' => $this->orderDrawing->getStatusorder($user_id)
        ];
        $data['order'] = $this->orderDrawing->getTotalCountForUser($user_id);
        $data['nama'] = $this->orderDrawing->getDrafterNameByUserId($user_id);
        $data['data'] = $this->orderDrawing->getStatusOrderCount($user_id);
        return view('kasi/drafter/data_drafter', $data);
    }
}

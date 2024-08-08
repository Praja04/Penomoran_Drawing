<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDrawing extends Model
{
    protected $table            = 'order_drawing';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['user_id', 'nama_drafter', 'nama_part', 'order_from', 'tanggal_order', 'tanggal_jatuh_tempo', 'terima_order', 'status', 'keterangan', 'created_at', 'drawing_pdf', 'number_pdf'];
    public function countApprove()
    {
        return $this
            ->where('order_from', 'eksternal')
            ->where('terima_order', 'no')
            ->countAllResults();
    }
    //admin APABILA DI SET MASSPRO, BARU HILANG
    public function getTrialDrawing()
    {
        return $this->where('drawing_pdf IS NOT NULL')
            ->where('status', 'selesai')
            ->where('number_pdf IS NULL')
            ->findAll();
    }
    //drafter
    public function getStatusorder($user_id)
    {
        return $this->where('user_id', $user_id)
            ->where('terima_order', 'yes')
            ->where('number_pdf', null)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
    public function getStatusorderGenerate($user_id)
    {
        return $this->where('user_id', $user_id)
            ->where('terima_order', 'yes')
            ->where('number_pdf IS NOT NULL')
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
    public function getStatusorderOpen($user_id)
    {
        return $this->where('user_id', $user_id)
            ->where('status', 'open')
            ->where('terima_order', 'yes')
            ->findAll();
    }
    public function getStatusorderOver($user_id)
    {
        $currentDate = date('Y-m-d');

        return $this->where('user_id', $user_id)
            ->where('status !=', 'selesai')
            ->where('tanggal_jatuh_tempo <', $currentDate)
            ->findAll();
    }
    public function getStatusorderProses($user_id)
    {
        return $this->where('user_id', $user_id)
            ->where('status', 'proses')
            ->findAll();
    }
    public function getStatusorderDone($user_id)
    {
        return $this->where('user_id', $user_id)
            ->where('status', 'selesai')
            ->where('number_pdf', null)
            ->findAll();
    }
    public function getStatusOrderCount($user_id)
    {
        $statuses = ['open', 'selesai', 'proses', ''];
        $result = [];


        foreach ($statuses as $status) {
            if ($status == 'open') {
                // Count orders with status 'open' and terima_order 'yes'
                $count = $this->where('user_id', $user_id)
                    ->where('status', 'open')
                    ->where('terima_order', 'yes')
                    ->countAllResults();
            } elseif ($status == 'selesai') {
                // Count orders with status 'selesai' and number_pdf is null
                $count = $this->where('user_id', $user_id)
                    ->where('status', 'selesai')
                    ->where('number_pdf', null)
                    ->countAllResults();
            } else {
                // Count orders with the given status
                $count = $this->where('user_id', $user_id)
                    ->where('status', $status)
                    ->countAllResults();
            }
            $result[$status] = $count;
        }

        // Add overdue status count
        $currentDate = date('Y-m-d');
        $overdueCount = $this->where('user_id', $user_id)
            ->where('tanggal_jatuh_tempo <', $currentDate)
            ->where('status !=', 'selesai')
            ->countAllResults();

        $result['overdue'] = $overdueCount;

        return $result;
    }

    //admin
    public function getExternalOrders()
    {
        $externalOrders = $this->where('order_from', 'eksternal')
            ->where('terima_order', 'no')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        $externalAllOrders = $this->where('order_from', 'eksternal')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $internalOrders = $this->where('order_from', 'internal')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return [
            'externalOrders' => $externalOrders,
            'externalAllOrders' => $externalAllOrders,
            'internalOrders' => $internalOrders
        ];
    }

    //grafik

    public function getUniqueDrafters()
    {
        return $this->select('nama_drafter , user_id ')
            ->distinct()
            ->findAll();
    }

    public function getAllStatusorderOpen()
    {
        return $this
            ->where('status', 'open')
            ->where('terima_order', 'yes')
            ->findAll();
    }
    public function getAllStatusorderOver()
    {
        $currentDate = date('Y-m-d');

        return $this
            ->where('status !=', 'selesai')
            ->where('tanggal_jatuh_tempo <', $currentDate)
            ->findAll();
    }
    public function getAllStatusorderProses()
    {
        return $this
            ->where('status', 'proses')
            ->findAll();
    }
    public function getAllStatusorderDone()
    {
        return $this
            ->where('status', 'selesai')
            ->where('number_pdf', null)
            ->findAll();
    }
    public function getAllStatusOrderCount()
    {
        $statuses = ['open', 'selesai', 'proses'];
        $result = [];


        foreach ($statuses as $status) {
            if ($status == 'open') {
                // Count orders with status 'open' and terima_order 'yes'
                $count = $this
                    ->where('status', 'open')
                    ->where('terima_order', 'yes')
                    ->countAllResults();
            } elseif ($status == 'selesai') {
                // Count orders with status 'selesai' and number_pdf is null
                $count = $this
                    ->where('status', 'selesai')
                    ->where('number_pdf', null)
                    ->countAllResults();
            } else {
                // Count orders with the given status
                $count = $this
                    ->where('status', $status)
                    ->countAllResults();
            }
            $result[$status] = $count;
        }

        // Add overdue status count
        $currentDate = date('Y-m-d');
        $overdueCount = $this
            ->where('tanggal_jatuh_tempo <', $currentDate)
            ->where('status !=', 'selesai')
            ->countAllResults();

        $result['overdue'] = $overdueCount;

        return $result;
    }

    public function getDrawingCounts()
    {
        // Count for 'trial' (number_pdf is NULL)
        $trialCount = $this->where('number_pdf', NULL)->countAllResults();

        // Get the list of `number_pdf` values from `pdf_numbers` where status is 'masspro' and verifikasi_admin is 1
        $publishCount = $this->db->table('pdf_numbers')
            ->where('status', 'masspro')
            ->where('verifikasi_admin', 1)
            ->countAllResults();


        return [
            'trial' => $trialCount,
            'publish' => $publishCount,
        ];
    }

    public function getDrafterNameByUserId($user_id)
    {
        return $this->select('nama_drafter')
            ->where('user_id', $user_id)
            ->first();
    }

    public function getStatusOrderCountsByDrafter()
    {
        $currentDate = date('Y-m-d');

        // Query to get counts per drafter
        $query = $this->db->query("
        SELECT
            nama_drafter,
            SUM(CASE WHEN status = 'open' AND terima_order = 'yes' THEN 1 ELSE 0 END) AS open_count,
            SUM(CASE WHEN status = 'selesai' AND number_pdf IS NULL THEN 1 ELSE 0 END) AS selesai_count,
            SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) AS proses_count,
            SUM(CASE WHEN tanggal_jatuh_tempo < '{$currentDate}' AND status != 'selesai' THEN 1 ELSE 0 END) AS overdue_count
        FROM
            order_drawing
        GROUP BY
            nama_drafter
      ");

        // Fetch the results as an associative array
        return $query->getResultArray();
    }

    public function getTotalCountForUser($user_id)
    {
        $result = [
            'internal' => $this->where('user_id', $user_id)
                ->where('order_from', 'internal')
                ->countAllResults(),
            'eksternal' => $this->where('user_id', $user_id)
                ->where('order_from', 'eksternal')
                ->countAllResults(),
        ];

        return $result;
    }
}

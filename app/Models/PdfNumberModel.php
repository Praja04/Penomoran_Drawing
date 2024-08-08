<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class PdfNumberModel extends Model
{
    protected $table = 'pdf_numbers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['proses_produksi', 'nama_file', 'number', 'pdf_path', 'pdf_number_string', 'verifikasi_admin', 'revisi', 'status', 'nama_penulis', 'komentar', 'feedback_admin'];
    public function countMasspro()
    {
        return $this
            ->where('status', 'masspro')
            ->where('verifikasi_admin', '0')
            ->countAllResults();
    }
    public function getRowsByNumber($number)
    {
        return $this->where('number', $number)
            ->orderBy('revisi', 'ASC')
            ->findAll();
    }
    public function resetMassproStatus($id)
    {

        return $this->update($id, ['status' => 'reset']);
    }
    public function resetMassproStatusAdmin($id)
    {
        return $this->update($id, ['status' => 'null']);
    }
    public function setStatusMasspro($id)
    {
        // Fetch the record to check if it exists
        $record = $this->find($id);
        if (!$record) {
            // Record not found
            return false;
        }

        // Get the number for the record
        $number = $record['number'];

        // Update status and verifikasi_admin for all records with the same number except the one with the given ID
        $this->where('number', $number)
            ->where('id ', $id)
            ->set(['status' => null, 'verifikasi_admin' => 0])
            ->update();

        // Set status 'masspro' for the selected record
        return $this->update($id, ['status' => 'masspro']);
    }

    public function checkNumberExist($number)
    {
        return $this->where('number', $number)->where('revisi', null)->countAllResults() > 0;
    }
    public function savePdfNumber($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function CekPDF()
    {
        return $this->orderBy('created_at', 'DESC')
            ->groupStart()
            ->where('pdf_path', null)
            ->orWhere('status', null)
            ->Where('revisi', null)
            ->groupEnd()
            ->findAll();
    }
    public function getNumbersWithoutRevisiOne($namaPenulis)
    {
        $builder = $this->db->table($this->table);
        $subQuery = $this->db->table($this->table)
            ->select('number')
            ->distinct()
            ->where('revisi', 1);

        $builder->whereNotIn('number', $subQuery)
            ->orderBy('created_at', 'DESC')
            ->where('nama_penulis', $namaPenulis);

        return $builder->get()->getResultArray();
    }
    public function showDistinct()
    {
        return $this->distinct()
            ->select('*')
            ->where('revisi', null)
            ->where('pdf_path !=', null)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function checkNumberRevisions($number)
    {
        return $this->where('number', $number)->orderBy('revisi', 'DESC')->first();
    }

    public function getDistinctNumbers()
    {
        return $this->select('number, MAX(id) as id, MAX(nama_file) as nama_file, MAX(pdf_path) as pdf_path, MAX(pdf_number_string) as pdf_number_string, MAX(proses_produksi) as proses_produksi, MAX(verifikasi_admin) as verifikasi_admin, MAX(revisi) as revisi, MAX(status) as status, MAX(created_at) as created_at, MAX(nama_penulis) as nama_penulis,MAX(feedback_admin) as feedback_admin')
            ->groupBy('number')
            ->findAll();
    }


    public function getAll()
    {
        return $this->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function getReader()
    {
        return $this->select('*')
            ->where('verifikasi_admin', 1)
            ->findAll();
    }

    public function getLatestRevision($number)
    {
        $query = $this->where('number', $number)
            ->orderBy('revisi', 'DESC')
            ->first();
        return $query ? $query['revisi'] : null;
    }
    public function savePdfNumber2($data)
    {
        // Periksa apakah data ini adalah revisi atau data baru
        if (isset($data['number'])) {
            $existingRevisi = $this->getLatestRevision($data['number']);
            if ($existingRevisi !== null) {
                $data['revisi'] = $existingRevisi + 1; // Tambah 1 ke revisi sebelumnya
            } else {
                $data['revisi'] = null; // Revisi null untuk data baru
            }
        }
        $this->insert($data);
        return $this->insertID();
    }

    public function getTrialDrawing()
    {
        return $this->where('pdf_path IS NOT NULL')
            ->where('revisi IS NULL')
            ->where('status IS NULL')
            ->findAll();
    }
}

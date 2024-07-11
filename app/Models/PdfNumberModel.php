<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class PdfNumberModel extends Model
{
    protected $table = 'pdf_numbers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['proses_produksi', 'nama_file', 'number', 'pdf_path', 'pdf_number_string', 'verifikasi_admin', 'revisi', 'status', 'nama_penulis'];
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
        $record = $this->find($id);
        if (!$record) {
            // Jika tidak ada record dengan ID tersebut, kembalikan false atau lakukan tindakan yang sesuai
            return false;
        }

        $number = $record['number'];

        // Update status menjadi null untuk semua baris yang memiliki `number` yang sama, kecuali ID yang diberikan
        $this->where('number', $number)->where('id !=', $id)->set(['status' => null])->update();
        $this->where('number', $number)->where('id !=', $id)->set(['verifikasi_admin' => 0])->update();

        // Set status 'masspro' untuk entri yang dipilih
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
    public function getNumbersWithoutRevisiOne()
    {
        $sql = "
        SELECT *
        FROM pdf_numbers
        WHERE number NOT IN (
            SELECT DISTINCT number
            FROM pdf_numbers
            WHERE revisi = 1
        );
    ";

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    public function showDistinct()
    {
        return $this->orderBy('created_at', 'DESC')
            ->where('revisi', null)
            ->findAll();
    }
    public function checkNumberRevisions($number)
    {
        return $this->where('number', $number)->orderBy('revisi', 'DESC')->first();
    }

    public function getDistinctNumbers()
    {
        return $this->select('number, MAX(id) as id, MAX(nama_file) as nama_file, MAX(pdf_path) as pdf_path, MAX(pdf_number_string) as pdf_number_string, MAX(proses_produksi) as proses_produksi, MAX(verifikasi_admin) as verifikasi_admin, MAX(revisi) as revisi, MAX(status) as status, MAX(created_at) as created_at, MAX(nama_penulis) as nama_penulis')
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
}

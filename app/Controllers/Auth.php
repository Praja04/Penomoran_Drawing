<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $users;
    protected $session;
    protected $client;

    public function __construct()
    {
        $this->users = new UserModel();
        $this->session = \Config\Services::session();
        $this->client = \Config\Services::curlrequest();
    }

    public function index()
    {
        return view('login/signin');
    }

    public function proses_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Mode login melalui API
        $response = $this->client->request('POST', 'https://portal3.incoe.astra.co.id/production_control_v2/public/api/login', [
            'form_params' => [
                'username' => $username,
                'password' => $password
            ]
        ]);

        $status = $response->getStatusCode();
        $body = $response->getBody();

        if ($status == 200) {
            $data = json_decode($body, true);

            if (!empty($data)) {
                // Menentukan peran berdasarkan NPK
                $npk_kasi = [ 2331, 2593, 3651, 4171, 3659];
                $npk_admin = [3650, 1942];
                $npk_reader_pce = [3517, 2845, 570];
                $npk_uploaders = [1028, 1637, 2872, 3399]; // Daftar NPK uploader

                if (in_array($data['npk'], $npk_admin)) {
                    $role = 'admin';
                } elseif (in_array($data['npk'], $npk_uploaders)) {
                    $role = 'uploader';
                } elseif (in_array($data['npk'], $npk_kasi)) {
                    $role = 'kasi';
                } elseif (in_array($data['npk'], $npk_reader_pce)) {
                    $role = 'reader_pce';
                } else {
                    $role = 'reader';
                }

                if ($role == 'admin') {
                    // Simpan data ke sesi dan tampilkan halaman pemilihan peran
                    $this->session->set([
                        'username' => $data['username'],
                        'admin_nama' => $data['nama'],
                        'nama' => $data['nama'],
                        'npk' => $data['npk'],
                        'id_divisi' => $data['id_divisi'],
                        'divisi' => $data['divisi'],
                        'id_departement' => $data['id_departement'],
                        'departement' => $data['departement'],
                        'id_section' => $data['id_section'],
                        'section' => $data['section'],
                        'id_sub_section' => $data['id_sub_section'],
                        'sub_section' => $data['sub_section'],
                        'kode_jabatan' => $data['kode_jabatan'],
                        'role' => $role,
                        'is_login' => true
                    ]);
                    return redirect()->to(base_url('auth/pilih_role'));
                } elseif (in_array($data['npk'], $npk_uploaders)) {
                    $role = 'uploader';
                } elseif (in_array($data['npk'], $npk_kasi)) {
                    $role = 'kasi';
                } elseif (in_array($data['npk'], $npk_reader_pce)) {
                    $role = 'reader_pce';
                } else {
                    $role = 'reader';
                }

                // Menyimpan data ke sesi
                $session_data = [
                    'username' => $data['username'],
                    'nama' => $data['nama'],
                    'npk' => $data['npk'],
                    'id_divisi' => $data['id_divisi'],
                    'divisi' => $data['divisi'],
                    'id_departement' => $data['id_departement'],
                    'departement' => $data['departement'],
                    'id_section' => $data['id_section'],
                    'section' => $data['section'],
                    'id_sub_section' => $data['id_sub_section'],
                    'sub_section' => $data['sub_section'],
                    'kode_jabatan' => $data['kode_jabatan'],
                    'role' => $role,
                    'is_login' => true
                ];

                $this->session->set($session_data);

                // Redirect berdasarkan peran
                return $this->redirect_based_on_role($role);
            } else {
                $this->session->setFlashdata('error', 'Username atau password salah.');
                return redirect()->to(base_url('/'));
            }
        } else {
            // Respons tidak berhasil, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
            $this->session->setFlashdata('error', 'Username atau password salah.');
            return redirect()->to(base_url('/'));
        }
    }

    public function pilih_role()
    {
        $username = $this->request->getPost('username');
        $nama = $this->request->getPost('nama');
        $npk = $this->request->getPost('npk');
        $id_divisi = $this->request->getPost('id_divisi');
        $divisi = $this->request->getPost('divisi');
        $id_departement = $this->request->getPost('id_departement');
        $departement = $this->request->getPost('departement');
        $id_section = $this->request->getPost('id_section');
        $section = $this->request->getPost('section');
        $id_sub_section = $this->request->getPost('id_sub_section');
        $sub_section = $this->request->getPost('sub_section');
        $kode_jabatan = $this->request->getPost('kode_jabatan');

        return view('login/pilih_role', [
            'username' => $username,
            'nama' => $nama,
            'npk' => $npk,
            'id_divisi' => $id_divisi,
            'divisi' => $divisi,
            'id_departement' => $id_departement,
            'departement' => $departement,
            'id_section' => $id_section,
            'section' => $section,
            'id_sub_section' => $id_sub_section,
            'sub_section' => $sub_section,
            'kode_jabatan' => $kode_jabatan
        ]);
    }


    public function proses_pilih_role()
    {
        $role = $this->request->getPost('role');

        $this->session->set('role', $role);

        // Redirect berdasarkan peran
        return $this->redirect_based_on_role($role);
    }

    private function redirect_based_on_role($role)
    {
        if ($role == 'admin') {
            return redirect()->to(base_url('verifikasi'));
        } elseif ($role == 'uploader') {
            return redirect()->to(base_url('status/order'));
        } elseif ($role == 'kasi') {
            return redirect()->to(base_url('dashboard'));
        } elseif ($role == 'reader_pce') {
            return redirect()->to(base_url('listpdf'));
        } else {
            return redirect()->to(base_url('listpdf'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}

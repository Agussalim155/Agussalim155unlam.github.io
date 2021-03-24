<?php 

namespace App\Controllers;

use App\Models\MasukModel;

class Masuk extends BaseController
{
    protected $MasukModel;
    public function __construct()
    {
        $this->MasukModel = new MasukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pemasukan',
            'masuk' => $this->MasukModel->getMasuk()
        ];
        return view('masuk/index', $data);
    }

    public function detail($angka)
    {

        $data = [
            'title' => 'Detail Pemasukan',
            'masuk' => $this->MasukModel->getMasuk($angka)
        ];


        // jika lengkap tidak ada ditabel
        if (empty($data['masuk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Angka Pemasukan ' . $angka . 'tidak ditemukan');
        }

        return view('masuk/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Pemasukan',
            'validation' => \Config\Services::validation()
        ];


        return view('masuk/create', $data);
    }

    public function save()
    {

        $angka = url_title($this->request->getVar('angka'), '-', true);
        $this->MasukModel->save([
            'angka' => $angka,
            'tanggal' => $this->request->getVar('tanggal'),
            'uraian' => $this->request->getVar('uraian'),
            'pemasukan' => $this->request->getVar('pemasukan'),
            'saldo' => $this->request->getVar('saldo'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/masuk');
    }

    public function delete($angka)
    {
        $this->MasukModel->delete($angka);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/masuk');
    }


    public function edit($angka)
    {
        $data = [
            'title' => 'Form Ubah Data Pemasukan',
            'validation' => \Config\Services::validation(),
            'masuk' => $this->MasukModel->getMasuk($angka)
        ];


        return view('masuk/edit', $data);
    }

    public function update($angka)
    {

        // Cek Nama
        $lengkapLama = $this->MasukModel->getMasuk($this->request->getVar('angka'));
        if ($lengkapLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[lengkap.nama]';
        }


        // Validasi Edit
        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama harus diisi.',
                    'is_unique' => '{field} nama sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/masuk/edit/' . $this->request->getVar('angka'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // hapus file yang lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }
        $angka = url_title($this->request->getVar('angka'), '-', true);
        $this->MasukModel->save([
            'id' => $this->request->getVar('id'),
            'angka' => $angka,
            'tanggal' => $this->request->getVar('tanggal'),
            'uraian' => $this->request->getVar('uraian'),
            'pemasukan' => $this->request->getVar('pemasukan'),
            'saldo' => $this->request->getVar('saldo'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/masuk');
    }

        public function mate()
    {
        $data = [
            'title' => 'Cetak 4.0',
            'masuk' => $this->MasukModel->getMasuk()
            // 'pegawai' => $this->PegawaiModel->getPegawai($slug)
        ];
        return view('masuk/mate',$data);
    }
}
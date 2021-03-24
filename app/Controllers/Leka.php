<?php 

namespace App\Controllers;

use App\Models\LekaModel;

class Leka extends BaseController
{
    protected $LekaModel;
    public function __construct()
    {
        $this->LekaModel = new LekaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pelengkapan',
            'leka' => $this->LekaModel->getLeka()
        ];
        return view('leka/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Pelengkapan',
            'leka' => $this->LekaModel->getLeka($slug)
        ];


        // jika pegawai tidak ada ditabel
        if (empty($data['leka'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama barang ' . $slug . 'tidak ditemukan');
        }

        return view('leka/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Pelengkapan',
            'validation' => \Config\Services::validation()
        ];


        return view('leka/create', $data);
    }

    public function save()
    {


        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[pegawai.nama]',
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
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/leka/create')->withInput();
        }

        // Ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->LekaModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'leka' => $this->request->getVar('leka'),
            'jumlah' => $this->request->getVar('jumlah'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/leka');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $leka = $this->LekaModel->find($id);

        // cek jika file gambarnya default.jpg
        if ($leka['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $leka['sampul']);
        }

        $this->LekaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/leka');
    }


    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Pelengkapan',
            'validation' => \Config\Services::validation(),
            'leka' => $this->LekaModel->getLeka($slug)
        ];


        return view('leka/edit', $data);
    }

    public function update($id)
    {

        // Cek Nama
        $lekaLama = $this->LekaModel->getLeka($this->request->getVar('slug'));
        if ($lekaLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[leka.nama]';
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
            return redirect()->to('/leka/edit/' . $this->request->getVar('slug'))->withInput();
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
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->LekaModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'leka' => $this->request->getVar('leka'),
            'jumlah' => $this->request->getVar('jumlah'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/leka');
    }

        public function windows()
    {
        $data = [
            'title' => 'Cetak 2.0',
            'leka' => $this->LekaModel->getLeka()
            // 'pegawai' => $this->PegawaiModel->getPegawai($slug)
        ];
        return view('leka/windows',$data);
    }
}
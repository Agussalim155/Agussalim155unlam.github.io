<?php 

namespace App\Controllers;

use App\Models\GajiModel;

class Gaji extends BaseController
{
    protected $GajiModel;
    public function __construct()
    {
        $this->GajiModel = new GajiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Penggajian',
            'gaji' => $this->GajiModel->getGaji()
        ];
        return view('gaji/index', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Detail Pelengkapan',
            'gaji' => $this->GajiModel->getGaji($id)
        ];


        // jika gaji(Karyawan) tidak ada ditabel
        if (empty($data['gaji'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Karyawan ' . $id . 'tidak ditemukan');
        }

        return view('gaji/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Penggajian',
            'validation' => \Config\Services::validation()
        ];


        return view('gaji/create', $data);
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
            return redirect()->to('/gaji/create')->withInput();
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

        $jenis = url_title($this->request->getVar('jenis'), '-', true);
        $this->GajiModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $this->request->getVar('slug'),
            'jenis' => $jenis,
            // 'jumlah' => $this->request->getVar('jumlah'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/gaji');
    }

    public function delete($jenis)
    {
        // cari gambar berdasarkan jenis$jenis
        $lengkap = $this->GajiModel->find($jenis);

        // cek jika file gambarnya default.jpg
        if ($lengkap['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $lengkap['sampul']);
        }

        $this->GajiModel->delete($jenis);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/gaji');
    }


    public function edit($jenis)
    {
        $data = [
            'title' => 'Form Ubah Data Penggajian',
            'validation' => \Config\Services::validation(),
            'gaji' => $this->GajiModel->getGaji($jenis)
        ];


        return view('gaji/edit', $data);
    }

    public function update($id)
    {

        // Cek Nama
        $lengkapLama = $this->GajiModel->getGaji($this->request->getVar('id'));
        if ($lengkapLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[gaji.nama]';
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
            return redirect()->to('/gaji/edit/' . $this->request->getVar('slug'))->withInput();
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
        $jenis = url_title($this->request->getVar('jenis'), '-', true);
        $this->GajiModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $this->request->getVar('slug'),
            'jenis' => $jenis,
            // 'jumlah' => $this->request->getVar('jumlah'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/gaji');
    }

        public function gaji()
    {
        $data = [
            'title' => 'Cetak 4.0',
            'gaji' => $this->GajiModel->getGaji()
            // 'pegawai' => $this->PegawaiModel->getPegawai($slug)
        ];
        return view('gaji/gaji',$data);
    }
}
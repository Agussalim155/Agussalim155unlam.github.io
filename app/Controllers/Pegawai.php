<?php 

namespace App\Controllers;

use App\Models\PegawaiModel;
use Mpdf\Mpdf;
use TCPDF;

use CodeIgniter\CLI\CLI;

class Pegawai extends BaseController
{
    protected $PegawaiModel;
    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pegawai',
            'pegawai' => $this->PegawaiModel->getPegawai()
        ];
        return view('pegawai/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Pegawai',
            'pegawai' => $this->PegawaiModel->getPegawai($slug)
        ];


        // jika pegawai tidak ada ditabel
        if (empty($data['pegawai'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama pegawai ' . $slug . 'tidak ditemukan');
        }

        return view('pegawai/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Pegawai',
            'validation' => \Config\Services::validation()
        ];


        return view('pegawai/create', $data);
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
            return redirect()->to('/pegawai/create')->withInput();
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
        $this->PegawaiModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'nrp' => $this->request->getVar('nrp'),
            'alamat' => $this->request->getVar('alamat'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/pegawai');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $pegawai = $this->PegawaiModel->find($id);

        // cek jika file gambarnya default.jpg
        if ($pegawai['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $pegawai['sampul']);
        }

        $this->PegawaiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/pegawai');
    }


    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Pegawai',
            'validation' => \Config\Services::validation(),
            'pegawai' => $this->PegawaiModel->getPegawai($slug)
        ];


        return view('pegawai/edit', $data);
    }

    public function update($id)
    {

        // Cek Nama
        $pegawaiLama = $this->PegawaiModel->getPegawai($this->request->getVar('slug'));
        if ($pegawaiLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[pegawai.nama]';
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
            return redirect()->to('/pegawai/edit/' . $this->request->getVar('slug'))->withInput();
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
        $this->PegawaiModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'nrp' => $this->request->getVar('nrp'),
            'alamat' => $this->request->getVar('alamat'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/pegawai');
    }

    public function print()
    {
// for ($k = 0; $k <= 10; $k++)
// {
//     CLI::print($k);
// }
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world !</h1>');
    $mpdf->Output();
    // $PegawaiModel = new PegawaiModel();
    // $data['pegawai'] = $PegawaiModel->getPegawai()->getResult();
    return view('windows', $data);
    }
}
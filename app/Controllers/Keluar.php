<?php 

namespace App\Controllers;

use App\Models\KeluarModel;

class Keluar extends BaseController
{
    protected $KeluarModel;
    public function __construct()
    {
        $this->KeluarModel = new KeluarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengeluaran',
            'keluar' => $this->KeluarModel->getKeluar()
        ];
        return view('keluar/index', $data);
    }

    public function detail($nomor)
    {

        $data = [
            'title' => 'Detail Pengeluaran',
            'keluar' => $this->KeluarModel->getKeluar($nomor)
        ];


        // jika lengkap tidak ada ditabel
        if (empty($data['keluar'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nomor Pengeluaran ' . $nomor . 'tidak ditemukan');
        }

        return view('keluar/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Pengeluaran',
            'validation' => \Config\Services::validation()
        ];


        return view('keluar/create', $data);
    }

    public function save()
    {

        $nomor = url_title($this->request->getVar('nomor'), '-', true);
        $this->KeluarModel->save([
            'nomor' => $nomor,
            'tanggal' => $this->request->getVar('tanggal'),
            'uraian' => $this->request->getVar('uraian'),
            'pengeluaran' => $this->request->getVar('pengeluaran'),
            'saldo' => $this->request->getVar('saldo'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/keluar');
    }

    public function delete($nomor)
    {
        $this->KeluarModel->delete($nomor);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/keluar');
    }


    public function edit($nomor)
    {
        $data = [
            'title' => 'Form Ubah Data Pengeluaran',
            'validation' => \Config\Services::validation(),
            'keluar' => $this->KeluarModel->getKeluar($nomor)
        ];


        return view('keluar/edit', $data);
    }

    public function update($nomor)
    {
        $nomor = url_title($this->request->getVar('nomor'), '-', true);
        $this->MasukModel->save([
            'id' => $this->request->getVar('id'),
            'nomor' => $nomor,
            'tanggal' => $this->request->getVar('tanggal'),
            'uraian' => $this->request->getVar('uraian'),
            'pengeluaran' => $this->request->getVar('pengeluaran'),
            'saldo' => $this->request->getVar('saldo'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/keluar');
    }

    public function kate()
    {
        $data = [
            'title' => 'Cetak 5.0',
            'keluar' => $this->KeluarModel->getKeluar()
            // 'pegawai' => $this->PegawaiModel->getPegawai($slug)
        ];
        return view('keluar/kate',$data);
    }
}
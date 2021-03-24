<?php namespace App\Controllers;

use App\Models\LekaModel;
use App\Models\PegawaiModel;

class Pager extends BaseController
{
    protected $LekaModel;
    protected $PegawaiModel;
    public function __construct()
    {
        $this->LekaModel = new LekaModel();
        $this->PegawaiModel = new PegawaiModel();
    }
	public function halo()
	{
        $data = [
            'title' => 'Home | WebProgrammingUniska'
        ];
		return view('pager/index', $data);
	}

	public function about()
    {
        $data = [
            'title' => 'About Us'
        ];


        return view('pager/about', $data);
	}
	
	public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jln Malkon Temon No. 1',
                    'kota' => 'Banjarmasin'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jln Hasan Basri No. 47',
                    'kota' => 'Banjarmasin'
                ]
            ]
        ];

        return view('pager/contact', $data);
	}
	
	public function home()
    {
        $data = [
            'title' => 'Home'
        ];


        return view('pager/home', $data);
	}

    public function windows()
    {
        $data = [
            'title' => 'Cetak 1.0',
            'pegawai' => $this->PegawaiModel->getPegawai()
            // 'pegawai' => $this->PegawaiModel->getPegawai($id)
        ];
        return view('pager/windows',$data);
    }

    public function print()
    {
        $data = [
            'title' => 'Cetak 3.0',
            'leka' => $this->LekaModel->getLeka()
            // 'pegawai' => $this->PegawaiModel->getPegawai($slug)
        ];
        return view('pager/print',$data);
    }


}
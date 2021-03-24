<?php namespace App\Controllers;

class Cetak extends BaseController
{
	public function print()
	{
		$data = [
            'title' => 'Cetak 2.0'
        ];
		return view('print/index', $data);
	}

	//--------------------------------------------------------------------

}
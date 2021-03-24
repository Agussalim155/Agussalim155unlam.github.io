<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

class Mypdf
{
	protected $ci;

	public function __construct()
	{
		// $this->ci =& get_instance();
	}

	public function generate($view, $data = array(), $filename = 'laporan', $paper ='A4', $orientation = 'landscape')
	{
		$options = new Options();
		$options->set('isRemoteEnabled',TRUE);
		$dompdf = new Dompdf($options);
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
	    $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
	}
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('/xampp/htdocs/absen/assets/classes/tcpdf/config/lang/eng.php');
require_once('/xampp/htdocs/absen/assets/classes/tcpdf/tcpdf.php');
//require_once('/home/boboy/public_html/absen/assets/classes/tcpdf/config/lang/eng.php');
//require_once('/home/boboy/public_html/absen/assets/classes/tcpdf/tcpdf.php');
//require_once(APPPATH.'classes/eng.php');
//require_once(APPPATH.'classes/tcpdf.php');
//require_once dirname(__FILE__).'/assets/classes/tcpdf/config/lang/eng.php';
//require_once dirname(__FILE__).'/assets/classes/tcpdf/tcpdf.php';

class Mypdf extends TCPDF
{

	function Mypdf()
	{
		parent::__construct(PDF_PAGE_ORIENTATION, 'mm', 'F4', true, 'UTF-8', false);
	}

	//Page header
	public function Header()
	{
		// Logo
		//dihapus
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 12);
		// Title
		//$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	//Page Footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 10);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, '', 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}

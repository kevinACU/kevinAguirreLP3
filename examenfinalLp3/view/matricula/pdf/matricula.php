<?php
/**
 * Html2Pdf Library - Estudiantes
 * HTML => PDF converter
 **/
ob_end_clean(); // Limpia cualquier salida anterior
ob_start(); // Inicia el buffer para capturar la salida del contenido
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
require_once(ROOT_PATH.'vendor/autoload.php');

require_once(CONTROLLER_PATH.'matriculaController.php');
$object = new matriculaController ();
$rows = $object->select();

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
   ob_start();
   include dirname(__FILE__).'/doc/matricula_html.php';
   $content = ob_get_clean();

   $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', 3);
   $html2pdf->pdf->SetDisplayMode('fullpage');
   $html2pdf->writeHTML($content);
   $html2pdf->output('matricula.pdf');
} catch (Html2PdfException $e) {
   $html2pdf->clean();

   $formatter = new ExceptionFormatter($e);
   echo $formatter->getHtmlMessage();
}

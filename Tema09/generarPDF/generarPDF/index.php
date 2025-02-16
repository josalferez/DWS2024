<?php 

require __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = '<h1>Voy a generar un documento pdf a partir de un html.</h1>
<br> Hola';

$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("documento.pdf", array("Attachment" => false));
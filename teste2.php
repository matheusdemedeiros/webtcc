<?php 

require __DIR__.'/vendor/autoload.php';
use SGH\PdfBox\PdfBox;

$pdf = 'declaracao.php';
$converter = new PdfBox;
$converter->setPathToPdfBox('/usr/bin/pdfbox-2.0.17.jar');
$text = $converter->textFromPdfStream($pdf);
$html = $converter->htmlFromPdfStream($pdf);
$dom  = $converter->domFromPdfStream($pdf);
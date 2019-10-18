<?php 
// require __DIR__.'/vendor/autoload.php';

// use Spipu\Html2Pdf\Html2Pdf;
// use Spipu\Html2Pdf\Exception\Html2PdfException;
// use Spipu\Html2Pdf\Exception\ExceptionFormatter;

// ob_start();
// include dirname(__FILE__).'/declaracao.php';
// $content = ob_get_clean();
// $html2pdf = new Html2Pdf('P', 'A4', 'fr');
// $html2pdf->pdf->SetDisplayMode('fullpage');
// $html2pdf->writeHTML($content);
// $html2pdf->output('declaracaoteste.pdf');
// $html2pdf->clean();
$password="Naruto";
echo "Sem criptografia ".$password;

$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
echo "Criptografado: ".$hashPassword;

if(password_verify($password,$hashPassword)){
    echo "Password verified";
}
else{
    echo "Wrong Password";
}
?>
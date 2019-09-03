
<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    

    mysqli_query($conexao, "update area set NameArea ='$recnome' where IdArea='$recid'");
    header("location:listagemAreaAtuacao.php");
?>

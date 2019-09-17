
<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recemail = $_POST['email'];
    $recarea_atuacao = $_POST['area_atuacao'];
    $recsenha = $_POST['password'];
    

    mysqli_query($conexao, "update advisor set NameAdvisor ='$recnome', 
    OccupationArea='$recarea_atuacao',
    Email='$recemail', Password='$recsenha'
    where IdAdvisor='$recid'");
    header("location:listagemOrientadores.php");
?>

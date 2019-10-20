
<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recemail = $_POST['email'];
    $recarea_atuacao = $_POST['area_atuacao'];
    
    $matricula=$_POST["matricula"];
    

    mysqli_query($conexao, "update advisor set NameAdvisor ='$recnome', 
    OccupationArea='$recarea_atuacao',
    Siapei='$matricula'
    where IdAdvisor='$recid'");

    $id=mysqli_query($conexao,"Select * from advisor where IdAdvisor='$recid'");
    $id_user=mysqli_fetch_array($id);
    mysqli_query($conexao,"update users 
    set Email='$recemail' where IdUser='$id_user[UserId]'");

    header("location:listagemOrientadores.php");
?>

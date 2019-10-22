<?php 
    include("conecta.php");
    $id_area=$_GET["idexc"];

    $verifica_tcc=mysqli_query($conexao,"SELECT * FROM termpaper inner join area
    WHERE IdArea='$id_area' AND AreaId=IdArea");
    $tcc=mysqli_fetch_array($verifica_tcc);
   
    $verifica_orientador=mysqli_query($conexao,"SELECT * FROM advisor inner join area
    WHERE OccupationArea='$id_area' AND IdArea=OccupationArea");
    $orientador=mysqli_fetch_array($verifica_orientador);
   
    
    if($orientador==NULL && $tcc==NULL ){
      
        mysqli_query($conexao, "DELETE FROM area WHERE IdArea = '$id_area'");
        header("location:listagemAreaAtuacao.php?remove=1");
    }else{
      header("location:listagemAreaAtuacao.php?remove=0");
    }
    
  ?>

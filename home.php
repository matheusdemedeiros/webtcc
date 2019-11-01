<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
<header>
    <title>
    Página Inicial
    </title>



    <div class="navbar-fixed">
        <nav style="background-color: #00e676">
            <div class="nav-wrapper">
                <img  src="img/IFSC.png" class="brand-logo">
                <ul class="right hide-on-med-and-down">
               
                    <li><a href="home.php">Home</a></li>
                    <li><a href="listagemAlunos.php">Gerenciar Aluno</a></li>
                    <li><a href="listagemAreaAtuacao.php">Gerenciar Área Atuação</a></li>
                    <li><a href="listagemCurso.php">Gerenciar Curso</a></li>
                    <li><a href="listagemOrientadores.php">Gerenciar Orientador</a></li>
                    <li><a href="listagemProfessorTCC.php">Gerenciar Professor de TCC</a></li>
                    <li><a href="listagemTCC.php">Gerenciar TCC</a></li>
                    <li><a href="logout.php">Sair</a></li>
                </ul>
            </div>

        </nav>
    </div>
</header>
    <?php 
		
        include("conecta.php");
        session_start();
        $id_user = $_SESSION['name_session'];
        if(isset($_SESSION['name_session'])){
            ?>
            <div class="container">
            <?php  
           
            $professor_tcc=mysqli_query($conexao,"SELECT NameTermPaperTeacher FROM termpaperteacher
            WHERE '$id_user' = UserId"); 
            $nome_professor_tcc=mysqli_fetch_array($professor_tcc);?>
            <h5><strong><?=$nome_professor_tcc['NameTermPaperTeacher']?></strong>, seja bem vindo!!<h5>
        </div>
        <?php
            
        }
	?>
  
    <div class ="container">
        <img src="img/ifsc-lages.jpg">
    </div>
    <?php include("rodape.php"); ?>

</body>

</html>

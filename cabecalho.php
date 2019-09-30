<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

</head>
<header>
    <title>
        <?php print $cabecalho_title; ?>
    </title>



    <div class="navbar-fixed">
        <nav style="background-color: #00e676">
            <div class="nav-wrapper">
                <!-- <img src="img/IFSC.png" class="brand-logo"> -->
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Principal</a></li>
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

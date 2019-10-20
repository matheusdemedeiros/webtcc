<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina de Cadastro</title>
  

    
</head>

<body>
    <?php 
		$cabecalho_title = "Cadastro Aluno";
		include("cabecalho.php");
        include("conecta.php");
        $recid = $_GET['editaid'];
        $seleciona = mysqli_query($conexao, "SELECT * FROM student INNER JOIN
        users  WHERE IdStudent = '$recid' AND IdUser=UserId");
        $campo = mysqli_fetch_array($seleciona);
		?>
    <div class="container">
        <form class="container" name="formuser" action="gravaEditaAluno.php" method="POST">

            <fieldset class="container">
                <h5>Edição de aluno</h5>
                <input type="hidden" name="fid" value="<?=$campo["IdStudent"]?>">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome" autofocus required value="<?=$campo["NameStudent"]?>">
                        <label for="nome">Nome completo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">

                        <input type="email" id="email" name="email" autofocus required value="<?=$campo["Email"]?>">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="registration" name="registration" autofocus required value="<?=$campo["Registration"]?>">
                        <label for="registration">Matrícula</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select id="curso" name="curso" class="browser-default" autofocus required>
                            <option value="" disabled selected>Curso</option>
                            <?php
                                include("conecta.php");
                                $dados = mysqli_query($conexao, "SELECT * FROM course ORDER BY NameCourse"); 
                                while ($curso = mysqli_fetch_array($dados)){    
                            ?>        
                            <option value="<?=$curso["IdCourse"]?>"><?=$curso["NameCourse"]?></option>       
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>
                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar" />
            </fieldset>

        </form>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>

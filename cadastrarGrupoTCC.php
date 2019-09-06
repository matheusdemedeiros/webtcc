<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   
</head>
<body>
<?php 
		$cabecalho_title = "Cadastro de Grupo de TCC";
		include("cabecalho.php"); 
		?>
        <div class="container">
            <form name="formuser" action="inserirGrupoTCC.php" method="post">
                <fieldset class="container">
                <h5>Filtrar por Curso</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <select id="curso" name="curso" class="browser-default">
                            <option value="" disabled selected>Aluno</option>
                            <?php
                                include("conecta.php");
                                $curso = $_POST['curso'];
                                $dados = mysqli_query($conexao, "SELECT * FROM student
                                INNER JOIN course
                                WHERE CourseId=IdCourse
                                AND CourseId='$curso'
                                ORDER BY NameCourse"); 
                                while ($aluno = mysqli_fetch_array($dados)){    
                            ?>        
                            <option value="<?=$aluno["IdStudent"]?>"><?=$aluno["NameStudent"]?></option>       
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select id="curso" name="curso" class="browser-default">
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
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar"/>
                </fieldset>
            </form>
        </div>
        <?php include("rodape.php"); ?>
</body>
</html>
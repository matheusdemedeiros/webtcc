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
        <form name="formuser" action="inserirGrupoTCC.php" class="col s12" method="post">
            <fieldset class="container">
                <h5>Cadastro do TCC</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="titulo" name="titulo" class="validate" autofocus required>
                        <label for="titulo">Título</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="date" id="dataInicio" name="dataInicio" class="validate" autofocus required>
                        <label for="dataInicio">Data Inicio</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="date" id="dataFim" name="dataFim" class="validate" autofocus required>
                        <label for="dataFim">Data Termino</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s6">
                        <input type="text" id="tema" name="tema" class="validate" autofocus required>
                        <label for="numero">Tema do TCC</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="area" name="area" class="browser-default"  autofocus required>
                            <option value="" disabled selected>Área do TCC</option>
                            <?php
                                include("conecta.php");
                                $dados = mysqli_query($conexao, "SELECT * FROM area ORDER BY NameArea"); 
                                while ($area = mysqli_fetch_array($dados)){    
                            ?>
                            <option value="<?=$area["IdArea"]?>">
                                <?=$area["NameArea"]?>
                            </option>
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select id="aluno-1" name="aluno-1" class="browser-default"  autofocus required>
                            <option value="" disabled selected>Aluno-1</option>
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
                            <option value="<?=$aluno["IdStudent"]?>">
                                <?=$aluno["NameStudent"]?>
                            </option>
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <select id="aluno-2" name="aluno-2" class="browser-default">
                            <option value="" disabled selected>Aluno-2</option>
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
                            <option value="<?=$aluno["IdStudent"]?>">
                                <?=$aluno["NameStudent"]?>
                            </option>
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <select id="orientador" name="orientador" class="browser-default"   autofocus required>
                            <option value="" disabled selected>Orientador</option>
                            <?php
                                include("conecta.php");
                                $dados = mysqli_query($conexao, "SELECT * FROM advisor ORDER BY NameAdvisor"); 
                                while ($orientador = mysqli_fetch_array($dados)){    
                            ?>
                            <option value="<?=$orientador["IdAdvisor"]?>">
                                <?=$orientador["NameAdvisor"]?>
                            </option>
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <select id="coorientador" name="coorientador" class="browser-default">
                            <option value="" disabled selected>Co-Orientador</option>
                            <?php
                                include("conecta.php");
                                $dados = mysqli_query($conexao, "SELECT * FROM advisor ORDER BY NameAdvisor"); 
                                while ($coorientador = mysqli_fetch_array($dados)){    
                            ?>
                            <option value="<?=$coorientador["IdAdvisor"]?>">
                                <?=$coorientador["NameAdvisor"]?>
                            </option>
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="resumo" name="resumo" class="materialize-textarea"  autofocus required></textarea>
                        <label for="resumo">Resumo do TCC</label>
                    </div>
                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar" />
            </fieldset>
        </form>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>

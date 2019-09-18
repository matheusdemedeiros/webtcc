<!DOCTYPE HTML>
<html>
<body>
<?php 
		$cabecalho_title = "Formulário de Acompanhamento";
        include("cabecalho.php"); 
        include("conecta.php");
        $id_tcc=$_GET['formid'];
        $seleciona = mysqli_query($conexao, "SELECT * FROM termpaper WHERE IdTermPaper = '$id_tcc'");
        $campo = mysqli_fetch_array($seleciona);
        ?>
        
    <div class="container">
        <form action="inserirFormularioAcompanhamento.php" method="post">
            <fieldset class="container">
            <h5>Formulário de Acompanhamento</h5>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="titulo">Título:</label>
                    </div>
                    <div class="input-field col s6">
                        <!-- <input type="text" id="titulo" name="titulo" value=""> -->
                        <p><?=$campo["Title"]?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="DataReuniao">Data da Reunião</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="date" id="dataReuniao" name="dataReuniao" class="validate" autofocus required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="assuntosAbordados" id="assuntosAbordados" 
                        class="materialize-textarea"  autofocus required></textarea>
                        <label for="assuntosAbordados">Assuntos Abordados</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                        <textarea name="observacoes" id="observacoes" 
                        class="materialize-textarea"  autofocus required></textarea>
                        <label for="observacoes">Observações</label>
                    </div>
                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar"/>
            </fieldset>
        </form>
    </div>
</body>


</html>
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
        <form action="inserirFormularioAcompanhamento.php" class="col s12" method="post">
            <fieldset class="container">
            <h5>Formulário de Acompanhamento</h5>
            <input type="hidden" name="id" value="<?=$campo["IdTermPaper"]?>">
                <div class="row">
                    <div class="input-field col s6">
                        <label for="titulo">Título:</label>
                    </div>
                    <div class="input-field col s6">
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
                    <label for="assuntosAbordados">Assuntos Abordados</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="assuntosAbordados" name="assuntosAbordados"  
                        class="materialize-textarea"  autofocus required></textarea>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <label for="observacoes">Observações</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                        <textarea id="observacoes" name="observacoes" 
                        class="materialize-textarea"  autofocus required></textarea>
                       
                    </div>
                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar"/>
            </fieldset>
        </form>
    </div>
</body>


</html>
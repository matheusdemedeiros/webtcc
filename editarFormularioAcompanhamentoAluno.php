<!DOCTYPE HTML>
<html>
<body>
<?php 
		$cabecalho_title = "Editar Formulário";
        include("cabecalhoAluno.php"); 
        include("conecta.php");
        $id_tcc=$_GET['editaid'];
        $seleciona = mysqli_query($conexao, "SELECT t.Title as titulo, f.Observation as observacao,
        f.Topic as assuntos, f.MeetingDate as dataReuniao, f.IdFormTermPaper as id
         FROM termpaper t INNER JOIN
        formtermpaper f WHERE  t.IdTermPaper=f.TermPaperId AND '$id_tcc'=f.IdFormTermPaper");
        $campo = mysqli_fetch_array($seleciona);
        ?>
        
    <div class="container">
        <form action="gravaEditaFormularioAcompanhamentoAluno.php" method="post">
            <fieldset class="container">
            <h5>Editar Formulário de Acompanhamento</h5>
            <input type="hidden" name="id" value="<?=$campo["id"]?>">
                <div class="row">
                    <div class="input-field col s6">
                        <label for="titulo">Título:</label>
                    </div>
                    <div class="input-field col s6">
                        <p><?=$campo["titulo"]?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="DataReuniao">Data da Reunião</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="date" id="dataReuniao" name="dataReuniao"
                         class="validate" value="<?=$campo["dataReuniao"]?>" autofocus required>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                <label for="assuntosAbordados">Assuntos Abordados</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="assuntosAbordados" id="assuntosAbordados" 
                        class="materialize-textarea"  autofocus required><?=$campo["assuntos"]?></textarea>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                        <label for="observacoes">Observações</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                        <textarea name="observacoes" id="observacoes" 
                        class="materialize-textarea"  autofocus required><?=$campo["observacao"]?></textarea>
                        
                    </div>
                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar"/>
            </fieldset>
        </form>
    </div>
</body>


</html>
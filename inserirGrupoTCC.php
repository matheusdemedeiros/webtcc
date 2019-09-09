<?php
    include("conecta.php");

    $tema = $_POST["tema"];
    $aluno_1 = $_POST["aluno-1"];
    $aluno_2 = $_POST["aluno-2"];
    $orientador = $_POST["orientador"];
    $co_orientador = $_POST["coorientador"];
    $data_inicio = $_POST["dataInicio"];
    $data_final = $_POST["dataFim"];
    $resumo = $_POST["resumo"];
    $area = $_POST["area"];
    $numero_equipe = $_POST["numero"];

     echo "Tema: ".$tema;
     echo "Aluno1: ".$aluno_1;
     if($aluno_2==null){
         echo "O campo é nulo";
     }else {
        echo "Aluno2: ".$aluno_2;
     }
     
     echo "Orientador: ".$orientador;
     if ($co_orientador==null) {
         echo "O Campo co-orientador é nulo";
     } else {
        echo "Coorientador: ".$co_orientador;
     }
     echo "Inicio: ".$data_inicio;
     echo "Fim: ".$data_final;
     echo  "Resumo: ".$resumo;
     echo "Area: ".$area;
     echo "Numero: ".$numero_equipe;


?>
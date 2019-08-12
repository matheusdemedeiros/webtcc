<?php
    

$info = array($_POST['nome'], $_POST['email'] , $_POST['password']);

$max = sizeof($info);
for($i = 0; $i < $max;$i++)
{  echo $i.nome;}


//list($nome, $email, $password) = $info;
// echo "$nome é o nome do aluno que tem esse email $email e essa senha: $password.\n";

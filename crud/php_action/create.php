<?php 
//sessão
session_start();
//conexão
require_once 'db_connect.php';
//clear
function clear($input){
    global $connect;
    //sql
    $var = mysqli_escape_string($connect,$input);
    //xss (cross site scripting)
    $var = htmlspecialchars($var);
    return $var;
}
if(isset($_POST['btn-cadastrar'])){
    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {
		$_SESSION['mensagem'] = "FORMATO DE IDADE INVÁLIDO!";
		header('Location: ../index.php');
	} else {
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome','$sobrenome','$email','$idade')";
    if(mysqli_query($connect,$sql)){
        $_SESSION['mensagem'] = "CADASTRADO COM SUCESSO!";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensagem'] = "ERRO AO CADASTRAR";
        header('Location: ../index.php');
        }
    }
}
?>
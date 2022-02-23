<?php 
//sessão
session_start();
//conexão
require_once 'db_connect.php';
if(isset($_POST['btn-editar'])){
    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {
		$_SESSION['mensagem'] = "FORMATO DE IDADE INVÁLIDO!";
		header('Location: ../index.php');
	} else {
    $nome = mysqli_real_escape_string($connect,$_POST['nome']);
    $sobrenome = mysqli_real_escape_string($connect,$_POST['sobrenome']);
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $idade = mysqli_real_escape_string($connect,$_POST['idade']);
    $id = mysqli_real_escape_string($connect,$_POST['id']);

    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";
    if(mysqli_query($connect,$sql)){
        $_SESSION['mensagem'] = "ATUALIZADO COM SUCESSO!";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensagem'] = "ERRO AO ATUALIZAR";
        header('Location: ../index.php');
        }
    }
}
?>
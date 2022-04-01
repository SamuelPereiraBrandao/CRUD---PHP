<?php 
//sessão
session_start();
//conexão
function clear($input){
    global $connect;
    //sql
    $var = mysqli_escape_string($connect,$input);
    //xss (cross site scripting)
    $var = htmlspecialchars($var);
    return $var;
}
require_once 'db_connect.php';
if(isset($_POST['btn-editar'])){
    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {
		$_SESSION['mensagem'] = "FORMATO DE IDADE INVÁLIDO!";
		header('Location: ../index.php');
	} else {
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    $id = clear($_POST['id']);

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
<?php 
//sessão
session_start();
//conexão
require_once 'db_connect.php';
if(isset($_POST['btn-delete'])){
    
    $id = mysqli_real_escape_string($connect,$_POST['id']);

    $sql = "DELETE FROM clientes WHERE id='$id'";
    if(mysqli_query($connect,$sql)){
        $_SESSION['mensagem'] = "DELETADO COM SUCESSO!";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensagem'] = "ERRO AO DELETAR";
        header('Location: ../index.php');
        }
    }
?>
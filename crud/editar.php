<?php
//conexão
include_once 'php_action/db_connect.php';
//header
 include_once 'includes/header.php'; 
 //select
 if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = $id";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
   
 }
 ?>
<div class="row">
    <div class="col s12 m6 push-m3 "> 
        <h3 class="light">Editar Cliente</h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value= "<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type="text" value = "<?php echo $dados['nome']; ?>" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" value = "<?php echo $dados['sobrenome']; ?>"  name = "sobrenome" id="sobrenome">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" value = "<?php echo $dados['email']; ?>"  name = "email" id="email">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="text" value = "<?php echo $dados['idade']; ?>"  name = "idade" id="idade">
                <label for="idade">Idade</label>
            </div>
            <button type="submit"  name="btn-editar" class="btn">ATUALIZAR</button>
            <a type="submit"  href="index.php" class="btn green">Lista de Clientes</a>
        </form>
</div>
</div>
<?php
//footer
include_once 'includes/footer.php'; 
?>


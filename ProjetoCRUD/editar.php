<?php require 'config.php';

$usuarios = [];
$id = filter_input(INPUT_GET, 'id');


if($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id"); 
    $sql->bindValue(':id', $id); 
    $sql->execute();

    if($sql->rowCount() > 0){

        $usuarios = $sql->fetch(PDO::FETCH_ASSOC);

    }else{

        header("Location: index.php"); exit;}

}else{

header("Location: index.php");

}

?>

<h1>Editar Usuário</h1>


<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuarios['id'];?>"/>
    <label>
        
        Nome: <input type="text" name="nome" value="<?=$usuarios['nome'];?>"/> </label>

    <label>

        E-mail: <input type="text" name="email" value="<?=$usuarios['email'];?>"/> 

    </label>

    <input type="submit" value="Atualizar"/> 
        
</form>
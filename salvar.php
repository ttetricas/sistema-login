<?php

include 'config.php';

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$confirmar = trim($_POST['confirmar']);

if(empty($nome) || empty($email) || empty($senha) || empty($confirmar)){
    die("Preencha todos os campos.");
}

if($senha != $confirmar){
    die("As senhas não coincidem.");
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios(nome, email, senha, perfil)
VALUES (?, ?, ?, 'usuario')";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sss", $nome, $email, $senhaHash);

if($stmt->execute()){

    header("Location: index.php");

}else{

    echo "Erro ao cadastrar.";

}

?>
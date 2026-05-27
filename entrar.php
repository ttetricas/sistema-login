<?php

session_start();

include 'config.php';

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

if(empty($email) || empty($senha)){
    die("Preencha todos os campos.");
}

$sql = "SELECT * FROM usuarios WHERE email = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $email);

$stmt->execute();

$resultado = $stmt->get_result();

if($resultado->num_rows > 0){

    $usuario = $resultado->fetch_assoc();

    if(password_verify($senha, $usuario['senha'])){

        $_SESSION['usuario'] = $usuario['nome'];

        header("Location: home.php");

        exit;

    }else{

        echo "Senha incorreta.";

    }

}else{

    echo "Usuário não encontrado.";

}

?>
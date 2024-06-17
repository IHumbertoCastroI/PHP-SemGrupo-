<?php
require 'includes/db.php';
require 'functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (registerUser($username, $email, $password)) {
        echo "Registro bem-sucedido! <a href='login.php'>Faça login aqui</a>";
    } else {
        echo "Erro ao registrar.";
    }
}
?>

<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Nome de usuário" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Registrar</button>
</form>



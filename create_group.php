<?php
require 'includes/db.php';
require 'functions/auth.php';
session_start();

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $created_by = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO groups (name, description, created_by) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $description, $created_by])) {
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Erro ao criar grupo.";
    }
}
?>

<form method="POST" action="create_group.php">
    <input type="text" name="name" placeholder="Nome do Grupo" required>
    <textarea name="description" placeholder="Descrição do Grupo"></textarea>
    <button type="submit">Criar Grupo</button>
</form>

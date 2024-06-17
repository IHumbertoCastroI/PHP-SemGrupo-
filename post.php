<?php
require 'includes/db.php';
require 'functions/auth.php';
session_start();

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $group_id = $_POST['group_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO posts (group_id, user_id, content) VALUES (?, ?, ?)");
    if ($stmt->execute([$group_id, $user_id, $content])) {
        header("Location: group.php?id=$group_id");
        exit();
    } else {
        echo "Erro ao criar postagem.";
    }
}

$group_id = $_GET['group_id'];
?>

<form method="POST" action="post.php">
    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
    <textarea name="content" placeholder="Escreva sua postagem"></textarea>
    <button type="submit">Postar</button>
</form>


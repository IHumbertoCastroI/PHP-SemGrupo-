<?php
require 'includes/db.php';
require 'functions/auth.php';
session_start();

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

$group_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM groups WHERE id = ?");
$stmt->execute([$group_id]);
$group = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM posts WHERE group_id = ?");
$stmt->execute([$group_id]);
$posts = $stmt->fetchAll();
?>

<h1><?php echo $group['name']; ?></h1>
<p><?php echo $group['description']; ?></p>
<a href="post.php?group_id=<?php echo $group_id; ?>">Fazer uma Postagem</a>

<h2>Postagens</h2>
<ul>
    <?php foreach ($posts as $post): ?>
        <li><?php echo $post['content']; ?> (<?php echo $post['created_at']; ?>)</li>
    <?php endforeach; ?>
</ul>

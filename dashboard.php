<?php
require 'includes/db.php';
require 'functions/auth.php';
session_start();

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM groups WHERE created_by = ?");
$stmt->execute([$user_id]);
$groups = $stmt->fetchAll();
?>

<h1>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h1>
<a href="create_group.php">Criar Novo Grupo</a>
<a href="logout.php">Sair</a>

<h2>Seus Grupos</h2>
<ul>
    <?php foreach ($groups as $group): ?>
        <li><a href="group.php?id=<?php echo $group['id']; ?>"><?php echo $group['name']; ?></a></li>
    <?php endforeach; ?>
</ul>

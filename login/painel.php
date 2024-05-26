<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <?php
    if (isset($_SESSION['nome'])) {
        echo "Bem-vindo ao seu painel, " . htmlspecialchars($_SESSION['nome']) . "!";
    } else {
        echo "Você não pode acessar está página, pois seu login não foi realizado";
    }
    ?>

    <p>
        <a href="logout.php">Sair</a>
    </p>    
</body>
</html>


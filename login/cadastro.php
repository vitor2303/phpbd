<?php
include('conexao.php');

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirmar_senha'])) {
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $confirmar_senha = $mysqli->real_escape_string($_POST['confirmar_senha']);

    if (strlen($nome) == 0) {
        echo "Preencha seu nome";
    } else if (strlen($email) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($senha) == 0) {
        echo "Preencha sua senha";
    } else if ($senha != $confirmar_senha) {
        echo "As senhas não coincidem";
    } else {
        $sql_code = "INSERT INTO users (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query) {
            header("Location: index.php");
        } else {
            echo "Falha ao cadastrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastre-se</h1>
    <form action="" method="POST">
        <p>
            <label>Nome</label>
            <input type="text" name="nome">
        </p>
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <label>Confirmar Senha</label>
            <input type="password" name="confirmar_senha">
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
</body>
</html>


<?php
// Configurações de conexão com o banco de dados MySQL
$host = 'localhost';
$usuario = 'root';     
$senha = 'Senai@118';          
$banco = 'exercicio';

// Conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se deu erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$mensagem = ''; // Variável para armazenar as mensagens de sucesso ou erro

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pega os dados vindos do formulário
    $nome = trim($_POST['nome']);
    $preco = $_POST['preco'];

    // 1. Validação: verifica se o nome está vazio
    if (empty($nome)) {
        $mensagem = "<p style='color: red;'>Erro: O nome do produto não pode estar vazio.</p>";
    }
    // 2. Validação: verifica se o preço é número e se é maior que zero
    elseif (!is_numeric($preco) || $preco <= 0) {
        $mensagem = "<p style='color: red;'>Erro: O preço deve ser um número positivo.</p>";
    }
    // Se passou em todas as validações, insere no banco
    else {
        // Prepara o comando SQL de inserção segura
        $stmt = $conexao->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
        $stmt->bind_param("sd", $nome, $preco);

        if ($stmt->execute()) {
            $mensagem = "<p style='color: green;'>Produto cadastrado com sucesso!</p>";
        } else {
            $mensagem = "<p style='color: red;'>Erro ao cadastrar: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>

<body>

    <h2>Cadastrar Produto</h2>

    <!-- Exibe a mensagem de Erro ou Sucesso -->
    <?php
    if (!empty($mensagem)) {
        echo $mensagem;
    }
    ?>

    <!-- Formulário HTML -->
    <form action="" method="POST">
        <p>
            <label for="nome">Nome do Produto:</label><br>
            <input type="text" id="nome" name="nome">
        </p>

        <p>
            <label for="preco">Preço:</label><br>
            <input type="number" step="0.01" id="preco" name="preco">
        </p>

        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>

</body>

</html>
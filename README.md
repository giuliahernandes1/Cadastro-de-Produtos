# 📦 Desafio: Cadastro de Produtos em PHP e MySQL

Este projeto consiste em um script PHP integrado com formulário HTML para realizar a validação e o cadastro de produtos em um banco de dados MySQL, utilizando requisições do tipo POST e consultas preparadas (Prepared Statements) para garantir a segurança da aplicação.

---

## 🛠️ Tecnologias Utilizadas

- **PHP** (Processamento de formulário, validação de dados e conexão PDO/MySQLi)
- **MySQL** (Banco de dados relacional)
- **HTML5** (Estrutura do formulário web)

---

## 🗄️ 1. Estrutura do Banco de Dados

Antes de executar a aplicação web, é necessário criar o banco de dados `exercicio` e a tabela `produtos` no seu servidor MySQL local.

Execute o seguinte script SQL no seu cliente MySQL (ex: MySQL Workbench):

```sql
-- Criar o banco de dados (caso ainda não exista)
CREATE DATABASE IF NOT EXISTS exercicio;

-- Selecionar o banco de dados
USE exercicio;

-- Criar a tabela de produtos
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

# APP SUS - Documentação

## [Clique aqui](https://www.youtube.com/watch?v=ukg6h2oIvyk) para acessar o vídeo de demonstração do Sistema

# Como Criar e Implementar um Banco de Dados com MySQL e Armazenar Dados em Formato de Markdown

## 1. Instalando o MySQL
Primeiro, certifique-se de que o MySQL esteja instalado no seu sistema. Você pode fazer o download do MySQL no site oficial [MySQL Downloads](https://dev.mysql.com/downloads/).

## 2. Configurando o Banco de Dados
Depois de instalar o MySQL, inicie o servidor MySQL e conecte-se ao banco de dados usando o cliente MySQL:#

# CREATE DATABASE meu_banco_de_dados;
USE meu_banco_de_dados;

CREATE TABLE minha_tabela (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),idade INT,email VARCHAR(100)
);
# INSERT INTO minha_tabela (nome, idade, email)
VALUES ('João Silva', 28, 'joao.silva@example.com'),
       ('Maria Oliveira', 32, 'maria.oliveira@example.com'),
       ('Pedro Souza', 45, 'pedro.souza@example.com');
# SELECT * FROM minha_tabela;
# Markdown
| ID | Nome         | Idade | Email                  |
|----|--------------|-------|------------------------|
| 1  | João Silva   | 28    | joao.silva@example.com |
| 2  | Maria Oliveira | 32  | maria.oliveira@example.com |
| 3  | Pedro Souza  | 45    | pedro.souza@example.com |





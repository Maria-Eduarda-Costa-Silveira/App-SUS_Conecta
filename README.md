# APP SUS - Documentação

## [Clique aqui](https://www.youtube.com/watch?v=ukg6h2oIvyk) para acessar o vídeo de demonstração do Sistema

Na primeira etapa deste projeto realizamos a prototipação do sistema e também a criação das personas e das jornadas de usuário correspondentes a cada uma delas. Como grupo, optamos por desenvolver a jornada dos pacientes que são exemplificadas através da seguinte persona:

- **Maria da Silva**
    - Idade: 45 anos
    - Profissão: Dona de casa
    - Localização: Região Metropolitana
    - Necessidade: Ter acesso digital a encaminhamentos médicos, receitas e agendamentos de consultas, sem depender de papéis que possam ser perdidos.
    - Comportamento: Usa o smartphone para se comunicar, mas tem dificuldades com aplicativos complexos.

Dessa forma, baseado na descrição acima e no protótipo que desenvolvemos, podemos afirmar que o sistema desenvolvido **atende a etapa anterior com sucesso** sem que fosse preciso adicionar novas features ou retirar quaisquer funcionalidades idealizadas na primeira etapa.

## Como Criar e Implementar um Banco de Dados com MySQL e Armazenar Dados em Formato de Markdown

## 1. Instalando o MySQL
Primeiro, certifique-se de que o MySQL esteja instalado no seu sistema. Você pode fazer o download do MySQL no site oficial [MySQL Downloads](https://dev.mysql.com/downloads/).

## 2. Configurando o Banco de Dados
Depois de instalar o MySQL, inicie o servidor MySQL e conecte-se ao banco de dados usando o cliente MySQL:#

## CREATE DATABASE meu_banco_de_dados;
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





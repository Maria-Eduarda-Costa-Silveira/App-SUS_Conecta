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

---

# Hospedagem de Banco de Dados MySQL na AWS RDS

Hospedando um banco de dados MySQL na AWS RDS (Relational Database Service), desde a criação da instância até a conexão com aplicações externas.

## Passo a Passo:

### 1. Criar Instância RDS
1. Acesse o **AWS Console** e vá para o serviço **RDS**.
2. Clique em **Create database** e selecione **MySQL**.
3. Escolha a opção **Free Tier** (se disponível) para usar o nível gratuito.
4. Defina:
- **DB Identifier**: Nome único para o banco.
- **Master Username** e **Password**: Credenciais de acesso ao banco.
5. Em **Connectivity**, ative **Public access** para permitir conexões externas e selecione um **Security Group**.
6. Clique em **Create database** e aguarde a inicialização da instância.

---

### 2. Configurar Permissões de Acesso
1. Acesse o serviço **EC2** no AWS Console.
2. Vá até **Security Groups** e localize o grupo de segurança associado ao RDS.
3. Edite as **Inbound Rules**:
- **Type**: MySQL/Aurora
- **Protocol**: TCP
- **Port**: 3306
- **Source**: Seu IP ou `0.0.0.0/0` (menos seguro, permite acesso de qualquer IP).
4. Salve as alterações.

---

### 3. Conectar ao Banco
###  MySQL Workbench
1. Abra o MySQL Workbench e adicione uma nova conexão.
2. Preencha os campos:
- **Hostname**: Endereço do RDS (encontrado no AWS RDS Dashboard).
- **Port**: 3306
- **Username** e **Password**: Definidos na criação do banco.
3. Teste a conexão e salve.

####  Linha de Comando
Use o comando abaixo para conectar via terminal:
bash
`mysql -h SEU-ENDERECO-RDS.amazonaws.com -u SEU-USUARIO -p`

Digite a senha quando solicitado.

### 4. Conectar Aplicação PHP
Use este código para conectar uma aplicação PHP ao banco de dados RDS:

`<?php
$conn = new mysqli("SEU-ENDERECO-RDS.amazonaws.com", "SEU-USUARIO", "SUA-SENHA", "SEU-BANCO");
if ($conn->connect_error) die("Falha: " . $conn->connect_error);
echo "Conexão bem-sucedida!";
?>`

### 5. Segurança
Desative o acesso público se não for necessário.

Crie usuários com permissões limitadas para evitar riscos.

Habilite SSL para criptografar a conexão.

Realize backups regulares usando RDS Snapshots.

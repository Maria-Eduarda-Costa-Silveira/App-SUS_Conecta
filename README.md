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

## 4. Criação do Banco de Dados

### 1. Instalando o MySQL
Primeiro, certifique-se de que o MySQL esteja instalado no seu sistema. Você pode fazer o download do MySQL no site oficial [MySQL Downloads](https://dev.mysql.com/downloads/).

### 2. Configurando o Banco de Dados
Depois de instalar o MySQL, inicie o servidor MySQL e conecte-se ao banco de dados usando o cliente MySQL:#

### CREATE DATABASE meu_banco_de_dados;
USE meu_banco_de_dados;

CREATE TABLE minha_tabela (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),idade INT,email VARCHAR(100)
);
### INSERT INTO minha_tabela (nome, idade, email)
VALUES ('João Silva', 28, 'joao.silva@example.com'),
       ('Maria Oliveira', 32, 'maria.oliveira@example.com'),
       ('Pedro Souza', 45, 'pedro.souza@example.com');
### SELECT * FROM minha_tabela;
### Markdown
| ID | Nome         | Idade | Email                  |
|----|--------------|-------|------------------------|
| 1  | João Silva   | 28    | joao.silva@example.com |
| 2  | Maria Oliveira | 32  | maria.oliveira@example.com |
| 3  | Pedro Souza  | 45    | pedro.souza@example.com |

---

## 5. Hospedagem de Banco de Dados MySQL na AWS RDS
Para que qualquer pessoa que possa acessar esse sistema sem problemas, decidimos hospedar o banco de dados na nuvem através da Amazon Web Services (AWS). Para que isso fosse possível seguimos os seguintes passos:

### 1. Criar Instância RDS
1. No site da AWS, acesse o **AWS Console** e vá para o serviço **RDS**.
3. Clique em **Create database** e selecione **MySQL**.
4. Escolha a opção **Free Tier** (se disponível) para usar o nível gratuito.
5. Defina:
    - **DB Identifier**: Nome único para o banco.
    - **Master Username** e **Password**: Credenciais de acesso ao banco.
5. Em **Connectivity**, ative **Public access** para permitir conexões externas e selecione um **Security Group**.
6. Clique em **Create database** e aguarde a inicialização da instância.

### 2. Configurar Permissões de Acesso
1. Acesse o serviço **EC2** no AWS Console.
2. Vá até **Security Groups** e localize o grupo de segurança associado ao RDS.
3. Edite as **Inbound Rules**:
- **Type**: MySQL/Aurora
- **Protocol**: TCP
- **Port**: 3306
- **Source**: `0.0.0.0/0` (menos seguro, permite acesso de qualquer IP).
4. Salve as alterações.

### 3. Conectar ao Banco
###  MySQL Workbench
1. Abra o MySQL Workbench e adicione uma nova conexão.
2. Preencha os campos:
- **Hostname**: Endereço do RDS (encontrado no AWS RDS Dashboard).
- **Port**: 3306
- **Username** e **Password**: Definidos na criação do banco.
3. Teste a conexão e salve.

### 4. Conectar Aplicação PHP
Para conectar o sistema ao novo banco de dados, foi necessário trocar as credenciais antigas (do BD local) para as novas (do BD hospedado) na página 'dp.php'.

---

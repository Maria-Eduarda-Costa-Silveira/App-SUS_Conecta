# APP SUS - Documentação

## [Clique aqui](https://www.youtube.com/watch?v=ukg6h2oIvyk) para acessar o vídeo de demonstração do Sistema

## 1. Contextualização
Na primeira etapa deste projeto realizamos a prototipação do sistema e também a criação das personas e das jornadas de usuário correspondentes a cada uma delas. Como grupo, optamos por desenvolver a jornada dos pacientes que são exemplificadas através da seguinte persona:

- **Maria da Silva**
    - Idade: 45 anos
    - Profissão: Dona de casa
    - Localização: Região Metropolitana
    - Necessidade: Ter acesso digital a encaminhamentos médicos, receitas e agendamentos de consultas, sem depender de papéis que possam ser perdidos.
    - Comportamento: Usa o smartphone para se comunicar, mas tem dificuldades com aplicativos complexos.

Dessa forma, baseado na descrição acima e no protótipo que desenvolvemos, podemos afirmar que o sistema desenvolvido **atende a etapa anterior com sucesso** sem que fosse preciso adicionar novas features ou retirar quaisquer funcionalidades idealizadas na primeira etapa.

## 2. Front-end

Seguindo o design construído na primeira etpa através do Figma, o front-end foi desenvolvido utilizando HTML para a estrutura da página e CSS para a estilização. Garantindo uma interface visualmente agradável e responsiva para o usuário.

## 3. Back-end 

O back-end foi construído com PHP, pois foi a linguagem de programação que o grupo se sentiu mais confortável em utulizar. O PHP é responsável por processar os dados e interagir com o banco de dados, enviando os dados fornecidos pelos usuários no cadastro para o BD e "chamando" esses dados quando uma seção é iniciada.

## 4. Criação do Banco de Dados
O Banco de Dados que armazena e envia os dados dos pacientes para a aplicação foi desenvolvido em MySQL através do MySQL Workbench.

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

## 6. Configuração do Servidor Apache para Execução Local

Para executar o projeto em uma máquina local, é necessário configurar um servidor web que suporte PHP e interaja com o Banco de Dados MySQL. O **Apache** (incluído no XAMPP) é a solução que encontramos para esse ambiente de desenvolvimento.

## Passo a Passo para Configuração

#### 1. Baixar o XAMPP
- Acesse o site oficial [XAMPP](https://www.apachefriends.org/pt_br/index.html).
- Faça o download da versão compatível com seu sistema operacional (Windows, Linux ou macOS).

#### 2. Colocar o Projeto na Pasta `htdocs`
- Após instalar o XAMPP, localize a pasta de instalação de acordo com o sistema operacional:
  - **Windows**: `C:\xampp\htdocs\`
  - **Linux**: `/opt/lampp/htdocs/`
  - **macOS**: `/Applications/XAMPP/htdocs/`
- Copie a pasta do projeto para dentro de `htdocs`.  
  **Exemplo**:  
  Como o projeto se chama `App-SUS`, o caminho final será `C:\xampp\htdocs\App-SUS`.

#### 3. Abrir o XAMPP Control Panel
- Inicie o **XAMPP Control Panel**:
  - No Windows: Use o atalho na área de trabalho ou pesquise por "XAMPP Control Panel".
  - No Linux execute o comando `sudo /opt/lampp/xampp start`.
  - No macOS abra o aplicativo XAMPP.

#### 4. Ligar o Apache
- No XAMPP Control Panel, clique no botão **Start** ao lado de "Apache" para iniciar o servidor.
- Como o projeto utiliza um Banco de Dados local, inicie também o **MySQL**.

#### 5. Acessando o Projeto
- Abra um navegador e acesse: 
  `http://localhost/App-SUS`

  ---

  

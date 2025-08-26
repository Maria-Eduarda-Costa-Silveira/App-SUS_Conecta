# APP SUS - Documentação 📂

## [Clique aqui](https://www.youtube.com/watch?v=ukg6h2oIvyk) para acessar o vídeo de demonstração do Sistema

## 1. Contextualização 🔎
Na primeira etapa deste projeto realizamos a prototipação do sistema e também a criação das personas e das jornadas de usuário correspondentes a cada uma delas. Como grupo, optamos por desenvolver a jornada dos pacientes que são exemplificadas através da seguinte persona:

- **Antônio Santos**
    - Idade: 65 anos
    - Profissão: Aposentado
    - Localização: Zona rural
    - Necessidade: Acompanhar os resultados de exames, agendamentos de consultas e informações sobre medicamentos de forma simples, devido à distância dos centros de saúde.
    - Comportamento: Usa um celular básico e conta com a ajuda de familiares para navegar em aplicativos, sendo relutante em lidar com tecnologia sem suporte

#### Dessa forma, baseado na descrição acima e no protótipo que desenvolvemos, podemos afirmar que o sistema desenvolvido **atende a etapa anterior com sucesso** sem que fosse preciso adicionar novas features ou retirar quaisquer funcionalidades idealizadas na primeira etapa.

## 2. Front-end 💻

Seguindo o design construído na primeira etpa através do `Figma`, o front-end foi desenvolvido utilizando `HTML` para a estrutura da página e `CSS` para a estilização. Garantindo uma interface visualmente agradável e responsiva para o usuário.

## 3. Back-end </>

O back-end foi construído com `PHP`, pois foi a linguagem de programação que o grupo se sentiu mais confortável em utilizar. O `PHP` é responsável por processar os dados e interagir com o banco de dados, enviando os dados fornecidos pelos usuários no cadastro para o BD e "chamando" esses dados quando uma seção é iniciada.

---
## 4. Banco de Dados 🛢

O Banco de Dados `db_app-sus` que recebe e armazena os dados dos pacientes vindos do sistema foi desenvolvido em MySQL através do MySQL Workbench.

O Banco de dados possui 4 tabelas:

1. `tbl_pacientes`
2. `tbl_agendamentos`
3. `tbl_exames`
4. `tbl_receitas`

Os valores da `tbl_pacientes` são inseridos sempre que um paciente realiza o seu cadastro. Já os dados das demais tabelas são adicionadas por um usuário com perfil de administrador (médico(a), enfermeiros(as), entre outros). Como desenvolvemos apenas a jornada do paciente, adicionamos os dados diretamente nas tabelas de forma manual por meio de queries em `SQL`.

---

## 5. Configuração do Servidor Apache para Execução Local 🌐

Para executar o projeto na máquina local, é necessário configurar um servidor web para dar suporte ao PHP e interagir com o Banco de Dados MySQL. O **Apache** (incluído no XAMPP) é a solução que encontramos para esse ambiente de desenvolvimento.

## Passo a Passo para Configuração

#### 1. Baixar o XAMPP
- Acesse o site oficial [XAMPP](https://www.apachefriends.org/pt_br/index.html).
- Faça o download da versão compatível com seu sistema operacional (Windows, Linux ou macOS).

#### 2. Colocar o Projeto na Pasta `htdocs`
- Após instalar o XAMPP, localize a pasta de instalação de acordo com o sistema operacional:
  - **Windows**: `C:\xampp\htdocs\`
  - **Linux**: `/opt/lampp/htdocs/`
  - **macOS**: `/Applications/XAMPP/htdocs/`
- Baixe este projeto no seu computador.
- Copie a pasta do projeto (que está dentro da pasta .zip) para dentro de `htdocs`.  
  **Exemplo**:  
  Quando é feito o download a pasta se chama `App-SUS-main`, o caminho final será `C:\xampp\htdocs\App-SUS-main`.

#### 3. Abrir o XAMPP Control Panel
- Inicie o **XAMPP Control Panel**:
  - No Windows: Use o atalho na área de trabalho ou pesquise por "XAMPP Control Panel".
  - No Linux execute o comando `sudo /opt/lampp/xampp start`.
  - No macOS abra o aplicativo XAMPP.

#### 4. Ligar o Apache
- No XAMPP Control Panel, clique no botão **Start** ao lado de "Apache" para iniciar o servidor.
- Como o projeto **não utiliza** um Banco de Dados local, não é necessário iniciar o **MySQL**.

#### 5. Acessando o Projeto
- Abra um navegador e acesse: 
  `http://localhost/App-SUS-main`

#### 6. Clique em `Login.php` 

![Repositório Aberto no XAMPP](https://drive.google.com/uc?export=view&id=1Gv0DBRivoXQRb8RO5Cnwi5u3goqaNa7i)

### 💡 Dica: Acesse o Sistema com o Login da nossa persona. CPF: 12345678915 e Senha: 123456
---

## Detalhamento técnico: Hospedagem do Banco de Dados MySQL na AWS RDS ☁️ 
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
Para conectar o sistema ao novo banco de dados, foi necessário trocar as credenciais antigas (do BD local) para as novas (do BD hospedado) na página `dp.php`.

---
## Nosso time 👥

- Maria Eduarda Costa Silveira
- João Paulo Rodrigues dos Santos
- Lucas Aparecido de Assis Gonçalves
- Héctor Dimitri Pereira dos Santos
- Dimitri Espínola dos Santos

# 🛒 Sistema de Gerenciamento para Empório

Este repositório abriga o desenvolvimento de um sistema web criado como parte do **Projeto Extensionista I**, do curso de **Tecnologia em Sistemas para Internet**, oferecido pelo **Instituto Federal de Educação, Ciência e Tecnologia de Mato Grosso – IFMT Campus Octayde Jorge**.

## 👨‍💻 Equipe de Desenvolvimento

- Diogo Cesar Furlan da Silva  
- Guilherme da Silva Guia  
- Leandro Campos Mendes  
- Sergio Pytagoras Constantini  
- Valéria Alves de Sousa  
- Wilker Neves da Costa  
- Yuri Batista de Almeida

## 🎯 Objetivo do Projeto

O objetivo do projeto é desenvolver um sistema simples e funcional para **gerenciamento de um pequeno empório fictício**, simulando a rotina de um comércio local e promovendo a **aplicação prática dos conhecimentos adquiridos em sala de aula**.

## 🛠️ Tecnologias Utilizadas

- **Linguagem:** PHP e JavaScript  
- **Frameworks:** Laravel e Bootstrap  
- **Banco de Dados:** PostgreSQL  
- **Outras ferramentas:** CSS, Toastify JS, Git, Trello

## ⚙️ Funcionalidades Principais

- Cadastro de vendas fiadas 
- Controle automático de estoque ao realizar uma venda  
- Entrada de novos produtos com descrição e quantidade  
- Seleção de itens, definição de quantidade e forma de pagamento na venda  
- Geração de relatórios simples de vendas 
- Impressão de comprovante de compra  
- Interface simples e intuitiva 

## 📍 Resultados e Desafios

### ✅ Resultados Alcançados

- Desenvolvimento de um sistema web funcional com operações de **CRUD** (Criar, Ler, Atualizar e Deletar) para o gerenciamento de produtos, clientes e vendas.
- Integração com banco de dados **PostgreSQL**, garantindo a persistência e integridade dos dados.
- Interface responsiva e amigável utilizando **Laravel com Blade** e **Bootstrap**.
- Utilização do **Trello** para organizar tarefas, distribuir responsabilidades e acompanhar o progresso da equipe.
- Aplicação dos conceitos fundamentais de **desenvolvimento web**, como MVC, rotas, autenticação e relacionamentos entre tabelas.

### ⚠️ Desafios Enfrentados

- Curva de aprendizado inicial com o **framework Laravel**, exigindo pesquisa e testes para compreender sua estrutura e boas práticas.
- Integração entre backend e frontend, especialmente nos formulários e nas **validações de dados**.
- Gerenciamento de código com **GitHub**, incluindo controle de versões e resolução de conflitos em equipe.
- Adaptação às particularidades do **PostgreSQL**, incluindo comandos e configurações específicas.
- **Gestão de tempo** e conciliação entre a complexidade do projeto e os prazos acadêmicos.

# ⚙️ Como executar o projeto localmente

1. **Clone o repositório:**
    git clone https://github.com/seu-usuario/nome-do-repositorio.git
    cd nome-do-repositorio
   
3. **Instale o PostgreSQL** e crie um banco de dados para o projeto.
   
5. **Instale o PHP e o Composer** (https://getcomposer.org/)
   
7. **Instale as dependências do projeto:**
    composer install
   
9. **Configure o arquivo .env**
    - Renomeie o arquivo .env.example para .env
    - Edite as configurações de banco de dados de acordo com o PostgreSQL criado:
        - DB_CONNECTION=pgsql
        - DB_HOST=127.0.0.1
        - DB_PORT=5432
        - DB_DATABASE=nome_do_banco
        - DB_USERNAME=seu_usuario
        - DB_PASSWORD=sua_senha

10. **Gere a chave da aplicação:**
    php artisan key:generate

11. **Rode as migrações do banco de dados:**
    php artisan migrate

12. **Rode as migrações do banco de dados:**
    php artisan serve

13. **Acesse o sistema no navegador:**
    http://localhost:8000

---

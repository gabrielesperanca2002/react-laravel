Projeto de Cadastro de Usuários (React + Laravel API)
Este projeto demonstra uma aplicação web completa, combinando um front-end construído com React e um back-end robusto desenvolvido com Laravel, servindo como uma API RESTful. O objetivo é gerenciar o cadastro, listagem e exclusão de usuários de forma simples e eficiente.

Visão Geral
A aplicação permite que os usuários:

Listem todos os usuários cadastrados no sistema.

Cadastrem novos usuários, fornecendo nome, idade e e-mail.

Excluam usuários existentes.

A comunicação entre o front-end (React) e o back-end (Laravel) é realizada através de requisições HTTP, utilizando a biblioteca Axios no React para consumir a API RESTful do Laravel.

Tecnologias Utilizadas
Front-end (React)
React: Biblioteca JavaScript para construção da interface do usuário.

Axios: Cliente HTTP baseado em Promises para fazer requisições à API.

Hooks (useState, useEffect, useRef): Ferramentas do React para gerenciar estado, efeitos colaterais e referências a elementos DOM.

CSS: Estilização da interface.

Back-end (Laravel)
Laravel: Framework PHP para construção da API RESTful.

MySQL: Sistema de gerenciamento de banco de dados relacional.

Eloquent ORM: Mapeamento objeto-relacional do Laravel para interagir com o banco de dados.

Validação: Sistema robusto de validação de dados para garantir a integridade das informações.

CORS (Cross-Origin Resource Sharing): Configuração para permitir que o front-end (em uma origem diferente) acesse a API com segurança.

Estrutura do Projeto
Front-end (Pasta do Projeto React)
src/App.js: Componente principal da aplicação React.

src/Home.jsx: Componente principal que contém o formulário de cadastro, a lista de usuários e a lógica de interação com a API.

src/services/api.js: Configuração do Axios, definindo a URL base da API do Laravel.

src/style.css: Arquivo de estilos CSS para o componente Home.

src/assets/apagar.png: Imagem do ícone de lixeira.

Back-end (Pasta do Projeto Laravel)
app/Http/Controllers/UsuarioController.php: Controlador responsável por gerenciar as operações CRUD (Criar, Ler, Atualizar, Deletar) para os usuários, interagindo com o banco de dados e retornando respostas JSON.

index(): Lista todos os usuários.

store(): Cadastra um novo usuário.

destroy(): Exclui um usuário pelo ID.

app/Models/Usuario.php: Modelo Eloquent que representa a tabela usuarios_cad no banco de dados.

database/migrations/*_create_usuarios_cad_table.php: Arquivo de migração (se criado) que define a estrutura da tabela usuarios_cad.

routes/api.php: Define as rotas da API para os recursos de usuário (/usuarios), mapeando-as para os métodos correspondentes no UsuarioController.

config/cors.php: Arquivo de configuração para as permissões de CORS, permitindo que o front-end acesse a API.

Como Executar o Projeto
Siga os passos abaixo para configurar e rodar o front-end e o back-end.

1. Configuração do Back-end (Laravel)
Clone o repositório do Laravel (se aplicável) ou navegue até a pasta raiz do seu projeto Laravel.

Instale as dependências do Composer:

Bash

composer install
Configure o arquivo .env: Copie .env.example para .env e configure suas credenciais de banco de dados MySQL:

Snippet de código

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_nome_do_banco_de_dados
DB_USERNAME=root
DB_PASSWORD=sua_senha
Execute as migrações (para criar a tabela usuarios_cad):

Bash

php artisan migrate
Certifique-se de que sua migração para usuarios_cad está correta, com os campos name, age e email.

Configure o CORS:

Instale o pacote CORS se ainda não o fez: composer require fruitcake/laravel-cors

Publique a configuração (se ainda não fez): php artisan vendor:publish --tag="cors"

Edite config/cors.php para permitir requisições do seu front-end (geralmente http://localhost:5173 para Vite ou http://localhost:3000 para Create React App):

PHP

'allowed_origins' => ['http://localhost:5173'], // Ou ['*'] para desenvolvimento
'allowed_methods' => ['*'],
'paths' => ['api/*', 'sanctum/csrf-cookie'],
Limpe o cache do Laravel e inicie o servidor:

Bash

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan serve
O servidor Laravel estará rodando em http://127.0.0.1:8000.

2. Configuração do Front-end (React)
Navegue até a pasta do seu projeto React:

Bash

cd caminho/para/cadastro-usuarios
Instale as dependências do Node.js:

Bash

npm install
# ou
yarn install
Verifique a URL da API no Axios:

Abra src/services/api.js e confirme que baseURL aponta para a sua API Laravel:

JavaScript

baseURL: 'http://127.0.0.1:8000/api'
Inicie o servidor de desenvolvimento React:

Bash

npm run dev
# ou
yarn dev
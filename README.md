## Iniciando o Projeto

Para iniciar o projeto clone com o [GIT](https://git-scm.com/), executando:

    git clone git@github.com:miltongaldiano/Teste-vaga-PHP.git {nome_pasta}

## Configurações

Entre na raiz do projeto.

Para baixar as dependências execute o [Composer](https://getcomposer.org/):

    composer install

Copie o arquivo .env.example renomeando para .env e inclua os dados de conexão no arquivo:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

Inclua também (.env) os dados para acesso a API de filmes do DBMovie:

    MVDB_URL=https://api.themoviedb.org/3
    MVDB="Chave da API (v3 auth)"

Execute o comando para gerar a chave:

    php artisan key:generate
    
Após execute as migrações para geração de tabelas e novos campos:

    php artisan migrate

Crie o primeiro usuário do sistema para teste executando:

    php artisan db:seed --class=UserSeeder

## Passport

  Para criar os dados de acesso ao token, execute:

    php artisan passport:install

## Comando para importar os filmes

  Execute o comando ou inclua a chamada no crontab:

    php artisan import:movies

  crontab: * * * * * php [caminho do projeto]/artisan schedule:run >> /dev/null 2>&1

  Obs.: Será executado todo dia à meia noite para atualizar a listagem de filmes

## Rotas do sistema

Documentação: acesse clicando [aqui](https://documenter.getpostman.com/view/2523638/TW6xmnAb)

Para visualizar as rotas do sistema execute:

    php artisan route:list

## Linux

Talvez será necessário dar permissão de acesso as pastas storage, public e bootstrap
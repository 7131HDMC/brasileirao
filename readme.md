## Olá

## Instruções - Sitemas Unix

Necessaŕio possuir o `Docker` instalado ou `php 7.1` `mysql 5.7` e `composer 1.10`

Caso esteja usando a docker, para todo os comandos de prefixo `php artisan` utilize o parametro `exec app` para o comando ser executado dentro do container. Ex:

`sudo docker-compose exec app php artisan cache:clear`

Clone o projeto e acesse via terminal.

Execute o `composer install` caso esteja instalado globalmente ou pela docker `sudo docker-compose exec app composer install`

Execute o comando linha de comando:

`cp .env.example .env`

Foi exportado o banco realizado os testes ele está no diretorio root `./brasileirao.sql`


Altere o arquivo .env criado com os dados do banco vazio de preferencia,
Se prefirir crie o banco chamado `brasileiro`, como definido no .env.example e a senha pré-definida.

####

    DB_DATABASE=brasileirao
    DB_USERNAME=cbf
    DB_PASSWORD=qweqwe

Com o banco configurado, execute os comandos:
`php artisan key:generate`

`php artisan migrate`

As migrations criadas seram executadas:

####

    +------+------------------------------------------------+-------+
    | Ran? | Migration                                      | Batch |
    +------+------------------------------------------------+-------+
    | Yes  | 2022_02_05_144610_brasileirao                  | 2     |
    | Yes  | 2022_02_05_145700_teams                        | 2     |
    | Yes  | 2022_02_05_150245_clashes                      | 2     |
    | Yes  | 2022_02_05_174036_classification               | 3     |
    | Yes  | 2022_02_05_151012_seed_brasileirao_serie_a2021 | 4     |
    +------+------------------------------------------------+-------+

As quatro primeiras são para criação das tabelas e suas relações, a quarta é para popular as tres primeiras, brasileirao - teams e classification, executando duas seeders criadas, `AddDivision` e `AddTeamsSerieA2021`.

Para subir sem o serviço uso da docker execute `php artisan serve`

### Tests

Foi criado testes unitários para verificação de funcionalidade das Models

####

    ClashesTest.php
    ClassificationTest.php
    TeamsTest.php

### Curiosidades

Para capturar os dados a serem populados na seeder `AddTeamsSerieA2021` definir o ano em que o galão da massa :] ganhou o brasileirão e pequisei um site com uma lista dos nomes e escudos.

Utilizei xpath com manipulão de documento para capturar a lista de time e logos no site da CBF [accesse aqui](https://www.cbf.com.br/futebol-brasileiro/competicoes/campeonato-brasileiro-serie-a/2021)

Mediante pesquisa os comandos a seguir foramn executados no console javascript em ordem de capturar as logos e os nomes dos times:

####

    items = document.querySelectorAll("td > span.hidden-xs")

    teams=[]

    items.forEach((item)=>  {teams.push(item.textContent)})


    escudo = document.querySelectorAll("table.m-b-20 > tbody > tr > td > img.icon.escudo[src*='https://conteudo.cbf.com.br/cdn/imagens/escudos/']")

    escudos=[]

    escudo.forEach((item)=> escudos.push(item.currentSrc))


    teams_obj=[]

    escudos.map((item,index) => {
        teams_obj=[index]={"team_name": teams[index], "team_flag":item}
    })

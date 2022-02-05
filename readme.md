## Hi

## Instruções

Execute o comando em sistema Unix por linha de comando:

`cp .env.example .env`

Altere o arquivo .env criado com os dados do banco vazio de preferencia,
Se prefirir crie o banco chamado `brasileiro`, como definido no .env.example e a senha pré-definida.

####    
    DB_DATABASE=brasileirao
    DB_USERNAME=cbf
    DB_PASSWORD=qweqwe


Com o banco configurado, execute o comando:

`php artisan migrate`

As migrations criadas seram executadas:
####
+------+------------------------------------------------+-------+
| Ran? | Migration                                      | Batch |
+------+------------------------------------------------+-------+
| Yes  | 2022_02_05_144610_brasileirao                  | 2     |
| Yes  | 2022_02_05_145700_teams                        | 2     |
| Yes  | 2022_02_05_150245_clashes                      | 2     |
| Yes  | 2022_02_05_151012_seed_brasileirao_serie_a2021 | 3     |
| Yes  | 2022_02_05_174036_classification               | 4     |
+------+------------------------------------------------+-------+


As trÊs primeiras são para criação das tabelas e suas relações, a terceira é para popular as duas primeiras, brasileirao e teams, executando duas seeders criadas, `AddDivision` e `AddTeamsSerieA2021`.


#### Tests


#### Curiosidades

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

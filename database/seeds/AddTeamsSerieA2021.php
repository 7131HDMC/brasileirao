<?php

use Illuminate\Database\Seeder;

class AddTeamsSerieA2021 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $teams = [
                [
                    "team_name" => "Atlético Mineiro - MG",
                    "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00003mg.jpg?v=2022020512"
                ],
                [
                    "team_name" => "Flamengo - RJ",
                    "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00006rj.jpg?v=2022020512"
                ],
                [
                "team_name" => "Palmeiras - SP",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00019sp.jpg?v=2022020512"
                ],
                [
                "team_name" => "Fortaleza - CE",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00003ce.jpg?v=2022020512"
                ],
                [
                "team_name" => "Corinthians - SP",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00021sp.jpg?v=2022020512"
                ],
                [
                "team_name" => "Red Bull Bragantino - SP",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00006sp.jpg?v=2022020512"
                ],
                [
                "team_name" => "Fluminense - RJ",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00009rj.jpg?v=2022020512"
                ],
                [
                "team_name" => "America - MG",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00001mg.jpg?v=2022020512"
                ],
                [
                "team_name" => "Atlético - GO",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00004go.jpg?v=2022020512"
                ],
                [
                "team_name" => "Santos - SP",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00018sp.jpg?v=2022020512"
                ],
                [
                "team_name" => "Ceará - CE",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00001ce.jpg?v=2022020512"
                ],
                [
                "team_name" => "Internacional - RS",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00009rs.jpg?v=2022020512"
                ],
                [
                "team_name" => "São Paulo - SP",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00017sp.jpg?v=2022020512"
                ],
                [
                "team_name" => "Athletico Paranaense - PR",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00004pr.jpg?v=2022020512"
                ],
                [
                "team_name" => "Cuiabá - MT",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00062mt.jpg?v=2022020512"
                ],
                [
                "team_name" => "Juventude - RS",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00002rs.jpg?v=2022020512"
                ],
                [
                "team_name" => "Grêmio - RS",
                "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00008rs.jpg?v=2022020512"
                ],
                [
                    "team_name" => "Bahia - BA",
                    "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00005ba.jpg?v=2022020512"
                ],
                [
                    "team_name" => "Sport - PE",
                    "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00012pe.jpg?v=2022020512"
                ],
                [
                    "team_name" => "Chapecoense - SC",
                    "team_flag" => "https://conteudo.cbf.com.br/cdn/imagens/escudos/00002sc.jpg?v=2022020512"
                ]
            ];

        DB::table('teams')->insert($teams);
    }
}

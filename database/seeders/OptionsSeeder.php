<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert(['title' => 'Fixo', 'group' => 'CNT']);
        DB::table('options')->insert(['title' => 'Celular', 'group' => 'CNT']);
        DB::table('options')->insert(['title' => 'Email', 'group' => 'CNT']);
        DB::table('options')->insert(['title' => 'Instagram', 'group' => 'CNT']);
        DB::table('options')->insert(['title' => 'Facebook', 'group' => 'CNT']);
        DB::table('options')->insert(['title' => 'Da minha paróquia (VEM, Segue-me)', 'group' => 'OTG']);
        DB::table('options')->insert(['title' => 'Da minha escola', 'group' => 'OTG']);
        DB::table('options')->insert(['title' => 'Da RCC (Canção Nova, Jovens com Cristo) ', 'group' => 'OTG']);
        DB::table('options')->insert(['title' => 'Da (Arqui)Diocese (EJA, Pastoral da Juventude) ', 'group' => 'OTG']);
        DB::table('options')->insert(['title' => 'Fundamental', 'group' => 'LVL']);
        DB::table('options')->insert(['title' => 'Médio', 'group' => 'LVL']);
        DB::table('options')->insert(['title' => 'Superior', 'group' => 'LVL']);
        DB::table('options')->insert(['title' => 'Pós-Graduação', 'group' => 'LVL']);
        DB::table('options')->insert(['title' => 'Bagé', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Brasília', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Brusque', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Cachoeira do Sul', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Caxias do Sul', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Cruz Alta', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Florianópolis', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Frederico Westphalen', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Itapetininga', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Joinville', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Juiz de Fora', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Jundiaí', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Lavras', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Mariana', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Pelotas', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Porto Alegre', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Rio Grande', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Santo Ângelo', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'São João Del-Rei', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'São Paulo', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Sorocaba', 'group' => 'CMN']);
        DB::table('options')->insert(['title' => 'Diretor Espiritual', 'group' => 'RLE']);
        DB::table('options')->insert(['title' => 'Timoneiro', 'group' => 'RLE']);
        DB::table('options')->insert(['title' => 'Cerimoniário', 'group' => 'RLE']);
        DB::table('options')->insert(['title' => 'Monitor', 'group' => 'RLE']);
        DB::table('options')->insert(['title' => 'Palestrante', 'group' => 'RLE']);
        DB::table('options')->insert(['title' => 'Cantor', 'group' => 'RLE']);
        DB::table('options')->insert(['title' => 'Cozinha', 'group' => 'TEM']);
        DB::table('options')->insert(['title' => 'Apoio', 'group' => 'TEM']);
        DB::table('options')->insert(['title' => 'Semanal', 'group' => 'FRQ']);
        DB::table('options')->insert(['title' => 'Mensal', 'group' => 'FRQ']);
        DB::table('options')->insert(['title' => 'Masculino', 'group' => 'GND']);
        DB::table('options')->insert(['title' => 'Feminino', 'group' => 'GND']);



    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsSeeder extends Seeder
{
    public function run()
    {
        Option::create(['title' => 'Fixo', 'group' => 'CNT']);
        Option::create(['title' => 'Celular', 'group' => 'CNT']);
        Option::create(['title' => 'Email', 'group' => 'CNT']);
        Option::create(['title' => 'Instagram', 'group' => 'CNT']);
        Option::create(['title' => 'Facebook', 'group' => 'CNT']);
        Option::create(['title' => 'Da minha paróquia (VEM, Segue-me)', 'group' => 'OTG']);
        Option::create(['title' => 'Da minha escola', 'group' => 'OTG']);
        Option::create(['title' => 'Da RCC (Canção Nova, Jovens com Cristo) ', 'group' => 'OTG']);
        Option::create(['title' => 'Da (Arqui)Diocese (EJA, Pastoral da Juventude) ', 'group' => 'OTG']);
        Option::create(['title' => 'Fundamental', 'group' => 'LVL']);
        Option::create(['title' => 'Médio', 'group' => 'LVL']);
        Option::create(['title' => 'Superior', 'group' => 'LVL']);
        Option::create(['title' => 'Pós-Graduação', 'group' => 'LVL']);
        Option::create(['title' => 'Bagé', 'group' => 'CMN']);
        Option::create(['title' => 'Brasília', 'group' => 'CMN']);
        Option::create(['title' => 'Brusque', 'group' => 'CMN']);
        Option::create(['title' => 'Cachoeira do Sul', 'group' => 'CMN']);
        Option::create(['title' => 'Caxias do Sul', 'group' => 'CMN']);
        Option::create(['title' => 'Cruz Alta', 'group' => 'CMN']);
        Option::create(['title' => 'Florianópolis', 'group' => 'CMN']);
        Option::create(['title' => 'Frederico Westphalen', 'group' => 'CMN']);
        Option::create(['title' => 'Itapetininga', 'group' => 'CMN']);
        Option::create(['title' => 'Joinville', 'group' => 'CMN']);
        Option::create(['title' => 'Juiz de Fora', 'group' => 'CMN']);
        Option::create(['title' => 'Jundiaí', 'group' => 'CMN']);
        Option::create(['title' => 'Lavras', 'group' => 'CMN']);
        Option::create(['title' => 'Mariana', 'group' => 'CMN']);
        Option::create(['title' => 'Pelotas', 'group' => 'CMN']);
        Option::create(['title' => 'Porto Alegre', 'group' => 'CMN']);
        Option::create(['title' => 'Rio Grande', 'group' => 'CMN']);
        Option::create(['title' => 'Santo Ângelo', 'group' => 'CMN']);
        Option::create(['title' => 'São João Del-Rei', 'group' => 'CMN']);
        Option::create(['title' => 'São Paulo', 'group' => 'CMN']);
        Option::create(['title' => 'Sorocaba', 'group' => 'CMN']);
        Option::create(['title' => 'Diretor Espiritual', 'group' => 'RLE']);
        Option::create(['title' => 'Timoneiro', 'group' => 'RLE']);
        Option::create(['title' => 'Cerimoniário', 'group' => 'RLE']);
        Option::create(['title' => 'Monitor', 'group' => 'RLE']);
        Option::create(['title' => 'Palestrante', 'group' => 'RLE']);
        Option::create(['title' => 'Cantor', 'group' => 'RLE']);
        Option::create(['title' => 'Cozinha', 'group' => 'TEM']);
        Option::create(['title' => 'Apoio', 'group' => 'TEM']);
        Option::create(['title' => 'Semanal', 'group' => 'FRQ']);
        Option::create(['title' => 'Mensal', 'group' => 'FRQ']);
        Option::create(['title' => 'Masculino', 'group' => 'GND']);
        Option::create(['title' => 'Feminino', 'group' => 'GND']);
        Option::create(['title' => 'AC', 'group' => 'UFS']);
        Option::create(['title' => 'AL', 'group' => 'UFS']);
        Option::create(['title' => 'AP', 'group' => 'UFS']);
        Option::create(['title' => 'AM', 'group' => 'UFS']);
        Option::create(['title' => 'BA', 'group' => 'UFS']);
        Option::create(['title' => 'CE', 'group' => 'UFS']);
        Option::create(['title' => 'DF', 'group' => 'UFS']);
        Option::create(['title' => 'ES', 'group' => 'UFS']);
        Option::create(['title' => 'GO', 'group' => 'UFS']);
        Option::create(['title' => 'MA', 'group' => 'UFS']);
        Option::create(['title' => 'MT', 'group' => 'UFS']);
        Option::create(['title' => 'MS', 'group' => 'UFS']);
        Option::create(['title' => 'MG', 'group' => 'UFS']);
        Option::create(['title' => 'PA', 'group' => 'UFS']);
        Option::create(['title' => 'PB', 'group' => 'UFS']);
        Option::create(['title' => 'PR', 'group' => 'UFS']);
        Option::create(['title' => 'PE', 'group' => 'UFS']);
        Option::create(['title' => 'PI', 'group' => 'UFS']);
        Option::create(['title' => 'RJ', 'group' => 'UFS']);
        Option::create(['title' => 'RN', 'group' => 'UFS']);
        Option::create(['title' => 'RS', 'group' => 'UFS']);
        Option::create(['title' => 'RO', 'group' => 'UFS']);
        Option::create(['title' => 'RR', 'group' => 'UFS']);
        Option::create(['title' => 'SC', 'group' => 'UFS']);
        Option::create(['title' => 'SP', 'group' => 'UFS']);
        Option::create(['title' => 'SE', 'group' => 'UFS']);
        Option::create(['title' => 'TO', 'group' => 'UFS']);
    }
}

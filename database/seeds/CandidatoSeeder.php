<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //ID 1
        DB::table('candidatos')->insert([
            'nome' => 'Anderson Lucca Dias',
            'email' => 'andersonluccadias@agacapital.com.br',
            'telefone' => '(98) 98893-6421',
            'usuario' => 'anderson',
            'senha' => bcrypt('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            
        ]);
    
        //ID 2
        DB::table('candidatos')->insert([
            'nome' => 'Marli Alice Emanuelly da Cruz',
            'email' => 'marli.alice.dacruz@gruposantin.com.br',
            'telefone' => '(48) 98811-4322',
            'usuario' => 'marli',
            'senha' => bcrypt('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')            
        ]);
    }
}

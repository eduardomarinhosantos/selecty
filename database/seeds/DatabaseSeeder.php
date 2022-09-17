<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        DB::table('admins')->insert([
            'nome' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $this->call(CandidatoSeeder::class);
        $this->call(CandidatoFormacaoAcademicaSeeder::class);
        $this->call(CandidatoExperienciaProfissionalSeeder::class);

    }
}
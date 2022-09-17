<?php

use App\Http\Middleware\ValidateToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ADM
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::resource('/candidato', 'adm\candidato\CandidatoController')->middleware('auth:admin');
Route::resource('/candidato/experienciaprofissional', 'adm\candidato\ExperienciaProfissionalController')->middleware('auth:admin');
Route::resource('/candidato/formacaoacademica', 'adm\candidato\FormacaoAcademicaController')->only([ 'edit', 'update', 'destroy' ])->middleware('auth:admin');

//CANDIDATO
Route::resource('/', 'Auth\LoginController@login');
/* Não houve tempo hábil para ser feito, mas seria a Área do Candidato */

//Site
Route::get('/', 'site\CadastroController@cadastro');
Route::post('/cadastro', 'site\CadastroController@store');


//Limpar Cache em Produção
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    exec('cd.. && composer dump-autoload');
})->middleware('auth:admin');

Auth::routes();


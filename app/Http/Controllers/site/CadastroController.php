<?php 

    namespace App\Http\Controllers\site;
    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use App\Models\candidato\Candidato;
    use App\Models\candidato\FormacaoAcademica;
    use Helper;

    class CadastroController extends Controller {

        public function cadastro() {
            return view( 'site.cadastro' );
        }      

        public function store( Request $request ){
            if($request->get('token') == csrf_token()) {

                $key = uniqid();

                $candidato = Candidato::create([
                    'nome' => $request->get('nome'),
                    'email' => $request->get('email'),
                    'telefone' => $request->get('telefone'),
                    'usuario' => 'user'.$key,
                    'senha' => 'senha'.$key
                ]);

                foreach($request->get('formacaoAcademica') as $formacaoAcademica) {
                    if( 
                        $formacaoAcademica['instituicao'] != '' &&
                        $formacaoAcademica['dataInicio'] != '' &&
                        $formacaoAcademica['dataTermino'] != '' &&
                        $formacaoAcademica['descricao'] != ''
                    ) {
                        FormacaoAcademica::create([
                            'candidato_id' => $candidato->id,
                            'instituicao' => $formacaoAcademica['instituicao'],
                            'data_inicio' => Helper::dataBRtoBD($formacaoAcademica['dataInicio']),
                            'data_termino' => Helper::dataBRtoBD($formacaoAcademica['dataTermino']),
                            'descricao' => $formacaoAcademica['descricao']
                        ]);
                    }
                }
            }
        }
    }
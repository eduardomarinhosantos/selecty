<?php 

    namespace App\Http\Controllers\adm\candidato;
    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use App\Models\candidato\Candidato;
    use Helper;

    class CandidatoController extends Controller {

        public function index(){

            return view(
                'adm.candidato.index', 
                ['registros' => Candidato::all()]
            );
        }

        public function show(Candidato $candidato){

            return view(
                'adm.candidato.show', 
                [
                    'titulo' => $candidato->nome, 
                    'candidato' => $candidato
                ]
            );
        }

        public function edit( $id ) {

            $candidato = Candidato::find( $id );

            return view(
                'adm.candidato.edit',
                [
                    'titulo' => $candidato->nome, 
                    'candidato' => $candidato
                ]
            );
        }

        public function update(Request $request, $id) {

            $candidato = Candidato::find( $id );
            
            //Atualiza Candidato
            $dados = $request->all();
            $dados['data'] = Helper::dataBRtoBD($data);
            $candidato->fill($dados)->save();      
            
            \Session::flash('message','Candidato Editado com Sucesso.'); 
            return redirect()->route('candidato.show', [ $id ]);
        }
        
        public function destroy( $id ) {

            $candidato = Candidato::find( $id );
            \Session::flash('message','Candidato Removido com Sucesso.'); 
            $candidato->removeRelacoes()->delete();
            return redirect()->route('candidato.index');
        }
    }
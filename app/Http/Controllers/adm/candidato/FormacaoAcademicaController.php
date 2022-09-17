<?php 

    namespace App\Http\Controllers\adm\candidato;
    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use App\Models\candidato\FormacaoAcademica;
    use Helper;

    class FormacaoAcademicaController extends Controller {

        public function edit( $id ) {

            $formacaoAcademica = FormacaoAcademica::find( $id );

            return view(
                'adm.candidato.formacaoacademica.edit',
                [
                    'titulo' => $formacaoAcademica->instituicao, 
                    'formacaoacademica' => $formacaoAcademica
                ]
            );
        }

        public function update(Request $request, $id) {

            $formacaoAcademica = FormacaoAcademica::find( $id );
            
            //Atualiza Candidato
            $dados = $request->all();
            $dados['data_inicio'] = Helper::dataBRtoBD( $dados['data_inicio'] );
            $dados['data_termino'] = Helper::dataBRtoBD( $dados['data_termino'] );
            $formacaoAcademica->fill($dados)->save();      
            
            \Session::flash('message','Formação Acadêmica Editada com Sucesso.'); 
            return redirect()->route('candidato.show', [ $id ]);
        }
        
        public function destroy( $id ) {
            
            $formacaoAcademica = FormacaoAcademica::find( $id );

            \Session::flash('message','Formação Acadêmica Removida com Sucesso.'); 
            $formacaoAcademica->delete();
            return redirect()->route('candidato.show', [ $id ]);
        }
    }
<?php 

    namespace App\Http\Controllers\adm\candidato;
    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use App\Models\candidato\ExperienciaProfissional;
    use Helper;

    class ExperienciaProfissionalController extends Controller {

        public function edit( $id ) {

            $experienciaProfissional = ExperienciaProfissional::find( $id );

            return view(
                'adm.candidato.experienciaprofissional.edit',
                [
                    'titulo' => $experienciaProfissional->empresa, 
                    'experienciaprofissional' => $experienciaProfissional
                ]
            );
        }

        public function update(Request $request, $id) {

            $experienciaProfissional = ExperienciaProfissional::find( $id );
            
            //Atualiza Candidato
            $dados = $request->all();
            $dados['data_admissao'] = Helper::dataBRtoBD( $dados['data_admissao'] );
            $dados['data_demissao'] = Helper::dataBRtoBD( $dados['data_demissao'] );
            $experienciaProfissional->fill($dados)->save();
      
            
            \Session::flash('message','Experiência Profissional Editada com Sucesso.'); 
            return redirect()->route('candidato.show', [ $id ]);
        }
        
        public function destroy( $id ) {

            $experienciaProfissional = ExperienciaProfissional::find( $id );

            \Session::flash('message','Experiência Profissional Removida com Sucesso.'); 
            $experienciaProfissional->delete();
            return redirect()->route('candidato.show', [ $cid ]);
        }
    }
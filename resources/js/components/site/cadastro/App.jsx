import axios from "axios";
import { times } from "lodash";
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import FormacaoAcademica from './FormacaoAcademica';

export default class App extends Component {
    
    constructor(props){

        super(props);

        this.state = {
          
            nome: '',
            email: '',
            telefone: '',
            erroNome: ' ',
            erroEmail: ' ',
            erroTelefone: ' ',
            tab: 1,
            formacaoAcademica: [],
            token: document.getElementsByName("token")[0].content,
        }        
        this.alternaTab = this.alternaTab.bind(this);
        this.handleNome = this.handleNome.bind(this);
        this.handleNome = this.handleNome.bind(this);
        this.handleTelefone = this.handleTelefone.bind(this);
        this.addFormacaoAcademica = this.addFormacaoAcademica.bind(this);
        this.updateFormacaoAcademica = this.updateFormacaoAcademica.bind(this);    
    }

    alternaTab( tab ) {
        this.setState({ tab });
    }

    handleNome( nome ) {
        const erroNome = (nome == '') ? 'O Campo Nome é Obrigatório' : '';
        this.setState({ nome, erroNome });
    }

    handleEmail( email ) {
        const erroEmail = (email == '') ? 'O Campo Email é Obrigatório' : '';
        this.setState({ email, erroEmail });
    }

    handleTelefone( telefone ) {
        const erroTelefone = (telefone == '') ? 'O Campo Telefone é Obrigatório' : '';
        this.setState({ telefone, erroTelefone });
    }

    addFormacaoAcademica() {

        this.setState(
            prevState => ({
                formacaoAcademica: [
                    ...prevState.formacaoAcademica, 
                    {
                        instituicao: '',
                        dataInicio: '',
                        dataTermino: '',
                        descricao: ''
                    }
                ]
            })
        );
    }

    updateFormacaoAcademica( formacaoAcademica ) {
        let formacaoAcademicaArray = [...this.state.formacaoAcademica];
        formacaoAcademicaArray[ formacaoAcademica.id ] = {
            instituicao: formacaoAcademica.instituicao,
            dataInicio: formacaoAcademica.dataInicio,
            dataTermino: formacaoAcademica.dataTermino,
            descricao: formacaoAcademica.descricao
        };
        this.setState({ formacaoAcademica: formacaoAcademicaArray }, () => console.log(this.state));
    }

    registrarCandidato() {
        axios
            .post( 
                `${ window.location.origin }/cadastro`, 
                {
                    nome: this.state.nome,
                    email: this.state.email,
                    telefone: this.state.telefone,
                    formacaoAcademica: this.state.formacaoAcademica,
                    token: this.state.token
                }, 
                { headers: { 
                    'Content-Type': 'application/json',
                    'token': this.state.token } } 
            ).then( () => alert('Cadastro Realizado com Sucesso!') )
            .catch( error => alert('Erro ao Cadastrar!') );
    }

    render() {

        return (
            <>
                { this.state.tab == 1 &&

                    <div className="card-body">
                        <label className="mr-2">Nome:</label>
                        <input 
                            className="form-control col-md-3 mr-3" 
                            type="text" 
                            style={{ display: 'inline' }}
                            value={ this.state.nome } 
                            onChange={ e => this.handleNome( e.target.value ) }/>
                        <label className="mr-2">Email:</label>
                        <input 
                            className="form-control col-md-3 mr-3" 
                            type="text" 
                            style={{ display: 'inline' }}
                            value={ this.state.email } 
                            onChange={ e => this.handleEmail( e.target.value ) }/>
                        <label className="mr-2">Telefone:</label>
                        <input 
                            className="form-control col-md-3 mr-3 telefone" 
                            type="text" 
                            style={{ display: 'inline' }}
                            value={ this.state.telefone } 
                            onChange={ e => this.handleTelefone( e.target.value ) }/>
                        <button 
                            className="btn btn-success"
                            disabled={ 
                                this.state.erroNome != '' || 
                                this.state.erroEmail != '' || 
                                this.state.erroTelefone != '' 
                            }
                            onClick={ () => this.alternaTab( 2 ) }
                        >Próximo</button>
                    </div>
                }
                { this.state.tab == 2 &&        
                
                    <div className="card-body">
                        <button
                            className="btn btn-primary" 
                            onClick={ () => this.addFormacaoAcademica() } > 
                            Adicionar Formação Acadêmica
                        </button>
                        
                        <div class="row">
                            {this.state.formacaoAcademica.map( ( el, index ) => {

                                return ( 
                                    <FormacaoAcademica 
                                        key={ index }
                                        id={ index }
                                        instituicao={ el.instituicao }
                                        dataInicio={ el.dataInicio }
                                        dataTermino={ el.dataTermino }
                                        descricao={ el.descricao }
                                        updateFormacaoAcademica={ this.updateFormacaoAcademica } /> 
                                )
                            })}
                        </div>

                        <button 
                            className="btn btn-danger mt-3 mr-3"
                            disabled={ 
                                this.state.erroNome != '' || 
                                this.state.erroEmail != '' || 
                                this.state.erroTelefone != '' 
                            }
                            onClick={ () => this.alternaTab( 1 ) }
                        >Voltar</button>
                        <button 
                            className="btn btn-success mt-3"                            
                            onClick={ () => this.registrarCandidato( 1 ) }
                        >Cadastrar</button>
                    </div>
                }
            </>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
import axios from "axios";
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class FormacaoAcademica extends Component {
    
    constructor(props){

        super(props);

        this.state = {

            id: props.id,
            instituicao: props.instituicao,
            dataInicio: props.dataInicio,
            dataTermino: props.dataTermino,
            descricao: props.descricao
        }        
        this.alternaTab = this.alternaTab.bind(this);
        this.handleInstituicao = this.handleInstituicao.bind(this);
        this.handleDataInicio = this.handleDataInicio.bind(this);
        this.handleDataTermino = this.handleDataTermino.bind(this);
        this.handleDescricao = this.handleDescricao.bind(this);
        this.handleReturnFormacaoAcademica = this.handleReturnFormacaoAcademica.bind(this); 
    }

    alternaTab( tab ) {
        this.setState({ tab });
    }

    handleInstituicao( instituicao ) {
        this.setState({ instituicao }, () => this.handleReturnFormacaoAcademica() );
    }

    handleDataInicio( dataInicio ) {
        this.setState({ dataInicio }, () => this.handleReturnFormacaoAcademica() );
    }

    handleDataTermino( dataTermino ) {
        this.setState({ dataTermino }, () => this.handleReturnFormacaoAcademica() );
    }

    handleDescricao( descricao ) {
        this.setState({ descricao }, () => this.handleReturnFormacaoAcademica() );
    }

   handleReturnFormacaoAcademica() {

        this.props.updateFormacaoAcademica({
            id: this.state.id,
            instituicao: this.state.instituicao,
            dataInicio: this.state.dataInicio,
            dataTermino: this.state.dataTermino,
            descricao: this.state.descricao
        });
   }   

    render() {

        return (
            <>
                <div className="card col-md-3 pt-3 pb-3 mt-3 mr-3">
                    <label className="mr-2 mt-2 mb-0">Instituicao:</label>
                    <input 
                        className="form-control mr-3" 
                        type="text" 
                        value={ this.state.instituicao } 
                        onChange={ e => this.handleInstituicao( e.target.value ) }/>
                    <label className="mr-2 mt-2 mb-0">Data de Início:</label>
                    <input 
                        className="form-control mr-3 data" 
                        type="text" 
                        value={ this.state.dataInicio } 
                        onChange={ e => this.handleDataInicio( e.target.value ) }/>
                    <label className="mr-2 mt-2 mb-0">Data de Término:</label>
                    <input 
                        className="form-control mr-3 data" 
                        type="text" 
                        value={ this.state.dataTermino } 
                        onChange={ e => this.handleDataTermino( e.target.value ) }/>
                    <label className="mr-2 mt-2 mb-0" >Descrição:</label>
                    <textarea 
                        className="form-control mr-3" 
                        type="text" 
                        value={ this.state.descricao } 
                        onChange={ e => this.handleDescricao( e.target.value ) }></textarea>                    
                </div>
            </>
        );
    }
}
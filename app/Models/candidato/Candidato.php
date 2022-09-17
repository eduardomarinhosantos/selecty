<?php

namespace App\Models\candidato;

use Illuminate\Database\Eloquent\Model;
use App\CandidatoExperienciaProfissional;

class Candidato extends Model
{

    protected $fillable = [
        'id',
        'nome', 
        'email', 
        'telefone',
        'usuario',
        'senha'
    ];

    public function experiencia_profissional(){
      return $this->hasMany(ExperienciaProfissional::class);
    }

    public function formacao_academica() {
      return $this->hasMany(FormacaoAcademica::class);
    }

    public function removeRelacoes() {

      //Remove Experiências Profissionais
      foreach($this->experiencia_profissional as $experiencia_profissional) { 
          $experiencia_profissional->delete();
      }

      //Remove Formações Acadêmicas
      foreach($this->formacao_academica as $formacao_academica) {
          $formacao_academica->delete();
      }
      
      return $this;
  }
}

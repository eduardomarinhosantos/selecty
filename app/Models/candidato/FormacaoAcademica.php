<?php

namespace App\Models\candidato;

use Illuminate\Database\Eloquent\Model;

class FormacaoAcademica extends Model
{

  public $table = 'candidato_formacao_academica';

  protected $fillable = [
      'candidato_id',
      'instituicao', 
      'data_inicio', 
      'data_termino',
      'descricao'
  ];

  public function candidato(){
    return $this->belongsTo('App\Models\candidato\Candidato')->withDefault();
  }

}

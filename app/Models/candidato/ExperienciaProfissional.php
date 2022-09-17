<?php

namespace App\Models\candidato;

use Illuminate\Database\Eloquent\Model;

class ExperienciaProfissional extends Model
{

  public $table = 'candidato_experiencia_profissional';

  protected $fillable = [
      'candidato_id',
      'empresa', 
      'data_admissao', 
      'data_demissao',
      'descricao'
  ];

  public function candidato(){
    return $this->belongsTo('App\Models\candidato\Candidato')->withDefault();
  }

}

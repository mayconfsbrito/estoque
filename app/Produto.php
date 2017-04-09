<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'nome',
		'descricao',
		'valor',
		'quantidade',
		'tamanho'
	];

	protected $guarded = [
		'id'
	];

	public function categoria(){
		return $this->belongsTo('estoque\Categoria');
	}
}

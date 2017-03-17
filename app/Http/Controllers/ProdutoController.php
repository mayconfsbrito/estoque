<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;

class ProdutoController extends Controller {

    public function lista(){

        $produtos = Produto::all();

        return view('produto/listagem')->with([
        	'produtos' => $produtos
        ]);
    }

    public function mostra()
    {
    	$id = Request::route('id');
    	$produto = Produto::find($id);

    	if(empty($produto)) {
			return "Esse produto não existe";
		}

    	return view ('produto/detalhes')->with('p', $produto);
    }

    public function novo()
    {
    	return view('produto/formulario');
    }

    public function adiciona()
    {
        if(empty(Request::input('id'))){
            Produto::create(Request::all());
        } else {
            $produto = Produto::find(Request::input('id'));
            $produto->nome = Request::input('nome');
            $produto->descricao = Request::input('descricao');
            $produto->valor = Request::input('valor');
            $produto->tamanho = Request::input('tamanho');
            $produto->save();
        }

    	return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function alterar()
    {
        $produto = Produto::find(Request::route('id'));
        return view('produto/formulario')
            ->with('p', $produto);
    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete($id);

        return Redirect()
            ->action('ProdutoController@lista');
    }

    public function listaJson()
    {
    	$produtos = Produto::all();
    	return $produtos;
    }
}
<?php

namespace estoque\Http\Controllers;

use estoque\Produto;
use estoque\Http\Requests\ProdutoRequest;
use Request;

class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['adiciona', 'remove']
        ]);
    }

    public function lista()
    {
        $produtos = Produto::all();

        return view('produto/listagem')->with([
            'produtos' => $produtos,
        ]);
    }

    public function mostra()
    {
        $id = Request::route('id');
        $produto = Produto::find($id);

        if (empty($produto)) {
            return 'Esse produto não existe';
        }

        return view('produto/detalhes')->with('p', $produto);
    }

    public function novo()
    {
        return view('produto/formulario');
    }

    public function adiciona(ProdutoRequest $requrest)
    {
        if (empty($request->input('id'))) {
            Produto::create($request->all());
        } else {
            $produto = Produto::find($request->input('id'));
            $produto->nome = $request->input('nome');
            $produto->descricao = $request->input('descricao');
            $produto->valor = $request->input('valor');
            $produto->tamanho = $request->input('tamanho');
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

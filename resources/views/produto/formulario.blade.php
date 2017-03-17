@extends('layout.principal')

@section('conteudo')

<h1>Novo produto</h1>

<form action="/produtos/adiciona" method="post">
	<input type="hidden" name="_token" value="{{{csrf_token()}}}" />
  <div class="form-group">
    <label>Nome</label>
    <input name="nome" class="form-control" value="{{ @$p->nome }}"/>
  </div>
  <div class="form-group">
    <label>Descricao</label>
    <input name="descricao" class="form-control"  value="{{ @$p->descricao }}"/>
  </div>
  <div class="form-group">
    <label>Valor</label>
    <input name="valor" class="form-control" value="{{ @$p->valor }}"/>
  </div>
  <div class="form-group">
    <label>Quantidade</label>
    <input type="number" name="quantidade" class="form-control" value="{{ @$p->quantidade }}"/>
  </div>
  <div class="form-group">
    <label>Tamanho</label>
    <input type="text" name="tamanho" class="form-control" value="{{ @$p->tamanho }}"/>
  </div>
@if(isset($p))
  <input type="hidden" name="id" value="{{ $p->id }}" />
@endif
  <button type="submit"
    class="btn btn-primary btn-block">Submit</button>
</form>

@stop
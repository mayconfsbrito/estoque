@extends('layout.principal')

@section('conteudo')

<h1>Novo produto</h1>

@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="/produtos/adiciona" method="post">
	<input type="hidden" name="_token" value="{{{csrf_token()}}}" />
  <div class="form-group">
    <label>Nome</label>
    <input name="nome" class="form-control" value="{{ $p->nome or old('nome') }}"/>
  </div>
  <div class="form-group">
    <label>Descricao</label>
    <input name="descricao" class="form-control"  value="{{ $p->descricao or old('descricao') }}"/>
  </div>
  <div class="form-group">
    <label>Valor</label>
    <input name="valor" class="form-control" value="{{ $p->valor or old('valor') }}"/>
  </div>
  <div class="form-group">
    <label>Quantidade</label>
    <input type="number" name="quantidade" class="form-control" value="{{ $p->quantidade or old('quantidade') }}"/>
  </div>
  <div class="form-group">
    <label>Tamanho</label>
    <input type="text" name="tamanho" class="form-control" value="{{ $p->tamanho or old('tamanho') }}"/>
  </div>
  <div class="form-group">
    <label>Categoria</label>
    <select name="categoria_id" class="form-control">
        @foreach($categorias as $c)
        <option value="{{$c->id}}">{{$c->nome}}</option>
        @endforeach
    </select>
</div>
@if(isset($p))
  <input type="hidden" name="id" value="{{ $p->id }}" />
@endif
  <button type="submit"
    class="btn btn-primary btn-block">Submit</button>
</form>

@stop
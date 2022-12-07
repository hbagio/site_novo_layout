@section('title', 'Fazendo Festa | Categoria')
@extends('layouts.main')
@section('content')

<section class="galeria">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Alterar Categoria</h1><br>
        <form class="card flex_col" action="/events/updateCategoria" method="POST">
            @csrf
            <div class="flex_col col_10">
                <div class="container_campo">
                    <label class="campo_label col_4">Código</label>
                    <div class="campo">
                        <input type="number" name="id" value="{{$categoria->id}}" readonly>
                    </div>
                </div>
                <br>
                <div class="container_campo">
                    <label class="campo_label col_4">Descrição</label>
                    <div class="campo">
                        <input type="text" name="descricao" value="{{$categoria->descricao}}">
                    </div>
                </div>
            </div>
            <br>
            <input type="submit" class="card_acao col_10" value="Alterar"><br>
            <a href="/events/cadastroCategoria" class="card_acao muted col_6">Voltar</a>
        </form>
    </div>
</section>
@endsection

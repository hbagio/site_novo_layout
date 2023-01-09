@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Alterar Produto</h1><br>
            <form class="card flex_col col_12" action="/events/updateProduto" method="POST" enctype="multipart/form-data">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Categoria</label>
                    <div class="campo">
                        <input type="text" name="categoria" readonly value="{{ $categoria->descricao }}">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Código</label>
                    <div class="campo">
                        <input type="text" name="id" readonly value="{{ $produto->id }}">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Nome</label>
                    <div class="campo">
                        <input type="text" name="nome" placeholder="Identificação do Produto"
                            value="{{ $produto->nome }}">
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Destaque</label>
                    <div class="campo">
                        <select name="destaque" required>
                            @if ($produto->destaque == 1)
                                <option value="{{$produto->destaque }}">Sim</option>
                                <option value="0">Não</option>
                            @else
                                <option value="{{$produto->destaque }}">Não</option>
                                <option value="1">Sim</option>
                            @endif
                        </select>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Valor R$</label>
                    <div class="campo">
                        <input type="number" name="valor" placeholder="Valor do Produto" value="{{ $produto->valor }}">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                    <label class="campo_label col_3">Descrição</label>
                    <div class="campo">
                        <textarea name="descricao" rows="5" name="descricao" placeholder="Descrição detalhada do Produto">{{ $produto->descricao }}</textarea>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Imagem</label>
                    <div class="campo">
                        <input type="file" name="imagem">
                    </div>
                </div>
                <br>
                <input type="submit" class="card_acao col_10" value="Alterar"><br>
                <a href="/events/listarProduto" class="card_acao muted col_5">Voltar</a>
            </form>
        </div>
    </section>
@endsection

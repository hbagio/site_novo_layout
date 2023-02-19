@extends('layouts.main')

@section('title', $produto->nome)

@section('content')

    <div class="grid_container container">>
        <div class="produto grid_container_item">
            <div id="image-container" class="col-md-6">
                <img src="/img/produtos/{{ $produto->imagem }}" class="img-fluid" alt="{{ $produto->nome }}">
            </div>
        </div>
        <div class="produto grid_container_item">
            <div id="image-container" class="col-md-6">
                <div class="container_campo col_6">
                    <label class="campo_label col_3">Categoria</label>
                    <div class="campo">

                    </div>
                </div>
                <br>
                <div class="container_campo col_6">
                    <label class="campo_label col_3">Nome</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="identificacao" id="identificacao"
                            placeholder="Identificação do Produto" required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_6">
                    <label class="campo_label col_3">Destaque</label>
                    <div class="campo">
                        <select name="destaque" required>
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="container_campo col_6">
                    <label class="campo_label col_3">Valor R$</label>
                    <div class="campo">
                        <input type="number" class="form-control"name="valor" id="valor"
                            placeholder="Valor do Produto">
                    </div>
                </div>
                <br>
                <div class="container_campo col_6 campo_text_area" style="height: 5em;">
                    <label class="campo_label col_3">Descrição</label>
                    <div class="campo">
                        <textarea name="descricao" rows="5" name="descricao" placeholder="Descrição detalhada do Produto" required></textarea>
                    </div>
                </div>
                <br>

                <input type="submit" class="card_acao col_6" value="Cadastrar"><br>
                <a href="/events/listarProduto" class="card_acao muted col_5">Voltar</a>

            </div>
        </div>
    </div>

@endsection

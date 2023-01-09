@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Produtos</h1><br>
            <div class="card flex_col">
                <div class="flex_row col_12">
                    <a href="/events/cadastroProduto" class="card_acao">Novo Produto</a>
                    <a href="/events/gerenciamento" class="card_acao muted col_6" style="margin-right:5px">Voltar</a>
                    <a href="/events/cadastroCategoria" class="card_acao muted col_6"
                        style="margin-right:5px">Categorias</a>
                </div>
                <br>
                <table class="lista_consulta">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Valor R$</th>
                        <th>Destaque</th>
                        <th>Ações</th>
                    </tr>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td> {{ $produto->id }} </td>
                            <td> {{ $produto->nome }} </td>
                            <td> {{ $produto->valor }}</td>
                            @if ($produto->destaque == 0)
                                <td>Não</td>
                            @else
                                <td>Sim</td>
                            @endif

                            <td>
                                <div class="flex_col">
                                    <a class="lista_consulta_acao editar" href="/events/alterarProduto/{{ $produto->id }}"
                                        role="button">Editar <i class="fa-solid fa-pen"></i></a>
                                    <a class="lista_consulta_acao excluir" href="/events/excluirProduto/{{ $produto->id }}"
                                        role="button">Excluir <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection

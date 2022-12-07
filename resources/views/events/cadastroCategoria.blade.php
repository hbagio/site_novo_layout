@section('title', 'Fazendo Festa | Categoria')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Categoria</h1><br>
        <div class="card flex_col">
            <a href="/events/gerenciamento" class="card_acao muted col_6">Voltar</a>
            <br>
            <form class="col_12" action="/events/insereCategoria" method="POST">
                @csrf
                <div class="container_campo">
                    <div class="campo">
                        <input type="text" name="descricao" placeholder="Nova Categoria...">
                    </div>
                    <input class="campo_acao" type="submit" value="Cadastrar" />
                </div>
            </form>
            <br>
            <table class="lista_consulta">
                <tr>
                    <th class="lista_consulta_cabecalho">Código</th>
                    <th class="lista_consulta_cabecalho">Descrição</th>
                    <th class="lista_consulta_cabecalho">Ações</th>
                </tr>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->descricao }}</td>
                    <td>
                        <div class="flex_col">
                            <a class="lista_consulta_acao editar" href="/events/alterarCategoria/{{ $categoria->id }}">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="lista_consulta_acao excluir" href="/events/excluirCategoria/{{ $categoria->id }}">Excluir <i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Clientes</h1><br>
            <div class="card flex_col">
                <div class="flex_row col_12">
                    <a href="cadastrarPessoas" class="card_acao  col_6">Cadastrar Cliente</a>
                    <a href="/events/gerenciamento" class="card_acao muted col_6" style="margin-right:5px">Voltar</a>
                </div>
                <br>
                <table class="lista_consulta">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Cpf/Cnpj</th>
                       {{-- <th>Endereço</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Cep</th>--}}
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td> {{ $pessoa->id }} </td>
                            <td> {{ $pessoa->nome }} </td>
                            @if ($pessoa->tipo == 0)
                                <td>Fisica</td>
                            @else
                                <td>Juridica</td>
                            @endif
                            <td> {{ $pessoa->cpfcnpj}} </td>
                           {{-- <td> {{ $pessoa->endereco}} </td>
                            <td> {{ $pessoa->bairro}} </td>
                            <td> {{ $pessoa->cidade}} </td>
                            <td> {{ $pessoa->estado}} </td>
                            <td> {{ $pessoa->cep}} </td>--}}
                            <td> {{ $pessoa->telefone}} </td>
                            <td> {{ $pessoa->email}} </td>
                            <td>
                                <div class="flex_col">
                                    <a class="lista_consulta_acao editar" href="/events/alterarPessoa/{{ $pessoa->id }}"
                                        role="button">Editar <i class="fa-solid fa-pen"></i></a>
                                    <a class="lista_consulta_acao excluir" href="/events/excluirPessoa/{{ $pessoa->id }}"
                                        role="button">Excluir <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="produto_nome" style="text-align: center">
            {{ $pessoas->links() }}
        </div>
    </section>
@endsection


@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Alterar Pessoa</h1><br>
            <form class="card flex_col col_12" action="/events/updatePessoa/" method="POST" enctype="multipart/form-data">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Código</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $pessoa->id }}"
                             readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Nome</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ $pessoa->nome }}"
                            required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Tipo</label>
                    <div class="campo">

                        <input name="tipo" style="text-align: left" readonly
                            @switch($pessoa->tipo)
                            @case(0)
                                value= 'Fisica'
                                @break
                            @case(1)
                                value='Juridico'
                                @break
                            @default
                        @endswitch
                            required>

                    </div>
                </div>

                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cpf/Cnpj</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cpfcnpj" id="cpfcnpj"
                            value="{{ $pessoa->cpfcnpj }}" required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Endereço</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="endereco" id="endereco"
                            value="{{ $pessoa->endereco }}" required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cep</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cep" id="cep" value="{{ $pessoa->cpfcnpj }}"
                            required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Bairro</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="bairro" id="bairro" value="{{ $pessoa->bairro }}"
                            required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cidade</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cidade" id="cidade" value="{{ $pessoa->cidade }}"
                            required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Estado</label>
                    <div class="campo">
                        <div class="campo">
                            <select name="estado" style="text-align: left" required>
                                <option value="{{$pessoa->estado}}">{{$pessoa->estado}}</option>
                                <option value="AC - Acre">AC - Acre</option>
                                <option value="AL - Alagoas">AL - Alagoas</option>
                                <option value="AP - Amapá">AP - Amapá</option>
                                <option value="AM - Amazonas">AM - Amazonas</option>
                                <option value="BA - Bahia">BA - Bahia</option>
                                <option value="CE - Ceará">CE - Ceará</option>
                                <option value="ES - pírito Santo">ES - pírito Santo</option>
                                <option value="GO - Goiás">GO - Goiás</option>
                                <option value="MA - Maranhão">MA - Maranhão</option>
                                <option value="MT - Mato Grosso">MT - Mato Grosso</option>
                                <option value="MS - Mato Grosso do Sul">MS - Mato Grosso do Sul</option>
                                <option value="MG - Minas Gerais">MG - Minas Gerais</option>
                                <option value="PA - Pará">PA - Pará</option>
                                <option value="PB - ParaíbaB">PB - Paraíba</option>
                                <option value="PR - Paraná">PR - Paraná</option>
                                <option value="PE - Pernambuco">PE - Pernambuco</option>
                                <option value="PI - Piauí">PI - Piauí</option>
                                <option value="RJ - Rio de Janeiro">RJ - Rio de Janeiro</option>
                                <option value="RN - Rio Grande do Norte">RN - Rio Grande do Norte</option>
                                <option value="RS - Rio Grande do Sul">RS - Rio Grande do Sul</option>
                                <option value="RO - Rondônia">RO - Rondônia</option>
                                <option value="RR - Roraima">RR - Roraima</option>
                                <option value="SC - Santa Catarina">SC - Santa Catarina</option>
                                <option value="SP - São Paulo">SP - São Paulo</option>
                                <option value="SE - Sergipe">SE - Sergipe</option>
                                <option value="TO - Tocantins">TO - Tocantins</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Telefone</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="telefone" id="telefone" required
                            value="{{ $pessoa->telefone }}">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Email</label>
                    <div class="campo">
                        <input type="email" class="form-control"name="email" id="email" required
                            value="{{ $pessoa->email }}"">
                    </div>
                </div>

                <br>

                <div class="flex_row col_10">
                    <input type="submit" class="card_acao" value="Alterar">
                    <a class="card_acao muted " href="/events/consultaPessoas" style="margin-right:5px">Voltar</a>
                </div>

            </form>
        </div>
    </section>
@endsection

@section('title', 'Fazendo Festa | Empresa')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
    <h1 class="titulo_grande cor_escuro_50">Alteração dos Dados da Empresa</h1><br>
        <form class="card flex_col" action="/events/dadosEmpresa/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container_campo col_10">
                <label class="campo_label col_4">ID Empresa</label>
                <div class="campo">
                    <input type="number" name="id" value="{{ $dadosEmpresa->id }}" readonly>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">CNPJ</label>
                <div class="campo">
                    <input type="text" name="cnpj" value="{{ $dadosEmpresa->cnpj }}" placeholder="Número do Cnpj" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-instagram"></i> Instagram</label>
                <div class="campo">
                    <input type="text" name="instagram" value="{{ $dadosEmpresa->instagram }}">
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-facebook-f"></i> Facebook</label>
                <div class="campo">
                    <input type="text" name="facebook" value="{{ $dadosEmpresa->facebook }}">
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-whatsapp"></i> Whatsapp</label>
                <div class="campo">
                    <input type="text" name="whatsapp" value="{{ $dadosEmpresa->whatsapp }}" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">Telefone</label>
                <div class="campo">
                    <input type="text" name="telefone" value="{{ $dadosEmpresa->telefone }}" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">E-mail</label>
                <div class="campo">
                    <input type="email" name="email" value="{{ $dadosEmpresa->email }}" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">Endereço Completo</label>
                <div class="campo">
                    <input type="text" name="endereco" value="{{ $dadosEmpresa->endereco }}" required>
                </div>
            </div><br>
            <input type="submit" class="card_acao col_10" value="Salvar Alteração"><br>
            <a href="/events/gerenciamento" class="card_acao muted col_4">Voltar</a>
        </form>
    </div>
</section>
@endsection
@section('title', 'Fazendo Festa | Sobre')
@extends('layouts.main')
@section('content')
<section class="galeria flex_col">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Informações Sobre a Empresa</h1><br>
        <article class="card flex_col">
            <div class="card_titulo titulo_grande" style="filter: grayscale(100%) opacity(.3);">
                @include('/components/logo', ['firstName' => 'fazendo', 'secondName' => 'festa', 'cssClass' => ''])
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">CNPJ</label>
                <h4 class="campo">{{ $dadosEmpresa->cnpj }}</h4>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">Razão Social</label>
                <h4 class="campo">{{ $dadosEmpresa->nomeempresa }}</h4>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-instagram"></i> Instagram</label>
                <span class="campo">
                    <a href="{{$dadosEmpresa->instagram}}" target="_blank">{{$dadosEmpresa->instagram}}</a>
                </span>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-facebook-f"></i> Facebook</label>
                <span class="campo">
                    <a class="campo" href="{{$dadosEmpresa->facebook}}" target="_blank">{{$dadosEmpresa->facebook}}</a>
                </span>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-whatsapp"></i> Whatsapp</label>
                <span class="campo">
                    <a class="campo" href="{{$whatsapp}}" target="_blank">{{ $dadosEmpresa->whatsapp }}</a>
                </span>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">Telefone</label>
                <h4 class="campo">{{ $dadosEmpresa->telefone }}</h4>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">E-mail</label>
                <h4 class="campo">{{ $dadosEmpresa->email }}</h4>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">Endereço Completo</label>
                <h4 class="campo">{{ $dadosEmpresa->endereco }}</h4>
            </div>
        </article>
    </div>
</section>
@endsection

@section('title', 'Fazendo Festa | Empresa')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
    <h1 class="titulo_grande cor_escuro_50">Novos dados de Empresa</h1><br>
    <form class="card flex_col" action="/events/dadosEmpresa/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container_campo col_10">
                <label class="campo_label col_4">CNPJ</label>
                <div class="campo">
                    <input type="text" name="cnpj" placeholder="cnpj da empresa" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-instagram"></i> Instagram</label>
                <div class="campo">
                    <input type="text" name="instagram" placeholder="endereço perfil do instagram" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-facebook-f"></i> Facebook</label>
                <div class="campo">
                    <input type="text" name="facebook" placeholder="endereço perfil do facebook" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4"><i class="fa-brands fa-whatsapp"></i> Whatsapp</label>
                <div class="campo">
                    <input type="text" name="whatsapp" placeholder="número do whatsapp" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">Telefone</label>
                <div class="campo">
                    <input type="text" name="telefone" placeholder="número de telefone" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">E-mail</label>
                <div class="campo">
                    <input type="email" name="email" placeholder="seu melhor email" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_4">Endereço Completo</label>
                <div class="campo">
                    <input type="text" name="endereco" placeholder="endereço empresa" required>
                </div>
            </div><br>
            <input type="submit" class="card_acao col_10" value="Cadastrar empresa"><br>
            <a href="/events/gerenciamento" class="card_acao muted col_4">Voltar</a>
        </form>
    </div>
</section>
@endsection
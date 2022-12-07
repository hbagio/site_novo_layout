@section('title', 'Fazendo Festa | Usuário')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Novo Usuário</h1><br>
        <form class="card flex_col" autocomplete="off" action="/events/storeUsuario" method="POST" >
            {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
            @csrf
            <div class="container_campo col_10">
                <label class="campo_label col_3">Nome</label>
                <div class="campo">
                    <input type="text" name="name" placeholder="nome de usuário" autocomplete="off" required />
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">E-mail</label>
                <div class="campo">
                    <input type="email" name="email" placeholder="email do usuário" autocomplete="off" required />
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Senha</label>
                <div class="campo">
                    <input type="password" name="password" placeholder="informe a senha" minlength="7" maxlength="14" autocomplete="off" required />
                </div>
            </div><br>
            <input type="submit" class="card_acao col_10" value="Cadastrar"><br>
            <a class="card_acao muted col_6" href="/events/consultaUsuario">Voltar</a>
        </form>
    </div>
</section>
@endsection

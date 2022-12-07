@section('title', 'Fazendo Festa | Usuário')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Alterar Usuário</h1><br>
        <form class="card flex_col" action="/events/updateUsuario" method="POST">
            {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
            @csrf
            <div class="container_campo col_10">
                <label class="campo_label col_3">Código</label>
                <div class="campo">
                    <input type="text" name="id" value="{{$usuario->id}}" readonly>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Nome</label>
                <div class="campo">
                    <input type="text" name="name" value="{{$usuario->name}}" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">E-mail</label>
                <div class="campo">
                    <input type="email" name="email" value="{{$usuario->email}}" required>
                </div>
            </div><br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Senha</label>
                <div class="campo">
                    <input type="password" name="password" value="{{$usuario->password}}" required placeholder="nova senha" minlength="7" maxlength="14">
                </div>
            </div><br>
            <p class="titulo_pequeno cor_escuro_50">A senha só será alterada se informar uma nova, caso contrário será mantido a senha antiga!</p>
            <br>
            <input type="submit" class="card_acao col_10" value="Alterar"><br>
            <a class="card_acao muted col_6" href="/events/consultaUsuario">Voltar</a>

        </form>

    </div>
</section>
@endsection

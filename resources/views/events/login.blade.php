@section('title', 'Fazendo Festa | Login')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container centralize_item" style="height: 100vh">
        <form action="/login" method="POST" class="card flex_col col_10" style="min-height:400px;">
            @csrf
            <div class="card_titulo titulo_grande"><i class="fa-solid fa-door-open card_icone"></i>Login</div>
            <div class="container_campo col_12">
                <label class="campo_label col_3">Usuário</label>
                <div class="campo">
                    <input type="text" id="email" name="email" class="form-control" placeholder="seu login  " autocomplete="off" required="">
                </div>
            </div>
            <br>
            <div class="container_campo col_12">
                <label class="campo_label col_3">Senha</label>
                <div class="campo">
                    <input type="password" id="password" name="password" class="form-control" placeholder="sua senha" autocomplete="off" required="">
                </div>
            </div>
            <br>
            <button type="submit" class="card_acao">Entrar</button>
            <br>
            <a href="/recuperacaoSenha" class="card_acao muted col_6">Esqueci minha senha</a>
        </form>
    </div>
</section>
@endsection

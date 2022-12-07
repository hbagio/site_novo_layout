@section('title', 'Fazendo Festa | Login')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Recuperação de Senha</h1><br>
        <form class="card flex_col" autocomplete="off" name="formLogin" onsubmit="Principal.onSubmitFormularioRecuperacaoSenha(event)">
            {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
            @csrf
            <h4 class="card_titulo titulo_medio">Informe seu email abaixo para envio da nova senha!</h4>
            <div class="container_campo col_12">
                <label class="campo_label col_4">E-mail</label>
                <div class="campo">
                    <input type="email" name="email" placeholder="email de usuário" autocomplete="off" required>
                </div>
            </div>
            <input type="submit" class="card_acao" value="Recuperar">
            <a class="card_acao muted col_6" href="/usuario">Voltar</a>
        </form>
    </div>
    @include('/components/mensagem')
</section>
@endsection

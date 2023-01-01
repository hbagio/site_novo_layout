@section('title', 'Fazendo Festa | Login')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Recuperação de Senha</h1><br>
            <form class="card flex_col" autocomplete="off" name="formLogin" action="/events/recuperaSenhaUsuario" method="POST">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf
                <h4 class="card_titulo titulo_medio">Informe seu email abaixo para envio da nova senha!</h4>
                <div class="container_campo col_12">
                    <label class="campo_label col_4">E-mail</label>
                    <div class="campo">
                        <input type="email" name="email" id="email" placeholder="email de usuário" autocomplete="off" required>
                    </div>
                </div>
                        <p id="retorno"  name="retorno"></p>
                <input type="button" class="card_acao" value="Recuperar Senha" id="btnRecuperar" name="btnRecuperar">
                <a class="card_acao muted col_6" href="/usuario">Voltar</a>
            </form>
            <script>
                // Pelo form manda pode mandar tela toda, type POST
                /*$(function() {
                    $('form[name="formLogin"]').submit(function(event) {
                        //Evita o evento padrão que é default
                        event.preventDefault();*/

                $("#btnRecuperar").click(function() {
                    let email = $("#email").val();

                    $.ajax({
                        url: 'events/validaEmailUsuario',
                        type: 'get',
                        data: {
                            'email': email
                        },
                        dateType: 'json',
                        success: function(response) {

                            if (response.emailValido === false) {
                                $("#retorno").html(response.mensagem);
                            } else {
                                $('form[name="formLogin"]').submit();
                            }

                        }
                    })

                });
            </script>
        </div>
        @include('/components/mensagem')
    </section>
@endsection

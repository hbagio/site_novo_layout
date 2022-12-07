{{ $isVisivelInicialmente ?? $isVisivelInicialmente = false }}
{{ $mensagem              ?? $mensagem              = ''    }}
<h1 class="mensagem titulo_pequeno cor_escuro_50" style="display:{{ $isVisivelInicialmente ? 'flex' : 'none' }}" onclick="Principal.fechaMensagem()">
    {{ $mensagem }}
</h1>
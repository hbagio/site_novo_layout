<div class="produto grid_container_item" onclick="Principal.abreModalProduto('{{ $produto->id }}')">
    <span class="produto_categoria">{{ $produto->descricaoCategoria }}</span>
    <div class="produto_imagem">
        <img src="/img/produtos/{{ $produto->imagem }}" alt="{{ $produto->nome }}">
    </div>

    <div class="produto_info" >
        <h1 class="produto_nome">{{ $produto->nome }}</h1>
        <p class="produto_descricao">{{ $produto->descricao }}</p>
        <footer>
            <h1 class="produto_valor">
                @if ($produto->valor > 0)
                    R$ {{ number_format($produto->valor, 2, ',') }}
                @else
                    À Combinar
                @endif
            </h1>
                <button class="produto_acesso" onclick="Principal.abreModalProduto('{{ $produto->id }}')">Ver mais</button>
                {{--<a class="produto_acesso" href="/events/detalhes/{{$produto->id}}">Detalhes</a>--}}
        </footer>
    </div>
</div>

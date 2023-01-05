@extends('layouts.main')
@section('title', 'Fazendo Festa | Home')
@section('content')
    <section class="galeria">
        @include('/components/toolbar')
        <div class="grid_container container">
            @foreach ($produtos as $produto)
                @include('/components/cardProduto')
            @endforeach

        </div>
        @if (count($produtos) == 0)
            <h3 class="card_titulo titulo_grande">Nehum produto encontrados para os filtros utilizados. <a href="/">Clique aqui para ver todos</a>  </h3>
        @endif
    </section>
    @include('/components/modal')
@endsection

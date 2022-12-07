@extends('layouts.main')

@section('title', $produto->nome)

@section('content')


    <div class="col-md-10 offset-md-1">
        <div class="row">

            <div id="image-container" class="col-md-6">
                <img src="/img/produtos/{{ $produto->imagem }}" class="img-fluid" alt="{{ $produto->nome }}">

            </div>
            <div id="info-container" class="col-md-6">
                <h4>
                    <ion-icon name="balloon-outline"></ion-icon>{{ $produto->nome }}
                </h4>

                @if ($produto->valor > 0)
                    <h6> R$ {{ $produto->valor }}</h6>
                @else
                    <h6> R$ a Combinar</h6>
                @endif
                <p>Descrição:</p>
                <textarea style=" border-radius: 5px;  border: 1px solid #212121; width: 250px; height: 100px; " disabled>{{ $produto->descricao }}
                </textarea>
                <br>
                <br>
                @auth
                    <a class="btn btn-secondary btn-sm" href="/events/alterarProduto/{{ $produto->id }}" role="button" ><i
                            class="fa-solid fa-pen"></i>Editar</a>
                    <a class="btn btn-secondary btn-sm" href="/events/listarProduto" role="button" ><i
                            class="fa-solid fa-pen"></i>Lista de Produtos</a>
                @endauth
                <a class="btn btn-secondary btn-sm"
                    href="{{ $url . '?text=Ola! Tenho Interresse no Produto' . $produto->id . '-' . $produto->nome }}"
                    target="_blank" role="button" > <i class="fa-solid fa-pen"></i>Fazer Pedido pelo WhatsApp</a>
                <a class="btn btn-secondary btn-sm" href="/" role="button" > <i class="fa-solid fa-pen"></i>Pagina
                    Inicial</a>
            </div>

        </div>

    </div>
@endsection

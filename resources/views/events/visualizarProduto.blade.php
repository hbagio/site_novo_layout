@extends('layouts.main')

@section('title', $produto->nome)

@section('content')
    <section class="galeria">
        <div class="produto grid_container_item">
            <div class="grid_container container">
                <div class="box">
                    <div class="box-row">
                        <div class="box-cell box1">
                            <img src="/img/produtos/{{ $produto->imagem }}" alt="{{ $produto->nome }}" style=" max-width: 100%;
                            max-height: 100%;">
                        </div>
                    </div>
                    <div class="box-row">
                        <div class="box-cell box2">
                            <img src="/img/produtos/{{ $produto->imagem }}" alt="{{ $produto->nome }}" style=" max-width: 100%;
                            max-height: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

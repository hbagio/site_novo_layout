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
    </section>
    @include('/components/modal')
@endsection

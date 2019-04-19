@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="/marca">

                <div class="card text-center hover-shadow" href="/marcas">
                    <img class="card-img-top" src="/img/establish-unique-brand-personality.jpg" alt="">

                    <div class="card-body">
                        <h1 class="card-title">
                            Marcas
                        </h1>
                    </div>
                </div>
            </a>
        </div>
        @if ($hasBrand)

            <div class="col-md-4">
                <a href="/produto">

                    <div class="card text-center hover-shadow">
                        <img class="card-img-top" src="/img/product.png" alt="">

                        <div class="card-body">
                            <h1 class="card-title">
                                Produtos
                            </h1>
                        </div>
                    </div>
            </div>
            </a>
        </div>
        @endif
</div>
@endsection

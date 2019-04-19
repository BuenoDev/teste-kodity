@extends('layouts.app')

@section('content')
<div class="container card">
    <div class="row " style="margin-top:50px; margin-bottom:50px">
        <div class="col-lg-4">
            <div class="container">

                <img src="{{ $product->image != null ? '/storage/products/'.$product->image : '/img/produto-sem-imagem.png' }}" class="img-thumbnail ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Imagem">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-10">
                    <h1>{{ $product->name }}</h1>
                    <h3>{{ $product->brand->name }}</h3>
                    <br><br>
                    <p>{{ $product->description }}</p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 ">
                    <div class="btn-group">
                        <a name="" id="" class="btn btn-primary" href="/produto/{{ $product->id }}/editar" role="button">Editar</a>
                        <form action="/produto/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                        <a href="/produto" class="btn btn-warning">Voltar</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
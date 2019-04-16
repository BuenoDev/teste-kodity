@extends('layouts.app')

@section('content')
<div class="container">
    {{-- filtros --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-left">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Filtros</h2>
                        </div>
                        <div class="col-md-6">
                            <a name="add" id="add" class="btn btn-success" href="/produto/novo" role="button">
                                Adicionar Produto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end card --}}
        </div>
        {{-- end col --}}
    </div>
    {{-- end row --}}
    {{-- tabela --}}
    <div class="row">
        <div class="card text-left col-lg-12">

            <div class="card-body">
                <h4 class="card-title">Produtos</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td scope="row">{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="/produto/{{ $product->id }}/editar" role="button">
                                        <i class="fa fa-edit    "></i>
                                    </a>
                                    <form action="/produto/{{ $product->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
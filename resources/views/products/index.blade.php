@extends('layouts.app')

@section('content')
<div class="container">
    {{-- filtros --}}
    
    {{-- end row --}}
    {{-- tabela --}}
    <div class="row">
        <div class="card text-left col-lg-12">

            <div class="card-body row">
                <div class="col-sm-6 flex">
                    <h1 class="card-title">Produtos</h1>
                    <a href="/produto/novo" class="btn btn-circle btn-success "style="margin-left: 30px; margin-top:10px" title="Adicionar novo Produto">
                        <i class="fa fa-plus" aria-hidden="true" ></i>
                    </a>

                </div>
                <div class="col-sm-6">
                    <product-filters></product-filters>

                </div>
                <products-table></products-table>
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td scope="row">{{ $product->name }}</td>
                            <td>{{ $product->brand->name }}</td>
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
                </table> --}}
            </div>
        </div>
        
    </div>
</div>
@endsection
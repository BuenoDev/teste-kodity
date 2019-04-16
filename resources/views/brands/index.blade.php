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
                            <a name="add" id="add" class="btn btn-success" href="/marca/novo" role="button">
                                Adicionar Marca
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
                <h4 class="card-title">Marcas</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td scope="row">{{ $brand->name }}</td>
                            <td>{{ $brand->description }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="/marca/{{ $brand->id }}/editar" role="button">
                                        <i class="fa fa-edit    "></i>
                                    </a>
                                    <form action="/marca/{{ $brand->id }}" method="POST">
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
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
                            <brands-filter></brands-filter>
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
                <brands-table></brands-table>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <h1 class="card-title">Marcas</h1>
                    <a href="/marca/novo" class="btn btn-circle btn-success "style="margin-left: 30px; margin-top:10px" title="Adicionar novo marca">
                        <i class="fa fa-plus" aria-hidden="true" ></i>
                    </a>

                </div>
                <div class="col-sm-6">
                    <brands-filter></brands-filter>

                </div>
                <brands-table></brands-table>

            </div>
        </div>
        
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-3">
            <div class="card text-left">
                <div class="card-body">
                    <form action="/marca/{{ $brand->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                name="name" id="name" placeholder="Digite o nome" value={{ $brand->name }} required>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                name="description" id="description" rows="6"
                                required>{{ $brand->description }}</textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Marca</button>
                        <a href="/produto" class="btn btn-warning">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
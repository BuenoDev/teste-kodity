@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-3">
                <div class="card text-left">                
                  <div class="card-body">
                        <form action="/produto" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="name">Nome</label>
                              <input type="text"
                                     class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                                     name="name" 
                                     id="name"  
                                     placeholder="Digite o nome" 
                                     required>                              
                            </div>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <div class="form-group">
                              <label for="brand">Marca</label>
                              <select class="form-control" name="brand_id" id="brand">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="description">Descrição</label>
                              <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
                                        name="description" 
                                        id="description" 
                                        rows="6" 
                                        required>
                                </textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Produto</button>
                        </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
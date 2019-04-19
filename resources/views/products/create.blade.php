@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-6 offset-3">
                <div class="card text-left">                
                  <div class="card-body">
                        <form action="/produto" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="name">Nome</label>
                              <input type="text"
                                     class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                                     name="name" 
                                     id="name"  
                                     placeholder="Digite o nome" 
                                     value="{{ old('name') }}"
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
                                        required>{{ old('description') }}
                                </textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                              <label for="image">Imagem do produto</label>
                              <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
                              
                            </div>
                        
                            @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                            <button type="submit" class="btn btn-primary">Salvar Produto</button>
                        </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
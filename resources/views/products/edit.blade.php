@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-3">
                <div class="card text-left">     
                    <p>Cadastrado por <strong>{{ $product->user->name }}</strong></p>           
                  <div class="card-body">
                        <form action="/produto/{{ $product->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row flex">
                                <p>heu</p>
                                <img src="{{ isset($product->path_image) ? "/storage/products/".$product->path_image  : "/img/produto-sem-imagem.png" }}" 
                                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" 
                                    alt=""
                                    width='300px' 
                                    height="300px" >
                                {{-- <img src="/img/produto-sem-imagem.png" class="justify-content-center" alt="" height="300px" width="300px"> --}}
                                {{-- <img src="/storage/products/XhXaw7zCNbL1r7vGRpzD1IQbCylC89Kb2rsFXLss.jpeg" alt=""> --}}
                            </div>
                            <div class="form-group">
                              <label for="name">Nome</label>
                              <input value = "{{ $product->name }}"
                                     type="text"
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
                                    <option value="{{ $brand->id }}" {{ $product->brand == $brand ? 'selected' : ''}}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="description">Descrição</label>
                              <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
                                        name="description" 
                                        id="description" 
                                        rows="6" 
                                        required>{{ $product->description }}
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
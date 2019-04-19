@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row   justify-content-center">
            <div class="col-lg-6">
                <div class="card text-left">     <br>
                    <p style="margin-left:80px">Cadastrado por <strong>{{ $product->user->name }}</strong></p>           
                  <div class="card-body ">
                        <form action="/produto/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row">   
                                    <div class="col-sm-12 text-center">
                                        <img src="{{ isset($product->image) ? "/storage/products/".$product->image  : "/img/produto-sem-imagem.png" }}" 
                                            class="img-tumbnail rounded " 
                                            alt=""
                                            width='250px' 
                                            height="200px" >
                                    </div>
                                    {{-- <img src="/img/produto-sem-imagem.png" class="justify-content-center" alt="" height="300px" width="300px"> --}}
                                    {{-- <img src="/storage/products/XhXaw7zCNbL1r7vGRpzD1IQbCylC89Kb2rsFXLss.jpeg" alt=""> --}}
                                </div>
                                
                            </div><br>
                            <div class="form-group">
                              
                              <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                              
                            </div><br>
                            <div class="row">
                                <div class="col-md-8">
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
                                </div>
                                <div class="col-md-4">
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
                                </div>
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
                            <a href="/produto" class="btn btn-warning"> Voltar </a>
                            
                        </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
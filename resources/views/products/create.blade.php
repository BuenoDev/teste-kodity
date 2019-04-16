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
                                     class="form-control" 
                                     name="name" 
                                     id="name"  
                                     placeholder="Digite o nome" 
                                     required>                              
                            </div>
                            <div class="form-group">
                              <label for="description">Descrição</label>
                              <textarea class="form-control" 
                                        name="description" 
                                        id="description" 
                                        rows="6" 
                                        required>
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Produto</button>
                        </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulario de Noticia</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                                @endforeach
                            </div>
                         @endif
                        
                        <!-- Contenido -->
                        <form action="{{ route('news.store') }}" method="POST">
                            <div class="form-group">
                                <label>Titulo *</label>
                                <input type="text" name="titulo" class="form-control " placeholder="Nueva noticia" value="{{ old('titulo') }}">
                            </div>
                            <div class="form-group">
                                <label>Descripcion Rapida *</label>
                                <input type="text" name="descripcion_rapida" class="form-control" placeholder="Descripción breve" value="{{ old('descripcion_rapida') }}">
                            </div>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea name="descripcion" rows="6" class="form-control" placeholder="Descripción opcional" value="{{ old('descripcion') }}"></textarea>
                            </div>
                            
                            <div class="card-body form-group row">
                                <div class="form-group col-sm-4">
                                    <label for="autor">Autor</label>
                                    <select class="form-select" aria-label="Default select example" name="autor" id="autor">
                                        <option selected>{{ Auth::user()->name }}</option>
                                        <option>Anonimo</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="prioridad">Prioridad</label>
                                    <select class="form-select" aria-label="Default select example" name="prioridad" id="prioridad">
                                        <option selected value="5">Maxima</option>
                                        <option value="4">Alta</option>
                                        <option value="3">Media</option>
                                        <option value="2">Baja</option>
                                        <option value="1">Minima</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="objetivo">Objetivo</label>
                                    <select class="form-select" aria-label="Default select example" name="objetivo" id="objetivo">
                                        <option selected value="1">Todos</option>
                                        <option value="2">Solo Rol A</option>
                                        <option value="3">Solo Rol A y B</option>
                                    </select>
                                </div>
                            </div>

                            
                            <div class="card-body form-group">
                                <div class="card text-center">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Crear Noticia</button>
                                </div>
                            </div>
                        </form>

                        <!-- Fin Contenido -->

                    </div>
                </div>
            </div>         
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editor</div>
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

                        <form action="{{ route('news.update', $news) }}" method="POST">
                            <div class="form-group">
                                <label>Título *</label>
                                <input type="text" name="titulo" class="form-control "  value="{{ $news->titulo }}">
                            </div>
                            <div class="form-group">
                                <label>Descripcion Rapida *</label>
                                <input type="text" name="descripcion_rapida" class="form-control"  value="{{ $news->descripcion_rapida  }}">
                            </div>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea name="descripcion" rows="6" class="form-control">{{ $news->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <textarea name="iframe" rows="3" class="form-control">{{ $news->iframe }}</textarea>
                            </div>

                            <div class="card-body form-group row">
                                <div class="form-group col-sm-4">
                                    <label for="autor">Autor</label>
                                    <select class="form-select" name="autor">
                                        <option selected value="{{ $news->autor }}">{{ $news->autor }}</option>
                                        @php $name = Auth::user()->name; if($news["autor"]!=$name) echo '<option>', $name, '</option>'@endphp
                                        @php if($news["autor"]!="Anonimo") echo ' <option>Anonimo</option> '@endphp
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="prioridad">Prioridad</label>
                                    <select class="form-select" aria-label="Default select example" name="prioridad">
                                        <option value="5" @php if($news["prioridad"]===5) echo 'selected'; @endphp >Maxima</option>
                                        <option value="4" @php if($news["prioridad"]===4) echo 'selected'; @endphp >Alta</option>
                                        <option value="3" @php if($news["prioridad"]===3) echo 'selected'; @endphp >Media</option>
                                        <option value="2" @php if($news["prioridad"]===2) echo 'selected'; @endphp >Baja</option>
                                        <option value="1" @php if($news["prioridad"]===1) echo 'selected'; @endphp >Minima</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="objetivo">Objetivo</label>
                                    <select class="form-select" name="objetivo">
                                        
                                        <option value="1" @php if($news["objetivo"]===1) echo 'selected'; @endphp >Todos</option>
                                        <option value="2" @php if($news["objetivo"]===2) echo 'selected'; @endphp >Solo Rol A</option>
                                        <option value="3" @php if($news["objetivo"]===3) echo 'selected'; @endphp >Solo Rol A y B</option>
                                    </select>
                                </div>
                            </div>

                            
                            <div class="card-body form-group">
                                <div class="card text-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" class="btn btn-primary" value="Actualizar Noticia">
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
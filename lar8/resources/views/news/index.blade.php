@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
                <div class="card">
                        <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">Crear noticia</a>
                </div>

                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Contenido -->
                        <table class="table">
                            <thead>
                                <th>Título</th>
                                <th>Descripción corta</th>
                                <th>Descripción</th>
                                <th>Autor</th>
                                <th>Prioridad</th>
                                <th>Objetivo</th>
                                <th>Iframe</th>
                                <th colspan="2">&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach($newss as $news)
                                <tr>
                                <td>{{ $news->titulo }}</td>
                                <td>{{ $news->descripcion_rapida }}</td>
                                <td>{{ $news->descripcion }}</td>
                                <td>{{ $news->autor }}</td>
                                <td>
                                    @php if($news["prioridad"]===5) echo 'Maxima'; @endphp
                                    @php if($news["prioridad"]===4) echo 'Alta'; @endphp
                                    @php if($news["prioridad"]===3) echo 'Media'; @endphp
                                    @php if($news["prioridad"]===2) echo 'Baja'; @endphp
                                    @php if($news["prioridad"]===1) echo 'Minima'; @endphp
                                </td>
                                <td>
                                    @php if($news["objetivo"]===1) echo 'Todos'; @endphp
                                    @php if($news["objetivo"]===2) echo 'Solo rol A'; @endphp
                                    @php if($news["objetivo"]===3) echo 'Solo rol A y B'; @endphp                                   
                                </td>
                                <td>{{ $news->iframe }}</td>
                                <td>
                                <a href="{{ route('news.edit', $news) }}" class="btn btn-sm btn-primary">
                                    Editar
                                </a>
                                </td>
                                <td>
                                    <form action="{{ route('news.destroy', $news) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm(`¿Desea eliminar la noticia?`)">
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>           
                        </table>
                        <!-- Fin Contenido -->
                        
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@endsection
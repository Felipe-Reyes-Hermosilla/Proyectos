@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-body">
                        
                        <!-- Contenido -->
                        <h4 class="card-title">
                            {{ $news->titulo }}
                        </h4>
                        <h5 class="card-text">
                            {{ $news->descripcion_rapida }} <br>
                        </h5>
                        <p>
                            {{ $news->descripcion }}
                        </p>
                        <p class="text-muted mb-0">
                        <em>
                            &ndash; {{ $news->autor }}
                        </em>
                        {{ $news->created_at->format('d M Y') }}
                        </p>
                        <!-- Fin Contenido -->

                    </div>
                    
            </div>         
        </div>
    </div>
</div>
@endsection
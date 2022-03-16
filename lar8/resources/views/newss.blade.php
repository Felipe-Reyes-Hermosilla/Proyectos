@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    <!-- Contenido -->
                    @foreach($newss as $news) 
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ $news->titulo }}
                                </h3>
                                <h5 class="card-text">
                                    {{ $news->descripcion_rapida }} <br>
                                </h5>
                                <p class="card-text">
                                    {{ $news->descripcion }}
                                </p>
                                <p class="text-muted mb-0">
                                    <em>
                                        &ndash; {{ $news->autor }}
                                    </em>
                                </p>
                            </div> 
                        </div>
                    @endforeach
                    {{ $newss->links() }}
                    <!-- Fin Contenido -->

        </div>
    </div>
</div>
@endsection
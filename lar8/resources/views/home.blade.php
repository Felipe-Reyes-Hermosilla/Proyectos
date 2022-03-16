@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Contenido -->
            <div class=row>
                <div class="col-sm-6">
                    <div class="card">
                        @foreach($newss as $news)
                            <div class="card-body">
                                <a class="h5 text-decoration-none link-dark" href="{{ route('news', $news) }}">{{ $news->titulo }}</a>
                                <p class="card-text">
                                    {{ $news->descripcion_rapida }} <br>
                                </p>
                                <p class="text-muted mb-0">
                                    <em>
                                        &ndash; {{ $news->autor }}
                                    </em>
                                    {{ $news->created_at->format('d M Y') }}
                                </p>
                            </div> 
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card" stile="width: 18rem;">   
                        @foreach($newss2 as $news)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a class="h5 text-decoration-none link-dark" href="{{ route('news', $news) }}">{{ $news->titulo }}</a></li>
                            </ul> 
                        @endforeach
                    </div>
                </div>          
            </div>
            <!-- Fin Contenido -->
            @include('modal')
        </div>
    </div>
</div>
@endsection
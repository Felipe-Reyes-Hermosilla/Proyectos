@extends('custom_dashboard')

@section('name')
{{ __('Noticias') }}
@endsection

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 

    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        @foreach($newss as $news)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $news->titulo }}</h5>
                                <p class="card-text">
                                    {{ $news->descripcion_rapida }} <br>
                                    <a href="{{ route('news', $news) }}">Leer mas</a>
                                </p>
                                <p class="text-muted mb-0">
                                    <em>
                                        &ndash; {{ $news->autor }}
                                    </em>
                                    {{ $news->created_at->format('d M Y') }}
                                </p>
                            </div> 
                        </div>
                        @endforeach           
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
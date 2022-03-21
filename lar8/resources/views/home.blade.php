@extends('layouts.app')

@section('content')
@php $a = " "; $b = ""; @endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Contenido -->
            <div class=row>
                <div class="col-sm-6">
                    <div class="card">
                        @foreach($newss as $news)
                            <div class="card-body">
                                @if($news->iframe)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        {!! $news->iframe !!}
                                    </div>
                                @endif
                                @php echo '<a class="h5 text-decoration-none link-dark" data-bs-target="#', str_replace($a,$b,$news["titulo"]) ,'" data-bs-toggle="modal">', $news["titulo"], '</a>'@endphp
                                <p class="card-text">
                                    {{ $news->descripcion_rapida }} <br>
                                </p>
                                <p class="text-muted mb-0">
                                    <em>
                                        @php if($news["autor"]!="Anonimo") echo '&ndash;', $news["autor"] @endphp
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
                                <li class="list-group-item">
                                    @php echo '<a class="h5 text-decoration-none link-dark" data-bs-target="#', str_replace($a,$b,$news["titulo"]) ,'" data-bs-toggle="modal">', $news["titulo"], '</a>' @endphp 
                                </li>
                            </ul> 
                        @endforeach
                    </div>
                </div>          
            </div>
            <!-- Fin Contenido -->
            @include('modal', $modal)
        </div>
    </div>
</div>
@endsection
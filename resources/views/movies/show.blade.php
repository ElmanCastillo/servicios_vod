@extends('layouts.app')
@section('content')
<!-- Products tab & slick -->
                                  
<div class="container">

<div class="col-md-12">
@if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        @can('movie-list')
        @if ($suscriptor_validos === 1)
                <div class="newsletter">
                        <iframe width="853" height="480" src="{{ $data->url}}" title="video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                   
				</div>
                <div class="container">
                             <p><b>Pelicula: </b> {{ $data->nombre }}</p>  
                             <p><b>Genero: </b> {{ $data->genero->genero }}</p>
                             <p><b>Descripcion: </b> {{ $data->descripcion }}</p>  
						</div> 
                        @else
                        <div class="container">
                             <p><h1>Sin Suscripción: </h1></p> 
                             <p><h3>Sin Suscribase para ver este contenido </h></p>
                             <p><h3><a href="http://localhost:8000/paypal/pay">Pagar con PayPal</a></h></p> 
						</div> 
    
                       @endif 
</div> 
         @endcan
</div>
@endsection

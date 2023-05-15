@extends('base')

@section('title', 'Accueil')

@section('content')
    
        <div class="p-5 mt-4 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Agence Immobilière Lorem Ipsum</h1>
                <p class="col-md-8 fs-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>

        <h2>Nos derniers biens</h2>
        <div class="row">
         @foreach ($properties as $property)
            <div class="col">
                @include('property.card')
            </div> 
         @endforeach  
         </div>
        



@endsection
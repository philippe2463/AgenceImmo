@extends('base')

@section('title', 'Nos Biens')

@section('content')
    <div class="p-5 mt-4 mb-4 bg-light rounded-3">
        <form action="" method="GET" class="container d-flex gap-2">
            <input type="number" placeholder="Surface min" class="form-control" name="surface" value="{{ $input['surface'] ?? ''}}">
            <input type="number" placeholder="Nombre de pièces min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? ''}}">
            <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? ''}}">
            <input placeholder="Mot clé" class="form-control" name="title" value="{{ $input['title'] ?? ''}}">
            <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
        </form>
    </div>
    
    <div class="container">
        <div class="row"> 
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col">
                    Aucun bien ne correspond à votre recherche
                </div>
            @endforelse    
        
        </div>  

        <div class="my-4">
        {{ $properties->links()}}
        </div>
    </div>
    
    

@endsection
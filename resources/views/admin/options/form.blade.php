@extends('admin.layout')

@section('title', $option->exists? 'Editer une option' : 'Créer une option')

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ route($option->exists? 'admin.option.update' : 'admin.option.store', $option) }}" method="POST" class="vstack gap-2">
        @csrf
        @method($option->exists? 'put' : 'post')
        @include('shared.input', [ 'class' => 'col', 'name' => "name", 'label' => "Nom", 'value' => $option->name ])
        <div>
            <button class="btn btn-primary">
            @if ($option->exists)
                Modifier
            @else
                Créer   
            @endif
            </button>
        </div>
    </form>

@endsection
@extends('template')

@section('content')

<div>
<h2>Cooking Compile Material</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan prod order',
        'route_name' => 'cop_material.index'
    ])

</div>

@endsection
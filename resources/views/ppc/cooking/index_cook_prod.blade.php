@extends('template')

@section('content')

<div>
<h2>Cooking Compile Production</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan prod order',
        'route_name' => 'cop_prod.index'
    ])

</div>

@endsection
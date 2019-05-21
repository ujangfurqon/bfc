@extends('template')

@section('content')

<div class="container">
    <h2>Sinter Compile Blending</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan plan number',
        'route_name' => 'sinter_blend.index'
    ])

    

</div>

@endsection
@extends('template')

@section('content')

<div>
<h2>Stock Yard Compile Blending</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan prod order',
        'route_name' => 'yard_blend.index'
    ])

</div>

@endsection
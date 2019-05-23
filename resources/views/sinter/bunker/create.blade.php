@extends('template')

@section('content')

<div class="container">
    <h2>Create Bunker Data Management </h2> 

    @include('flash-message')
    
    @include('sinter.bunker.form')

</div>
    

    
@endsection


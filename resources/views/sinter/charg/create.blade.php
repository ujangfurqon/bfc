@extends('template')

@section('content')

<div class="container">
    <h2>Create Data Charging Manajement </h2> 

    @include('flash-message')
    <form id="formField" class="form-horizontal" method="POST" action="{{ route('charging.store') }}"  enctype="multipart/form-data">
    {{ csrf_field() }}
        @include('sinter.charg.form')
    </form>

</div>
    

    
@endsection


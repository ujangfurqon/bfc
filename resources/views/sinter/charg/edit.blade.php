@extends('template')

@section('content')

<div class="container">
    <h2>Edit Data Charging Manajement </h2> 

    @include('flash-message')
    <form id="formField" class="form-horizontal" method="POST" action="{{ route('charging.update', $charg->seq) }}"  enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        @include('sinter.charg.form')
    </form>

</div>
    

    
@endsection


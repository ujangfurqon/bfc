@extends('template')

@section('content')

<div class="container">
    <h2>Blast Furnace Compile Iron</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan Plan Number',
        'route_name' => 'bf_compile_iron.index'
    ])

    <table class="table">
        {{ csrf_field() }} 
        <thead>
            <tr>
                <th>Plan Number</th>
                <th>Start Time</th>
                <th>End Time</th>       
                <th>Target S</th> 
                <th>Target SI</th>
                <th>Target P</th>
                <th>Status</th>                 
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            {{-- @foreach($blending as $mat)
            <tr>
                <td>{{ $mat->pbd_no }}</td>
                <td>{{ $mat->mat_na }}</td>
                <td>{{ $mat->batch }}</td>
                <td>{{ $mat->pb }}</td>        
                <td>{{ $mat->remarks}}</td>
                
                <td>
                    <div class="box-button">
                        <a href="{{ route('bf_compile_prod.show', $mat->seq) }}"
                            class="btn btn-success btn-sm">Detail</a>
                    </div>
                    {{-- @if (Auth::check()) --}}
            {{--     <div class="box-button">
                        <a href="{{ route('bf_compile_prod.edit', $mat->seq) }}" 
                            class="btn btn-warning btn-sm">Edit</a>
                    </div> 
                        
                    <div class="box-button">
                        {!! Form::submit('Delete', [
                        'class' => 'btn btn-danger btn-sm form-delete',
                        'data-url' => route('bf_compile_prod.destroy', [ 'id' => $mat->seq ])
                        ]
                        ) !!}
                    </div>

                </td>
            </tr>
            @endforeach --}}

            <th>tes1</th>
            <th>tes2</th>
            <th>tes3</th>
            <th>tes4</th>
            <th>tes5</th>
            <th>tes6</th>
            <th>test7</th>
            <th>xxx</th>
        </tbody>
    </table>

    {{-- <div class="table-nav">
        <div class="jumlah-data">
        <strong> Jumlah Data:  {{$jumlah_data}}</strong>
        </div>
        <div class="paging">
            {{ $data->links() }}
        </div>
    </div> --}}

    {{-- @if (Auth::check()) --}}
    <div class="tombol-nav">
        <a href=" {{ route('bf_compile_iron.create')}}" class="btn btn-primary">Tambah Data</a>
    </div>
    {{-- @endif --}}

</div>

@endsection
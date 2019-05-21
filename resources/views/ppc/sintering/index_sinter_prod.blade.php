@extends('template')

@section('content')

<div class="container">
    <h2>Sinter Compile Production</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan plan number',
        'route_name' => 'sinter_prod.index'
    ])

<table class="table">
        {{ csrf_field() }} 
        <thead>
            <tr>
                <th>Plan Number</th>
                <th>Material</th>
                <th>Plan Start</th>
                <th>Plan End</th>                       
                <th>Weight</th> 
                <th>Overhoul</th>
                <th>Status</th>                 
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            {{-- @foreach($data as $sinter)
            <tr>
                <td>{{ $sinter->pbd_no }}</td>
                <td>{{ $sinter->mat_na }}</td>
                <td>{{ $sinter->batch }}</td>
                <td>{{ $sinter->pb }}</td>        
                <td>{{ $sinter->remarks}}</td>
                
                <td>
                    <div class="box-button">
                        <a href="{{ route('bf_compile_prod.show', $sinter->seq) }}"
                            class="btn btn-success btn-sm">Detail</a>
                    </div>
                    {{-- @if (Auth::check()) --}}
            {{--     <div class="box-button">
                        <a href="{{ route('bf_compile_prod.edit', $sinter->seq) }}" 
                            class="btn btn-warning btn-sm">Edit</a>
                    </div> 
                        
                    <div class="box-button">
                        {!! Form::submit('Delete', [
                        'class' => 'btn btn-danger btn-sm form-delete',
                        'data-url' => route('bf_compile_prod.destroy', [ 'id' => $sinter->seq ])
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
    {{-- <div class="tombol-nav">
        <a href=" {{ route('sp_compile_prod.create')}}" class="btn btn-primary">Tambah Data</a>
    </div> --}}
    {{-- @endif --}}

</div>

@endsection
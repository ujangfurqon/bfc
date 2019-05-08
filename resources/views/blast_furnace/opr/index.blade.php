@extends('template')

@section('content')

<div>
    <h2>Blast furnace Tapping Performance</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan tapping no',
        'route_name' => 'bf_tapping.index'
    ])

    <table class="table">
            {{ csrf_field() }} 
        <thead>
            <tr>
                <th>Tapping No</th>
                <th>Material</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Taphole</th>
                <th>Actual Amount</th>               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $prod)
            <tr>                
                <td><a href="{{ route('bf_tapping.showLadleIn', [$prod->bf_iron_id]) }}">{{ $prod->bf_iron_id }}</a></td>
                
                <td>{{ $prod->bf_mat_name }}</td>
                <td>{{ $prod->bf_begin }}</td>
                <td>{{ $prod->bf_end }}</td>
                <td>{{ $prod->bf_hole}}</td>
                <td>{{ $prod->iron_sum}}</td>               
                <td>
                    <div class="box-button">
                        <a href="{{ route('bf_tapping.show', [$prod->bf_iron_id]) }}"
                            class="btn btn-success btn-sm">Detail</a>
                    </div>
                    {{-- @if (Auth::check()) --}}
                    <div class="box-button">
                        <a href="{{ route('bf_tapping.edit', [$prod->bf_iron_id]) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                    </div>                 
                    <div class="box-button">
                        {!! Form::submit('Delete', [
                        'class' => 'btn btn-danger btn-sm form-delete',
                        'data-url' => route('bf_tapping.destroy', [ 'id' => $prod->bf_iron_id ])
                        ]
                        ) !!}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



</div>
{{-- / #ppc.bf.compileProd  --}}

<div class="table-nav">
    <div class="jumlah-data">
        <strong> Jumlah Data: {{ $jumlah_data }} </strong>
    </div>
    <div class="paging">
        {{ $data->links() }}
    </div>
</div>


{{-- @if (Auth::check()) --}}
<div class="tombol-nav">
    <a href=" {{ route('bf_compile_prod.create')}}" class="btn btn-primary">Tambah Data</a>
</div>
{{-- @endif --}}

{{-- @include('ppc.bf.prod.form') --}}


{{-- data ladle --}}
@include('blast_furnace.ladle.index')

@endsection

@push('custom-scripts')
<script>
    $('.form-delete').click(function (event) {
        if (confirm("Anda Yakin Data Dihapus ?")) {
            var token = $("meta[name='csrf-token']").attr("content");
            var url = $(event.target).data('url');
        //    alert()
            $.ajax({ 
                url: url,
                type: "DELETE",
                data: {"_token": token, },
    
                success: function (data, textStatus, jqXHR) {
                    location.reload(true);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                },
            });
        }       
    });

    

</script>
@endpush

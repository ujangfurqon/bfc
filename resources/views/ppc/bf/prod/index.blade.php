@extends('template')

@section('content')

<div>
    <h2>Compile Blast furnace Production Plan</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan prod order',
        'route_name' => 'bunker.index'
    ])

    <table class="table">
            {{ csrf_field() }} 
        <thead>
            <tr>
                <th>Prod Order</th>
                <th>Material Code</th>
                <th>Production Start</th>
                <th>Production End</th>
                <th>Prod_Days</th>
                <th>Weight</th>
                <th>Ovr_Days</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $prod)
            <tr>
                <td>{{ $prod->y_m }}</td>
                <td>{{ $prod->mat_code }}</td>
                <td>{{ $prod->plan_star_time }}</td>
                <td>{{ $prod->plan_end_time }}</td>
                <td>{{ $prod->furn_effe_prod_days}}</td>
                <td>{{ $prod->furn_plan_yiel }}</td>
                <td>{{ $prod->stop_days}}</td>
                @if ( $prod->status == 'New')
                    <td>
                        <a href="{{ route('bf_compile_prod.send', ['id' => $prod->seq]) }}"
                            class="btn btn-info btn-sm">{{$prod->status}}</a>
                    </td>
                @else
                    <td>{{ $prod->status}}</td>
                @endif
                <td>
                    <div class="box-button">
                        <a href="{{ route('bf_compile_prod.show', $prod->seq) }}"
                            class="btn btn-success btn-sm">Detail</a>
                    </div>
                    {{-- @if (Auth::check()) --}}
                    <div class="box-button">
                        <a href="{{ route('bf_compile_prod.edit', $prod->seq) }}" class="btn btn-success btn-sm">                            
                            <span class="glyphicon glyphicon-envelop"></span></a>
                    </div>  
                    
                    
                          <a href="#"><span  class="glyphicon glyphicon-remove"></span></a>
                          <a href="#"><span style="font-size: 26px" class="glyphicon glyphicon-envelope"></span></a>
                    <div class="box-button">
                        {!! Form::submit('Delete', [
                        'class' => 'btn btn-danger btn-sm form-delete',
                        'data-url' => route('bf_compile_prod.destroy', [ 'id' => $prod->seq ])
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

@endsection

@push('custom-scripts')
<script>
    $('.form-delete').click(function (event) {
        if (confirm("Anda Yakin Data Dihapus ?")) {
            var token = $("meta[name='csrf-token']").attr("content");
            var url = $(event.target).data('url');
           alert()
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

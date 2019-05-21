@extends('template')

@section('content')

<div class="container">
    <h2>{{$judul}}</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan plan number',
        'route_name' => $route . '.index'
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
                <th>Status</th>       
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $blend)
            <tr>
                <td><a data-url="{{ route('yard_blend.detail',  [$blend->seq, $blend->pbd_no]) }}"
                        class="btn btn-sukses btn-sm id-detail">{{ $blend->pbd_no }}</a>
                    
                </td>
                <td>{{ $blend->mat_name }}</td>
                <td>{{ $blend->pb_star_time }}</td>
                <td>{{ $blend->pb_end_time }}</td>        
                <td>{{ $blend->weight }}</td>
                <td>{{ $blend->status}}</td>
                
                <td>
                    <div class="box-button">
                        <a href="{{ route($route . '.show', $blend->seq) }}"
                            class="btn btn-success btn-sm">Detail</a>
                    </div>
                    {{-- @if (Auth::check()) --}}
                    <div class="box-button">
                        <a href="{{ route($route . '.edit', $blend->seq) }}" 
                            class="btn btn-warning btn-sm">Edit</a>
                    </div> 
                        
                    <div class="box-button">
                        {!! Form::submit('Delete', [
                        'class' => 'btn btn-danger btn-sm form-delete',
                        'data-url' => route($route . '.destroy', [ 'id' => $blend->seq ])
                        ]
                        ) !!}
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

    <div class="table-nav">
        <div class="jumlah-data">
        <strong> Jumlah Data:  {{$jumlah_data}}</strong>
        </div>
        <div class="paging">
            {{ $data->links() }}
        </div>
    </div>


    {{-- @if (Auth::check()) --}}
    <div class="tombol-nav">
        <a href=" {{ route($route . '.create')}}" class="btn btn-primary">Tambah Data</a>
    </div>
    {{-- @endif --}}

</div>

{{-- blending material --}}
@include('ppc.detail_blend')

@endsection


@push('custom-scripts')
<script>
    $(document).ready(function(){
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

        $('.id-detail').on('click',function(e){
            var token = $("meta[name='csrf-token']").attr("content");
            var url = $(event.target).data('url');
            $.ajax({ 
                url: url,
                type: "GET",
                data: {"_token": token, },

                success: function (data, textStatus, jqXHR) {
                    
                    $("#table-detail > tbody").html("");
                    $.each(data, function(i, item) {
                        template = $('#button-detail').clone();
                        template.find('#btn-detail').attr('href', item.detail_link);
                        template.find('#btn-edit').attr('href', item.edit_link);
                        template.find('#btn-destroy').attr('data-url', item.destroy_link);
                        
                        var $tr = $('<tr>').append(
                            $('<td>').text(item.data.compile_blend.pbd_no),
                            $('<td>').text(item.data.mat_na),
                            $('<td>').text(item.data.batch),
                            $('<td>').text(item.data.pb),
                            $('<td>').text(item.data.remarks),
                            $('<td>').html(template.html())
                        ).appendTo('#table-detail');
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                },
            });
        });

        $('.id-modal').on('click',function(e){
            var token = $("meta[name='csrf-token']").attr("content");
            var url = $(event.target).data('url');
            $.ajax({ 
                url: url,
                type: "POST",
                data: {"_token": token, },

                success: function (data, textStatus, jqXHR) {
                   $("#modalresponse").html(data.html);
                   $('#myModal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                },
            });
        });
    });

</script>
@endpush
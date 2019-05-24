@extends('template')

@section('content')

<div class="container">
    <h2>Charging Data Management</h2>

    @include('flash-message')

    @include('find-form', [
        'text_placeholder' => 'Masukkan prod order',
        'route_name' => 'bf_compile_prod.index'
    ])

    <div class="table-responsive">
        <table class="table table-striped">
                {{ csrf_field() }} 
            <thead>
                <tr>
                    <th>Seq</th>
                    <th>Bunker Code</th>
                    <th>Bunker Name</th>
                    <th>Material Code</th>
                    <th>Material Name</th>
                    <th>Charging Amaount</th>
                    <th>Unit Of Measure</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Recorder</th>
                    <th>Recording Time</th>
                    <th>Shift</th>
                    <th>Group</th>
                    <th>Data Source</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chargs as $data)
                <tr>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->trou_id }}</td>
                    <td>{{ $data->trou_name }}</td>
                    <td>{{ $data->mat_id }}</td>
                    <td>{{ $data->mat_name }}</td>
                    <td>{{ $data->wgt }}</td>
                    <td>{{ $data->unit }}</td>
                    <td>{{ $data->startTime }}</td>
                    <td>{{ $data->endTime }}</td>
                    <td>{{ $data->recordDate }}</td>
                    <td>{{ $data->rec_emp }}</td>
                    <td>{{ $data->shift }}</td>
                    <td>{{ $data->crew }}</td>
                    <td>{{ $data->data_source }}</td>
                    <td>
                       <div class="box-button">
                        <a data-url="{{ route('charging.show',  $data->seq) }}"
                            class="btn btn-success btn-sm id-modal"><i data-url="{{ route('charging.show',  $data->seq) }}" class="fa fa-list" aria-hidden="true"></i></a>
                        </div>
                        <div class="box-button">
                            <a href="{{ route('charging.edit', $data->seq) }}"
                                class="btn btn-warning btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>  
                        </div>
                        <div class="box-button">
                            {!! Form::submit('Delete', [
                            'class' => 'btn btn-danger btn-sm form-delete',
                            'data-url' => route('charging.destroy', [ 'id' => $prod->seq ])
                            ]
                            ) !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- links --}}
    <div class="table-nav">
        <div class="jumlah-data">
            <strong> Jumlah Data: {{ $jumlah_data }} </strong>
        </div>
        <div class="paging">
            {{ $chargs->links() }}
        </div>
    </div>

    {{-- @if(Auth::check())  --}}
        <div class="tombol-nav">
            <a href=" {{ route('charging.create')}}" class="btn btn-primary">Tambah Data</a>
        </div>
    {{-- @endif --}}

    {{-- modal --}}
    <div id="modalresponse" style="margin-top:2rem">

    </div>
    {{-- end modal --}}
</div>

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

    $('.id-tes').on('click',function(e){
        var token = $("meta[name='csrf-token']").attr("content");
        var url = $(event.target).data('url');
        $.ajax({ 
            url: url,
            type: "GET",
            data: {"_token": token, },

            success: function (data, textStatus, jqXHR) {
                $("#responseid").html(data.html);
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
            type: "GET",
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
</script>
@endpush

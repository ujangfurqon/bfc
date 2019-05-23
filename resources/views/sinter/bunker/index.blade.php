@extends('template')

@section('content')

<div class="container">
    <h2>Bunker Data Management</h2>

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
                    <th>1# Blend6</th>
                    <th>2# Blend5</th>
                    <th>3# Blend4</th>
                    <th>4# Blend3</th>
                    <th>5# Blend2</th>
                    <th>6# Blend1</th>
                    {{-- <th>7# Solvent 2</th> --}}
                    {{-- <th>8# Solvent 1</th>
                    <th>9# Silic Sand</th>
                    <th>10# Fuel 2</th>
                    <th>11# Fuel 1</th>
                    <th>12# Quick Lime 2</th>
                    <th>13# Quick Lime 1</th>
                    <th>14# Cold Return 2</th>
                    <th>15# Cold Return 1</th>
                    <th>16# Dust 2</th>
                    <th>17# Dust 1</th> --}}
                    <th>Shift</th>
                    <th>Group</th>
                    <th>Record</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bunkers as $data)
                <tr>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->wgt_now1 }}</td>
                    <td>{{ $data->wgt_now2 }}</td>
                    <td>{{ $data->wgt_now3 }}</td>
                    <td>{{ $data->wgt_now4 }}</td>
                    <td>{{ $data->wgt_now5 }}</td>
                    <td>{{ $data->wgt_now6 }}</td>
                    {{-- <td>{{ $data->seq }}</td> --}}
                    {{-- <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td>
                    <td>{{ $data->seq }}</td> --}}
                    <td>{{ $data->shift }}</td>
                    <td>{{ $data->crew }}</td>
                    <td>{{ $data->rec_date }}</td>
                    <td>
                       <div class="box-button">
                        <a data-url="{{ route('bunker.show',  $data->seq) }}"
                            class="btn btn-success btn-sm id-modal"><i data-url="{{ route('bunker.show',  $data->seq) }}" class="fa fa-list" aria-hidden="true"></i></a>
                        </div>
                        {{-- @if (Auth::check()) --}}
                        {{-- <div class="box-button">
                            <a href="{{ route('bf_compile_prod.show', $data->seq) }}"
                                    class="btn btn-warning btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>  
                        </div>  
                        <div class="box-button">
                            <a href="{{ route('bf_compile_prod.show', $data->seq) }}"
                                    class="btn btn-danger btn-sm"> <i class="fa fa-remove" aria-hidden="true"></i>
                            </a>  
                        </div> --}}
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
            {{ $bunkers->links() }}
        </div>
    </div>

    {{-- @if (Auth::check()) --}}
    {{-- <div class="tombol-nav">
        <a href=" {{ route('bunker.create')}}" class="btn btn-primary">Tambah Data</a>
    </div> --}}
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

<div>
    <h2>Hot Metal Ladle-in Performance</h2>

   
    <table class="table">
            {{ csrf_field() }} 
        <thead>
            <tr>
                <th>Tapping No</th>
                <th>Ladle</th>
                <th>Sequence</th>
                <th>Start Pouring</th>
                <th>End Pouring</th>
                <th>Quantity</th>               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dtLadleIn as $ladle)
            <tr>
                <td>{{ $ladle->iron_id }}</td>
                <td>{{ $ladle->iron_can_id }}</td>
                <td>{{ $ladle->iron_seq }}</td>
                <td>{{ $ladle->in_begin }}</td>
                <td>{{ $ladle->in_end}}</td>
                <td>{{ $ladle->iron_weight}}</td>               
                <td>
                    <div class="box-button">
                        <a href="{{ route('bf_tapping.show', [$ladle->cux_id]) }}"
                            class="btn btn-success btn-sm">Detail</a>
                    </div>
                    {{-- @if (Auth::check()) --}}
                    <div class="box-button">
                        <a href="{{ route('bf_tapping.edit', [$ladle->cux_id]) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                    </div>                 
                    <div class="box-button">
                        {!! Form::submit('Delete', [
                        'class' => 'btn btn-danger btn-sm form-delete',
                        'data-url' => route('bf_tapping.destroy', [ 'id' => $ladle->cux_id ])
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


{{-- @if (Auth::check()) --}}
<div class="tombol-nav">
    <a href=" {{ route('bf_tapping.create')}}" class="btn btn-primary">Tambah Data</a>
</div>
{{-- @endif --}}
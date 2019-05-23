<div class="container">

    <div class="panel-heading">
    <h3>Material Blending</h3>
    </div>
    
    
    <table class="table" id="table-detail">
        {{ csrf_field() }} 
        <thead>
            <tr>
                <th>Plan Number</th>
                <th>Material</th>
                <th>Batch</th>
                <th>Proportion</th>       
                <th>Remarks</th>                  
                <th>Action</th>
            </tr>
        </thead>
    
        <tbody>
        </tbody>
    </table>
    
    <div class="hidden" id="button-detail">
        <div class="box-button">
                <a id="btn-detail"
                    class="btn btn-success btn-sm">Detail</a>
            </div>
            <div class="box-button">
                <a id="btn-edit"
                    class="btn btn-warning btn-sm">Edit</a>
            </div> 
                
            <div class="box-button">
                <input id="btn-destroy" class="btn btn-danger btn-sm form-delete" type="submit" value="Delete">
            </div>
    </div>
    
    {{-- @if (Auth::check()) --}}
    <div class="tombol-nav">
        <a href=" {{ route($route . '.create')}}" class="btn btn-primary">Tambah Data</a>
    </div>
    {{-- @endif --}}
    
    </div>
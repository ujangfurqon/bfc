<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="myModalLabel">Compile Blending {{$parens->pb_type}}</h3>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <td>{{ $parens->seq }}</td>
                            </tr>
                            <tr>
                                <th>Plan Number</th>
                                <td>{{ $parens->pbd_no }}</td>
                            </tr>
                            <tr>
                                <th>Material Code</th>
                                <td>{{ $parens->mat_cd}}</td>
                            </tr>
                            <tr>
                                <th>Material Name</th>
                                <td> {{$parens->mat_name}}</td>
                            </tr>
                            <tr>
                                <th>Start Time</th>
                                <td>{{ $parens->pb_star_time}}</td>
                            </tr>
                            <tr>
                                <th>End Time</th>
                                <td>{{$parens->pb_end_time}}</td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td>{{$parens->weight}}</td>
                            </tr>
                            <tr>
                                <th>Remark</th>
                                <td>{{$parens->remarks}}</td>
                            </tr>
    
                        </table>

                    </div>

                    <div class="col-sm-6">
                        <table class="table table-striped">
                            <tr>
                                <th>Creater</th>
                                <td>{{ $parens->in_emp }}</td>
                            </tr>
                            <tr>
                                <th>Create Time</th>
                                <td>{{ $parens->in_date }}</td>
                            </tr>
                            <tr>
                                <th>Modifier</th>
                                <td>{{ $parens->m_emp}}</td>
                            </tr>
                            <tr>
                                <th>Modify Time</th>
                                <td> {{$parens->m_date}}</td>
                            </tr>
                            <tr>
                                <th>Sender</th>
                                <td>{{ $parens->s_emp}}</td>
                            </tr>
                            <tr>
                                <th>Send Time</th>
                                <td>{{$parens->s_date}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$parens->status}}</td>
                            </tr>
                                {{-- <tr>
                                    <th>Lokasi</th>
                                    <td>{{$parens->machine_no}}</td>
                                </tr>                            --}}
    
                        </table>
    
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
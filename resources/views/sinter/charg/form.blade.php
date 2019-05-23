
<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            <div class="col-sm-4">
                <label for="bunker_code">Bunker Code </label>
            </div>
                <div class="col-sm-8">
                <input type="hidden" id="bunker_code1" name="bunker_code1" class="form-control {{ $errors->has('bunker_code1') ? ' is-invalid' : '' }}" autofocus value="{{ !isset($charg->seq) ? old('bunker_code1') : $charg->seq }}" />

                <select style="color:black;" require id="bunker_code" name="bunker_code" class="form-control {{ $errors->has('bunker_code') ? ' is-invalid' : '' }}">
                        <option value="">Pilih Bunker</option>
                        @foreach ($codes as $coded)
                            <option 
                            @if($charg->trou_id == $coded->cd)
                                selected
                            @endif
                            value="{{$coded->cd}}">{{$coded->cd}} - {{$coded->cd_short_name}}</option>
                        @endforeach
                </select>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('bunker_code') }}</strong>
                </span>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group" >
            <div class="col-sm-4">
                <label for="bunker_name">Bunker Name</label>
            </div>
            <div class="col-sm-8">
                <input style="color:black;" id="bunker_name" name="bunker_name" rows="2" class="form-control {{ $errors->has('bunker_name') ? ' is-invalid' : '' }}" autofocus value="{{ !isset($charg->trou_name) ? old('bunker_name') : $charg->trou_name }}" />
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('bunker_name') }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            <div class="col-sm-4">
                <label for="material_code">Material Code</label>
            </div>
                <div class="col-sm-8">
                <select style="color:black;" require id="material_code" name="material_code" class="form-control {{ $errors->has('material_code') ? ' is-invalid' : '' }}">
                        <option value="">Pilih Code</option>
                        @foreach($matcds as $matcd)
                            <option 
                            @if($charg->mat_id == $matcd->mate_cd)
                                selected
                            @endif
                            value="{{$matcd->mate_cd}}">{{$matcd->mate_cd}} - {{$matcd->mate_name}}</option>
                        @endforeach
                </select>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('material_code') }}</strong>
                </span>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group" >
            <div class="col-sm-4">
                <label for="mat_name">Material Name</label>
            </div>
            <div class="col-sm-8">
                <input style="color:black;" id="mat_name" name="mat_name" class="form-control {{ $errors->has('mat_name') ? ' is-invalid' : '' }}" autofocus value="{{ !isset($charg->mat_name) ? old('mat_name') : $charg->mat_name }}" />
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mat_name') }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="form-group" >
            <div class="col-sm-4">
                <label for="charging_amount">Charging Mount</label>
            </div>
            <div class="col-sm-8">
                <input style="color:black;" id="charging_amount" name="charging_amount" rows="2" class="form-control {{ $errors->has('charging_amount') ? ' is-invalid' : '' }}" autofocus value="{{ !isset($charg->wgt) ? old('charging_amount') : $charg->wgt }}" />
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('charging_amount') }}</strong>
                </span>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group" >
            <div class="col-sm-4">
                <label for="uom">Unit Of Measure</label>
            </div>
            <div class="col-sm-8">
                <input style="color:black;" id="uom" name="uom" rows="2" class="form-control {{ $errors->has('uom') ? ' is-invalid' : '' }}" autofocus value="{{ !isset($charg->unit) ? old('uom') : $charg->unit }}" />
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('uom') }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="form-group" >
            <div class="col-sm-4">
                <label for="start_time">Start Time</label>
            </div>
            <div class="col-sm-8">
                <input type="text" style="color:black;" id="start_time" name="start_time" class="form-control {{ $errors->has('start_time') ? ' is-invalid' : '' }}" value="{{ !isset($charg->time_from) ? old('start_time') : $charg->startTime }}" autofocus />
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('start_time') }}</strong>
                </span>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group" >
            <div class="col-sm-4">
                <label for="end_time">End Time</label>
            </div>
            <div class="col-sm-8">
                <input type="text" style="color:black;" id="end_time" name="end_time" class="form-control {{ $errors->has('end_time') ? ' is-invalid' : '' }}" autofocus value="{{ !isset($charg->time_to) ? old('end_time') : $charg->endTime }}" />
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('end_time') }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            <div class="col-sm-4">
                <label for="shift">Shift</label>
            </div>
                <div class="col-sm-8">
                <select style="color:black;" require id="shift" name="shift" class="form-control {{ $errors->has('shift') ? ' is-invalid' : '' }}">
                        <option value="">Pilih Shift</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                </select>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('shift') }}</strong>
                </span>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <div class="col-sm-4">
                <label for="group">Group</label>
            </div>
                <div class="col-sm-8">
                <select style="color:black;" require id="group" name="group" class="form-control {{ $errors->has('group') ? ' is-invalid' : '' }}">
                        <option value="">Pilih Group</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                </select>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('group') }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <button id="simpan1" class="btn btn-primary" >
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
<script>
    $(document).ready(function () {
        $('#start_time, #end_time').datetimepicker();
    });
</script>
@endpush

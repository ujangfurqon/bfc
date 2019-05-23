<form id="formField" class="form-horizontal" method="POST" action="{{ route('bf_compile_blend.update', '0') }}"  enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now1">1# Blending 6</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now1" name="wgt_now1" rows="2" class="form-control {{ $errors->has('wgt_now1') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now1') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now1') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now2">2# Blending 5</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now2" name="wgt_now2" rows="2" class="form-control {{ $errors->has('wgt_now2') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now2') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now2') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now3">3# Blending 4</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now3" name="wgt_now3" rows="2" class="form-control {{ $errors->has('wgt_now3') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now3') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now3') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now4">4# Blending 3</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now4" name="wgt_now4" rows="2" class="form-control {{ $errors->has('wgt_now4') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now4') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now4') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now5">5# Blending 2</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now5" name="wgt_now5" rows="2" class="form-control {{ $errors->has('wgt_now5') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now5') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now5') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now6">6# Blending 1</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now6" name="wgt_now6" rows="2" class="form-control {{ $errors->has('wgt_now6') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now6') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now6') }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now7">7# Solvent 2</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now7" name="wgt_now7" rows="2" class="form-control {{ $errors->has('wgt_now7') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now7') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now7') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now8">8# Solvent 1</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now8" name="wgt_now8" rows="2" class="form-control {{ $errors->has('wgt_now8') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now8') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now8') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now9">9# Silic Sand</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now9" name="wgt_now9" rows="2" class="form-control {{ $errors->has('wgt_now9') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now9') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now9') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now10">10# Fuel 2</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now10" name="wgt_now10" rows="2" class="form-control {{ $errors->has('wgt_now10') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now10') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now10') }}</strong>
                    </span>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now11">11# Fuel 1</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now11" name="wgt_now11" rows="2" class="form-control {{ $errors->has('wgt_now11') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now11') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now11') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now12">12# Quick Lime 2</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now12" name="wgt_now12" rows="2" class="form-control {{ $errors->has('wgt_now12') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now12') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now12') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now13">13# Quick Lime 1</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now13" name="wgt_now13" rows="2" class="form-control {{ $errors->has('wgt_now13') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now13') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now13') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now14">14# Cold Return 02</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now14" name="wgt_now14" rows="2" class="form-control {{ $errors->has('wgt_now14') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now14') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now14') }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now15">15# Cold Return 01</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now15" name="wgt_now15" rows="2" class="form-control {{ $errors->has('wgt_now15') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now15') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now15') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now16">16# Dust 2</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now16" name="wgt_now16" rows="2" class="form-control {{ $errors->has('wgt_now16') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now16') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now16') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-4">
                    <label for="wgt_now17">17# Dust 1</label>
                </div>
                <div class="col-sm-8">
                    <input style="color:black;" id="wgt_now17" name="wgt_now17" rows="2" class="form-control {{ $errors->has('wgt_now17') ? ' is-invalid' : '' }}" autofocus value="{{ old('wgt_now17') }}" />
                    <span class="invalid-feedback validasicategory" role="alert">
                        <strong>{{ $errors->first('wgt_now17') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="crew">Group</label>
                </div>
                    <div class="col-sm-8">
                    <select style="color:black;" require id="crew" name="crew" class="form-control {{ $errors->has('crew') ? ' is-invalid' : '' }}">
                            <option value="">Pilih Group</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                    </select>
                    <span class="invalid-feedback validasiserviceid" role="alert">
                        <strong>{{ $errors->first('crew') }}</strong>
                    </span>
                </div>
            </div>
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
                    <span class="invalid-feedback validasiserviceid" role="alert">
                        <strong>{{ $errors->first('shift') }}</strong>
                    </span>
                </div>
            </div>
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
</form>
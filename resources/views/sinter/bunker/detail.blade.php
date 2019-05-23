<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Bunker Data Management Detail Data</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">Seq:</label>
                        <br/>
                        {{ $bunker->seq }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">1# Blend 6:</label>
                        <br/>
                        {{ $bunker->wgt_now1 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">2# Blend 5:</label>
                        <br/>
                        {{ $bunker->wgt_now2 }}
                    </div>
                </div>
            </div>
            {{-- 1 --}}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">3# Blend 4:</label>
                        <br/>
                        {{ $bunker->wgt_now3 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">4# Blend 3:</label>
                        <br/>
                        {{ $bunker->wgt_now4 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">5# Blend 2:</label>
                        <br/>
                        {{ $bunker->wgt_now5 }}
                    </div>
                </div>
            </div>
            {{-- 2 --}}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">6# Blend 1:</label>
                        <br/>
                        {{ $bunker->wgt_now6 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">7# Solvent 2:</label>
                        <br/>
                        {{ $bunker->wgt_now7 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">8# Solvent 1:</label>
                        <br/>
                        {{ $bunker->wgt_now8 }}
                    </div>
                </div>
            </div>
            {{-- 4 --}}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">9# Silic Sand:</label>
                        <br/>
                        {{ $bunker->wgt_now9 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">10# Fuel 2:</label>
                        <br/>
                        {{ $bunker->wgt_now10 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">11# Fuel 1:</label>
                        <br/>
                        {{ $bunker->wgt_now11 }}
                    </div>
                </div>
            </div>
            {{-- 6 --}}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">12# Quick Lime 2:</label>
                        <br/>
                        {{ $bunker->wgt_now12 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">13# Quick Lime 1:</label>
                        <br/>
                        {{ $bunker->wgt_now13 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">14# Cold Return 2:</label>
                        <br/>
                        {{ $bunker->wgt_now14 }}
                    </div>
                </div>
            </div>
            {{-- 7 --}}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">15# Cold Return 1:</label>
                        <br/>
                        {{ $bunker->wgt_now15 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">16# Dust 2:</label>
                        <br/>
                        {{ $bunker->wgt_now16 }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">17# Dust 1:</label>
                        <br/>
                        {{ $bunker->wgt_now17 }}
                    </div>
                </div>
            </div>
            {{-- 9 --}}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">Shift:</label>
                        <br/>
                        {{ $bunker->shift }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="service_id">Group:</label>
                        <br/>
                        {{ $bunker->crew }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
        </div>
    </div>
</div>
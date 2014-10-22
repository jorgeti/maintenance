<div class="modal fade" id="create-stock-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add new Stock Location</h4>
            </div>
                {{ Form::open(array(
                            'url'=>route('maintenance.inventory.stocks.store', array($item->id)), 
                            'class'=>'form-horizontal ajax-form-post clear-form',
                            'data-status-target' => '#stock-location-status',
                            'data-refresh-target' => '#inventory-stocks-table',
                        ))
                }}
            <div class="modal-body">

                    <div id="stock-location-status"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Location</label>
                        <div class="col-md-10">
                            @include('maintenance::select.location')
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Quantity</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                {{ Form::text('quantity', NULL, array('class'=>'form-control', 'placeholder'=>'ex. 45')) }}
                                <span class="input-group-addon">{{ $item->metric->name }}</span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
            </div>
                {{ Form::close() }}
        </div>
    </div>
</div>
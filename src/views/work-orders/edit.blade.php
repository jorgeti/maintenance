@extends('maintenance::layouts.main')

@section('header')
	<h1>{{ $title }}</h1>
@stop

@section('content')

	<script src="/packages/stevebauman/maintenance/js/work-orders/edit.js"></script>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create a new Work Order</h3>
            </div>
            <div class="panel-body">
            {{ Form::open(array('url'=>route('maintenance.work-orders.update', array($workOrder->id)), 'method'=>'PATCH', 'class'=>'form-horizontal', 'id'=>'maintenance-work-order-edit')) }}
            	{{ Form::hidden('current_category_id', $workOrder->category_id) }}
            	<legend class="margin-top-10">Work Order Information</legend>
            	<div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Name</label>
                    <div class="col-md-4">
                    	{{ Form::text('user', NULL, array('class'=>'form-control', 'placeholder'=>$workOrder->user->first_name.' '.$workOrder->user->last_name, 'disabled')) }}
                   	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="location_name">Category</label>
                    <div class="col-md-4">
                    	<div id="category-tree"></div>
                      	{{ Form::hidden('category', NULL, array('id'=>'work-order-category')) }}
                    </div>
              	</div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="location_name">Status</label>
                    <div class="col-md-4">
                    	{{ Form::select('status', $statuses, $workOrder->status_id, array('class'=>'form-control select2', 'placeholder'=>'ex. Admin / Maintenance')) }}
                   	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="location_name">Subject</label>
                    <div class="col-md-4">
                    	{{ Form::text('subject', $workOrder->subject, array('class'=>'form-control', 'placeholder'=>'ex. Worked on HVAC')) }}
                   	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="location_name">Description / Details</label>
                    <div class="col-md-4">
                    	{{ Form::textarea('description', $workOrder->description, array('class'=>'form-control', 'style'=>'min-width:100%', 'placeholder'=>'ex. Added components')) }}
                   	</div>
                </div>
                
                <legend class="margin-top-10">Other Information</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="location_name">Start Date</label>
                    <div class="col-md-4">
                    	<div class="col-md-6">
                        	{{ Form::text('started_at_date', $dates['started']['date'], array('class'=>'form-control pickadate', 'placeholder'=>'Choose Date')) }}
                      	</div>
                        <div class="col-md-6">
                        	{{ Form::text('started_at_time', $dates['started']['time'], array('class'=>'form-control pickatime', 'placeholder'=>'Choose Time')) }}
                       	</div>
                   	</div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="location_name">Completion Date</label>
                    <div class="col-md-4">
                    	<div class="col-md-6">
                    		{{ Form::text('completed_at_date', $dates['completed']['date'], array('class'=>'form-control pickadate', 'placeholder'=>'Choose Date')) }}
                      	</div>
                        
                        <div class="col-md-6">
                        	{{ Form::text('completed_at_time', $dates['completed']['time'], array('class'=>'form-control pickatime', 'placeholder'=>'Choose Time')) }}
                       	</div>
                   	</div>
                </div>
                
                <div class="form-group">
                	<div class="col-sm-offset-2 col-sm-10">
                    	{{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
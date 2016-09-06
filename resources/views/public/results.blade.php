@extends('common.layout')

@section('content')
<div class="row" style="padding-top:20px">
	<div class="small-12 columns results_container">
		<h4 style="display:inline-block">Results</h4>
		<div class='row small-up-1 medium-up-2'>
			@foreach($properties as $property)
			<div class="column property_results_col" >
				<div class="row">
					<div class="small-12 columns">
						<h5 style="font-size:18px; padding-right:5px;font-weight:bold; margin-bottom:5px;">3 Oak Tree Lodge</h5>
					</div>
					<div class="small-12 medium-8 columns" >	
						<img style="width:100%" src="images/{{$property->image_thumb_file_name}}" class="thumbnail " alt="{{$property->property_type->type_name}}">
					</div>
					<div class="small-12 medium-4 columns">
						<div class="row">	
							<div class="small-12 columns">	
								<span class="numeric_money">£ {{number_format($property->asking_value)}}</span>
							</div>
						</div>

						@foreach($property->short_room_summary($types[$property->property_type_id]) as $id => $room)
							<div class="row" style="max-height:65px;">
								<div class="small-4 columns" style=" margin-top:12px;">
									<span style="font-size:25px;">{{ $room->count }}</span><span style="font-size:15px">x</span>
								</div>
								<div class="small-8 columns" style="padding-left:0px">
									<label style="font-size:20px;" class="property_type_lable">
									 	<i class='{{$room->display_class}}'></i>
									</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			
			@endforeach
		</div>
		{{ $properties->links() }}
	</div>
</div>
@stop
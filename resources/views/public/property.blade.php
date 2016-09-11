@extends('common.layout')

@section('content')
	
<div class="row">

	<div class="small-12 columns">
		<h1 style="font-size:18px; padding-right:5px;font-weight:bold; color:#65ae87; margin-top:15px; text-align:center; font-size: 30px; font-weight: bold;" 
		class="float-center">{{$property->title}}</h1>

		{{-- £ {{number_format($property->asking_value)}}</h1>--}}
		
	</div>
	<div class="small-12 medium-9 columns">
		<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit >
			<ul class="orbit-container" >
				<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
				<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
				{!! ''; $loop_inner_count= 0 !!}
				@if(!is_null($property->image_file_name) && strlen($property->image_file_name) > 0)
				<li class="is-active orbit-slide">
					<img src="/images/{{$property->image_file_name}}" class=" float-center" alt="{{$property->property_type->type_name}}">
					
				</li>
				@endif
				@foreach($property->rooms as $room)
					@if(!is_null($room->image_file_name) && strlen($room->image_file_name) > 0)
						<li class="orbit-slide" style=" display:block;">
							<div  style="overflow:hidden; height:inherit;">
							<img style="max-height:400px; width:initial" class=" float-center" src="/images/{{ $room->image_file_name }}" alt="Space">
							<figcaption class="orbit-caption">{{$room->title}}</figcaption>
							</div>
						</li>
						{!! ''; $loop_inner_count++!!}
					@endif
				@endforeach
			</ul>
			<nav class="orbit-bullets">
			
			<button class="is-active" data-slide="0">
				<span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span>
			</button>
			@for( $i = 1; $i <= $loop_inner_count; $i++)
				<button data-slide="{{$i}}"><span class="show-for-sr">{{$i}} slide details.</span></button>
			@endfor
			</nav>
		</div>
	</div>

	<div class="small-12 medium-3 columns" >
		<span class="numeric_money">£ {{number_format($property->asking_value)}}</span>
		@foreach($property->short_room_summary($property->property_type) as $id => $room_fragment)
			<div class="row" style="max-height:65px;">
				<div class="small-4 columns" style=" margin-top:12px;">
					<span style="font-size:25px;">{{ $room_fragment->count }}</span><span style="font-size:15px">x</span>
				</div>
				<div class="small-8 columns" style="padding-left:0px">
					<label style="font-size:20px;" class="property_type_lable">
					 	<i class='{{$room_fragment->display_class}}'></i>
					</label>
				</div>
			</div>
		@endforeach
	</div>
</div>

<div class="row">
	<div class="small-12 columns" >
		<h5 style="color:#65ae87">Property Description</h5>
		<p  >{{$property->description}}</p>
		<p style="border-bottom:solid 1px #65ae87"></p>
	</div>
</div>
<div class="row">
	<div class="small-12 columns">
		<h5 style="color:#65ae87">Room Descriptions</h5>
	</div>
	@foreach($property->rooms as $id => $room)
		@if(strlen($room->description) > 0 )
		<div class="small-12 columns">
			<p ><span style="color:#65ae87">{{$room_types[$room->room_type_id]->type_name}}</span><br>
			{{$room->description}}
			@if($room->long_width  > 0 && $room->long_length > 0) 
				<br> room width: {{$room->long_width }}, room length: {{$room->long_length }}
			@endif
			</p> 
		</div>
		@endif
	@endforeach
</div>

	
@endsection
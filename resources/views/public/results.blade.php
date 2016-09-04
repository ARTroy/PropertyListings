@extends('common.layout')

@section('content')
<div class="row" style="padding-top:20px">
	<div class="small-12 columns">
		<h4 style="display:inline-block">Results</h4>
		<div class='row small-up-1 medium-up-3'>
			@foreach($properties as $property)
			<div class="column" >
				<p style="font-size:18px; padding-right:5px; color:teal; font-weight:bold; margin-bottom:5px;"
				>{{$property->title}}</p>
				
				<img style="width:350px" src="images/{{$property->image_thumb_file_name}}" class="thumbnail " alt="{{$property->property_type->type_name}}">
				
				<span style="position: relative; top: -50px; left:4px; margin: 0px; font-size:22px; padding-right:5px; background-color:white; color:teal; font-weight:bold; display:inline-block"
				>£ {{number_format($property->asking_value)}}</span>
			</div>
			@endforeach
		</div>
		{{ $properties->links() }}
	</div>
</div>
@stop
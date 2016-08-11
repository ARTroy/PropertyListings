@extends('common.layout')

@section('content')
<form action="{{ action('PropertyController@store') }}" method="post" data-abide novalidate enctype="multipart/form-data">
	<div class="row">
		<div class="small-12 columns">
			{{ csrf_field() }}
			<div class="small-12 medium-12 columns">
				<div class='row small-up-1 medium-up-3'>
					@foreach($room_type as $type)
						<div class="column" style="text-align:center;" >
							<label for="rtype_{{$type->id}}" class='room_type_lable'>	
								<input type="radio" value='{{$type->id}}' />
								<i class='{{$type->display_class}}' ></i>
								<p>{{$type->type_name}}</p>
							</label>
						</div>
					@endforeach
				</div>
				<div>
					<input type="submit" class="button" name="">
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
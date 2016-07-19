@extends('common.layout')

@section('content')
	<form action="{{ action('PropertyController@store') }}" method="POST" data-abide novalidate>
	{{ csrf_field() }}
	<div class='row'>
		<div class="small-12 columns">
			<div class='row divide_row'>
				<div class="small-4 medium-4 columns">
					<span class='badge' style="background-color:#65ae87; color:white; font-size:25px; margin-bottom:10px">1</span>
					<p  class="alternative">Choose the industry you are selling to</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class="row collapse buttong">
						<div class="small-12 medium-6 columns ">
							<button id='resi' type='button' class='button selected' 
							style="font-size:18px; width: 100%;">Residential</button>
						</div>
						<div class="small-12 medium-6 columns">
							<button id='comm' type='button' class='button' 
							style="font-size:18px; width: 100%;">Commercial</button>
						</div>
					</div>
				</div>
			</div>
			<div class='row divide_row'>
				<div  class="small-4 medium-4 columns">
					<span class="badge" style="background-color:#65ae87; color:white; font-size:25px; margin-bottom:10px">2</span>
					<p  class="alternative">Choose the type of property</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class='row small-up-1 medium-up-3' id='resi_select'>
						@foreach($residential as $type)
							<div class="column" style="text-align:center;" >
								<label for="ptype_{{$type->id}}" class='property_type_lable'>	
									<input type="radio" id='ptype_{{$type->id}}' name="property_type"/>
									<i class='{{$type->display_class}}' ></i>
									<p class="alternative">{{$type->type_name}}</p>
								</label>
							</div>
						@endforeach
					</div>
					<div class='row small-up-1 medium-up-3' id='comm_select' style="display:none">
						@foreach($commercial as $type)
							<div class="column" style="text-align:center;" >
								<label for="ptype_{{$type->id}}" class='property_type_lable'>	
									<input type="radio" id='ptype_{{$type->id}}' name="property_type"/>
									<i class='{{$type->display_class}}' ></i>
									<p class="alternative">{{$type->type_name}}</p>
								</label>
							</div>
						@endforeach
					</div>

					{{--
					<div class="switch" id='resi_select'>
						<input class="switch-input" id="resi_{{$type->id}}" type="radio" name="property_type" value='{{$type->type_name}}'>
						<label class="switch-paddle" for="resi_{{$type->id}}">
							<span class="show-for-sr"></span>
						</label>
					</div>

					<select style="display:none" name='property_type' >
						@foreach($residential as $type)
							<option value='{{$type->id}}'>{{$type->type_name}}</option>
						@endforeach
					</select>
					--}}
				</div>
			</div>
			<div class='small-12 columns'>
				<button class="file-upload">            
						<input type="file" class="file-input">
					</button>

			</div>
		</div>
	</div>	
	</form>
@endsection
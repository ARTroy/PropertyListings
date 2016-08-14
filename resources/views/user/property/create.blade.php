@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns">
	<form action="{{ action('PropertyController@store') }}" method="post" data-abide novalidate enctype="multipart/form-data">
	{{ csrf_field() }}
	{{--<input type="hidden" value="{{ $invite_code }}" />--}}
	<div class='row'>
		<div class="small-12 columns">
			<div class='row divide_row'>
				<div class="small-4 medium-4 columns">
					<span class='badge badge_style' style="background-color:#65ae87; color:white; font-size:25px; margin-bottom:10px">1</span>
					<p>Choose the industry you are selling to<br>This cannot be revised once saved</p>

				</div>
				<div class="small-8 medium-8 columns">
					<div class="row collapse buttong">
						<div class="small-12 medium-6 columns ">
							<button id='resi' type='button' class='button selected' 
							>Residential</button>
						</div>
						<div class="small-12 medium-6 columns">
							<button id='comm' type='button' class='button' 
							>Commercial</button>
						</div>
					</div>
				</div>
			</div>
			<div class='row divide_row'>
				<div  class="small-4 medium-4 columns">
					<span class="badge badge_style" style="background-color:#65ae87; color:white; font-size:25px; margin-bottom:10px">2</span>
					<p>Choose the type of property<br>This cannot be revised once saved</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class='row small-up-1 medium-up-3' id='resi_select'>
						@foreach($residential as $type)
							<div class="column" style="text-align:center;" >
								<label for="ptype_{{$type->id}}" class='property_type_lable'>	
									<input type="radio" value='{{$type->id}}' id='ptype_{{$type->id}}' name="property_type" required/>
									<i class='{{$type->display_class}}' ></i>
									{{$type->type_name}}
								</label>
							</div>
						@endforeach
					</div>
					<div class='row small-up-1 medium-up-3' id='comm_select' style="display:none">
						@foreach($commercial as $type)
							<div class="column" style="text-align:center;" >
								<label for="ptype_{{$type->id}}" class='property_type_lable'>	
									<input type="radio" value='{{$type->id}}' id='ptype_{{$type->id}}' name="property_type"/>
									<i class='{{$type->display_class}}' ></i>
									<p>{{$type->type_name}}</p>
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class='row divide_row'>
				<div class='small-4 columns'>
					<span class="badge badge_style">3</span>
					<p>Add a public title and image</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class="row">
						<div class="small-12 medium-6 columns">
							<label>Title <input type="text" name="title" value="{{ old('title') }}" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Image 
								<button class="file-upload small-12">            
									<input style='border-style: solid;' type="file" class="file-input" name="image" required>
								</button>
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class='row divide_row'>
				<div class='small-4 columns'>
					<span class="badge badge_style">4</span>
					<p>Add an address, you can chose to hide it if you are concerned for your privacy</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class="row">
						<div class="small-12 medium-6 columns">
							<label>Line 1<input type="text" name="line1" value="{{ old('line1') }}" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Line 2<input type="text" name="line2" value="{{ old('line2') }}" ></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Line 3<input type="text" name="line3" value="{{ old('line3') }}"></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Postcode<input type="text" name="postcode" value="{{ old('postcode') }}" 
							pattern="^[a-zA-Z0-9]{2,5}( )?[a-zA-Z0-9]{2,3}$" required></label>
						</div>

						{{--  --}}
						<div class="small-12 medium-6 columns">
							<label><input type="checkbox" name="display" value="{{ old('display') }}" checked> Display publicly</label>
						</div>
					</div>
				</div>
			</div>
			<div class='row divide_row' style="margin-bottom:0px">
				<div class='small-4 columns'>
					<span class="badge badge_style">5</span>
					<p>After filling in the above, progress on to adding rooms to your property</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class="small-12 medium-6 columns">
						<label style="margin-top:15px">Asking price (£)
						<input type="text" name="asking_value" value="{{ old('asking_value') }}" required></label>
					</div>
					<div class="small-12 medium-6 columns">
						<input type="submit" class="button" {{--  float-center --}}
							style=";font-size: 23px; padding: 20px; margin-top: 15px;" 
							value="Save and add rooms" name="" />
					</div>
				</div>

			</div>
		</div>
	</div>	
	</form>
	</div>

</div>

@endsection
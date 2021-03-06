@extends('common.layout')

@section('content')
<div class="primary_container">
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
									<input type="radio" value='{{$type->id}}' id='ptype_{{$type->id}}' name="property_type" required
									@if(old('property_type') == $type->id)
										checked
									@endif
									/>
									<i class='{{$type->display_class}} float-center' ></i>
									{{$type->type_name}}
								</label>
							</div>
						@endforeach
					</div>
					<div class='row small-up-1 medium-up-3' id='comm_select' style="display:none">
						@foreach($commercial as $type)
							<div class="column" style="text-align:center;" >
								<label for="ptype_{{$type->id}}" class='property_type_lable'>	
									<input type="radio" value='{{$type->id}}' id='ptype_{{$type->id}}' name="property_type"
									@if(old('property_type') == $type->id)
										checked
									@endif
									/>
									<i class='{{$type->display_class}} float-center' ></i>
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
						<div class="small-12 medium-12 columns">
							<label>Description <input type="text" name="description" value="{{ old('description') }}" required></label>
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
							<label>Line 1<input type="text" name="line1" value="{{ old('line1') }}"></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Line 2<input type="text" name="line2" value="{{ old('line2') }}" ></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Parish / County<input type="text" name="locality" value="{{ old('locality') }}"></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Postcode<input type="text" name="postcode" value="{{ old('postcode') }}" 
							pattern="^[a-zA-Z0-9]{2,5}( )?[a-zA-Z0-9]{2,3}$" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Country
								<select name="country">
								<option @if( old('country') == 832) selected @endif value="832">Jersey</option>
								<option @if( old('country') == 831) selected @endif value="831">Guernsey</option>
								<option @if( old('country') == 826) selected @endif value="826">United Kingdom</option>
								</select>
							</label>
						</div>
						<div class="small-12 medium-6 columns">
							<label style="margin-top:20px;"">
								<input type="checkbox" name="display"
								@if(!old('display') || old('display') == 'on' ) checked  
								@endif 
								style="margin-bottom:0px;" 
							 > Display location publicly</label>
						</div>
					</div>
				</div>
			</div>
			<div class='row divide_row' style="margin-bottom:0px; border-bottom:none;">
				<div class='small-4 columns'>
					<span class="badge badge_style">5</span>
					<p>Add your asking price, then save and progress</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class='row'>
						<div class="small-12 medium-6 columns">
							<label style="margin-top:15px">Asking price (£)
							<input type="text" name="asking_value" value="{{ old('asking_value') }}" required pattern='number'></label>
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
	</div>	
	</form>
	</div>
</div>
</div>
@endsection
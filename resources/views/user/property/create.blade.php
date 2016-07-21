@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns">
	<form action="{{ action('PropertyController@store') }}" method="POST" data-abide novalidate>
	{{ csrf_field() }}
	<div class='row'>
		<div class="small-12 columns">
			<div class='row divide_row'>
				<div class="small-4 medium-4 columns">
					<span class='badge badge_style' style="background-color:#65ae87; color:white; font-size:25px; margin-bottom:10px">1</span>
					<p>Choose the industry you are selling to</p>
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
					<p>Choose the type of property</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class='row small-up-1 medium-up-3' id='resi_select'>
						@foreach($residential as $type)
							<div class="column" style="text-align:center;" >
								<label for="ptype_{{$type->id}}" class='property_type_lable'>	
									<input type="radio" value='{{$type->id}}' id='ptype_{{$type->id}}' name="property_type"/>
									<i class='{{$type->display_class}}' ></i>
									<p>{{$type->type_name}}</p>
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
							<label>Title <input type="text" name="title" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Image 
								<button class="file-upload small-12">            
									<input type="file" class="file-input" name="image">
								</button>
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class='row divide_row'>
				<div class='small-4 columns'>
					<span class="badge badge_style">4</span>
					<p>Add an address, you chose to hide it, if you are concerned for your privacy</p>
				</div>
				<div class="small-8 medium-8 columns">
					<div class="row">
						<div class="small-12 medium-6 columns">
							<label>Line 1<input type="text" name="line1" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Line 2<input type="text" name="line2"></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Line 3<input type="text" name="line3"></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Postcode<input type="text" name="postcode" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label><input type="checkbox" name="display" checked> Display publicly</label>
						</div>
					</div>
				</div>
			</div>
			<div class='row divide_row'>
				<div class='small-4 columns'>
					<span class="badge badge_style">5</span>
					<p>After filling in the above, progress on to adding rooms to your property</p>
				</div>
				<div class="small-8 medium-8 columns">
					<input type="submit" class="button float-center" 
						style=";font-size: 23px; padding: 20px; margin-top: 15px;" 
						value="Got it, im ready to move on" name="" />
				</div>
			</div>
		</div>
	</div>	
	</form>
	</div>
</div>
@endsection
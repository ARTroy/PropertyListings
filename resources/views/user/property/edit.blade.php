@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns">
		<div class="panel">
			<form action="{{ action('PropertyController@edit') }}" method="post" data-abide novalidate enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="small-12 medium-12 columns">
					<div class="row">
						<div class="small-12 medium-6 columns">
							<label>Title <input type="text" name="title" value="{{ $property->title }}" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Image 
								<button class="file-upload small-6">            
									<input type="file" class="file-input" name="image" required>
								</button>
								<img src="/images/{{$properyty->image_file_name}}">
							</label>
						</div>
					</div>
				</div>
				<div class="small-12 medium-12 columns">
					<div class="row">
						<div class="small-12 columns">
							<h4>Main Details</h4>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Title <input type="text" name="title" value="{{ $property->title }}" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label>Image 
								<button class="file-upload small-6">            
									<input type="file" class="file-input" name="image" required>
								</button>
								<img src="/images/{{$properyty->image_file_name}}">
							</label>
						</div>
						<div class="small-12 columns">
							<h4>Address</h4>
						</div>
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
							<label>Postcode<input type="text" name="postcode" value="{{ old('postcode') }}" required></label>
						</div>
						<div class="small-12 medium-6 columns">
							<label><input type="checkbox" name="display" value="{{ old('display') }}" checked> Display publicly</label>
						</div>
						<div class="small-12 medium-6 columns">
							<input type="submit" class="button small-12" 
							value="Save" name="" />
						</div>
						<div class="small-12 medium-6 columns">
							<a class="button small-12" >Edit Rooms</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
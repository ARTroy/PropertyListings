@extends('common.layout')

@section('content')
<div class="primary_container">
<div class="row">
	<div class="small-12 columns">
		<form action="{{ action('PropertyController@publish_store', $property->id) }}" method="post" data-abide novalidate enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<h4>Publish a property</h4>
			<p>Once you publish a property, rooms cannot be added, and only the 3 fields of Title, Display Address publicly, and Asking Price can be updated.  As such make sure you have all the right images uploaded and the correct address before doing this.
			</p>
			<p>The property you are about to publish is called {{$property->title}}, the search will use this to query and then show the property.  It has {{count($property->rooms)}} rooms and has the postcode {{$property->address->postcode}}.</p>
			<button type="submit" name="publish" class="button" >I understand and wish to publish</button>
		</form>
	</div>
</div>
</div>
@stop
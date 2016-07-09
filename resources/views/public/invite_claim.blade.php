@extends('common.layout')

@section('content')
	
	<form action="{{ action('InviteController@claim_store') }}" method="POST" data-abide novalidate>
		{{ csrf_field() }}
		<div class='row'>
			<div class="small-12 medium-6 columns">
				<label>Invite Code<input type="text" name="invite_code"></label>
			</div>
			<div class="small-12 medium-6 columns">
				<label>Email address code was sent to<input type="email" name="email"></label>
			</div>
		</div>

	</form>
	
@endsection
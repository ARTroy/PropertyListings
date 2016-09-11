@extends('common.layout')

@section('content')
<div class="primary_container" style="height:initial; padding-bottom:40px; border-bottom:solid #65ae87; padding-top:35px;">
	<div class="row" data-equalizer  data-equalize-on="medium">
		<div class="small-12 medium-6 columns" data-equalizer-watch>
			<div class="panel" style="height: inherit;">
				@include('common.search')
			</div>
		</div>
		<div class="small-12 medium-6 columns" data-equalizer-watch>
			<div class="panel" style="height: inherit;">
				<div style="max-height:35px; overflow:visible;">
					<div class='hero-invite float-center'>
						<p style="margin-bottom:0px; text-align:center;">
							<i class="fi-mail" style="font-size:50px; position: relative; top:-9px;"></i>
						</p>
					</div>
				</div>
				<p>To list your property, enter an invitation code provided to you via email, or during communications with any of our partners.</p>

			    <form action="{{ action('InviteController@claim_store') }}" method="POST" data-abide novalidate>
					{{ csrf_field() }}
					<div class='row'>
						<div class="small-12 medium-12 columns">
							<label>Invitation Code<input type="text" name="invite_code"></label>
						</div>
						<div class="small-12 medium-12 columns">
							<label>Confirm Email Address<input type="email" name="email"></label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row" style="padding-top:20px">
	<div class="small-12 columns">
		<h5 style="border-bottom: solid 2px #b8aa84; display:inline-block; margin-bottom:20px">Recent Properties</h5>
		<div class='row small-up-1 medium-up-3'>
			@foreach($last_two as $property)
				@include('common.property_short')
			@endforeach
		</div>
	</div>
</div>
@endsection
@section('content_2')
	<br>
	<p>Look</p>
@endsection
@extends('common.layout')

@section('content')
	<div class="row">
		<div class="small-6 columns">

		</div>
		<div class="small-12 medium-6 columns">
			<div class="panel" >
				<div style="max-height:35px; overflow:visible;">
					<div class='hero-invite float-center'>
						<p style="margin-bottom:0px; text-align:center;">
							<i class="fi-mail alternative" style="font-size:50px; position: relative; top:-9px;"></i>
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
    
@endsection


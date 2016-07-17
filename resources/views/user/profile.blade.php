@extends('common.layout')

@section('content')
	<p class="alternative">Profile page of {{$user->email}}.</p>
	<br>

	<div class="row">
		<div class="small-6 columns">
			<div class="panel">
				<div class="title_panel">
					<h4>Properties</h4>
					<p>Select one to update.</p>
				</div>
				<table>
					@foreach($properties as $property)
						<tr style="min-height:50px; background-color:#eeeeee;">
							<td>{{$property->title}}</td><td>{{$property->use}}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
		<div class="small-6 columns">
			<div class="title_panel">
				<h4>Invitations</h4>
				<p>You can use them to add properties to your list.</p>
			</div>
			<table>
				@foreach($invites as $invite)
					<tr style="min-height:50px; background-color:#eeeeee;">
						<td>{{$invite->email}}</td><td>{{$invite->code}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>

@endsection
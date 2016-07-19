@extends('common.layout')

@section('content')
	<p class="alternative">Profile page of {{$user->email}}.</p>
	<br>

	<div class="row">
		<div class="medium-6 small-12 columns ">
			<div class="panel" style="padding:0px">
				<div class='row collapse'>
					<div class='small-8 columns propcreate'>
						<h4>Create Property</h4>
						<p style="margin-bottom:0px">Go here to add a new property to the list.  You can go into as much detail as you like, but </p>
					</div>
					<div class='small-3 columns'>
						<button class="sidebutton">
							<a href="{{action('PropertyController@create')}}"><i class="fi-arrow-right"></i>
							</a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="medium-6 small-12 columns">
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
		<div class="medium-6 small-12 columns">
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
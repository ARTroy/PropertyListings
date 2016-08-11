@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns">
	<p class="alternative">Profile page of {{$user->email}}.</p>
	<br>

	<div class="row">
		<div class="medium-6 small-12 columns ">
			<div class="panel" style="padding:0px">
				<div class='row collapse'>
					<div class='small-9 columns propcreate' style="margin-right: 2px;">
						<h4>Create Property</h4>
						<p style="margin-bottom:0px">Go here to add a new property to the list. This will require an invitaion code bound to your account.</p>
					</div>
					<div class='columns' style="width:20%">
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
				<thead> 
					<th>Email</th>
					<th>Code</th>
					<th>Claimed On</th>
				</thead>
				<tbody>
				@foreach($invites as $invite)
					<tr style="min-height:50px; background-color:#eeeeee;">
						<td style="font-family:monospace">{{$invite->email}}</td>
						<td style="font-family:monospace">{{$invite->code}}</td>
						<td style="font-family:monospace">{{$invite->claimed_at}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>
@endsection
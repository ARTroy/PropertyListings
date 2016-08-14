@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns">
	<p class="alternative">Profile page of {{$user->email}}.</p>
	<br>

	<div class="row small-up-1 medium-up-2 ">
		<div class="columns">
			<div class="panel" style="padding:0px">
				<div class='row collapse'>
					<div class='small-9 columns propcreate' style="margin-right: 2px;">
						<h4>Create Property</h4>
						<p style="margin-bottom:0px">Go here to add a new property to the list. This will require an invitaion code bound to your account.</p>
					</div>
					<div class='columns' style="width:20%">
						<div class="sidebutton ">
							<a href="{{action('PropertyController@create')}}"><i class="fi-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="panel" style="padding:10px;">
				<div class='small-12 status_pro' style="margin-right:2px;">
				<h4>Status</h4>
				<p>You have so far claimed {{count($invites)}} invite codes, allowing you to create {{count($invites)*2}} properties.  Of these properties you have currently created {{count($properties)}}.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:20px">
		<div class="medium-6 small-12 columns">
			<div class="title_panel">
				<h4>Properties</h4>
				<p>Select one to update.</p>
			</div>
			<table>
				@foreach($properties as $property)
					<tr style="min-height:50px; background-color:#eeeeee;">
						<td>{{$property->title}}</td>
						<td>{{$property->use}}</td>
						<td><a style="margin:0px" class="button">Details</a></td>
						<td><a style="margin:0px" class="button">Rooms</a></td>
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
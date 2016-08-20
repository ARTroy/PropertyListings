@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns">
		<div class="row">
		<p class="alternative small-6 columns">Profile page of {{$user->email}}.</p>
		@if($user->admin == 1)<p class="small-6 columns">
			<a style="float:right; margin-bottom:0px;" class="button" href="{{action("InviteController@index_create")}}">Create Invites</a>
		</p>@endif
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="small-12 columns">
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
				<h4 >Status</h4>
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
				<thead> 
					<th>Title</th>
					<th>Asking Price</th>
					<th style="width:80px;">Details</th>
				</thead>
				<tbody>
				@foreach($properties as $property)
					<tr style="min-height:50px; background-color:#eeeeee;">
						<td>{{$property->title}}</td>
						<td>{{$property->asking_price}}</td>
						<td style="padding:0px;"><a 
							style="margin:0px; color:white; width:100%;" class="button"
							href="{{action('PropertyController@edit', $property->id) }}"
						>Edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="medium-6 small-12 columns">
			<div class="title_panel">
				<h4>Invitations</h4>
				<p>You can use them to add properties to your list.</p>
			</div>
			<table>
				<thead> 
					<th>Code</th>
					<th>Claimed At</th>
					<th>Properties</th>
				</thead>
				<tbody>
				@foreach($invites as $invite)
					<tr style="min-height:50px; background-color:#eeeeee;" >
						{{--<td style="font-family:monospace; padding: 12px;">{{$invite->email}}</td>--}}

						<td style="font-family:monospace; padding: 12px;">{{$invite->code}}</td>
						<td style="font-family:monospace; padding: 12px;">{{$invite->claimed_at}}</td>
						<td style="font-family:monospace; padding: 12px;">2</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>
@endsection
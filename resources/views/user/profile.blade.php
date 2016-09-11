@extends('common.layout')

@section('content')
<div class="primary_container">
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
	<div class="row small-up-1 medium-up-2 " data-equalizer >
		<div class="columns"  data-equalizer-watch>
			<div class="panel" style="padding:0px; height:100%">
				<div class='row collapse' style="height: inherit;">
					<div class='small-9 columns ' style="height: inherit;">
						<h4 style="margin:10px;">Create Property</h4>
						<p style="margin:10px">Go here to add a new property to the list. This will require an invitaion code bound to your account.</p>
					</div>
					<div class="small-3 columns sidebutton" style="height: inherit;">	
							<a  href="{{action('PropertyController@create')}}"><i class="fi-arrow-right"></i>
							</a>
					</div>	
				</div>
			</div>
		</div>
		<div class="columns"  data-equalizer-watch>
			<div class="panel" style="padding:0px;">
				<div class='small-12' style="height: inherit;">
				<h4 style="margin:10px;">Status</h4>
				<p style="margin:10px;">You have so far claimed {{count($invites)}} invite codes, allowing you to create {{count($invites)*2}} properties.  Of these properties you have currently created {{count($properties)}}.</p>
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
					<th style="width:90px;"></th>
					<th style="width:80px;"></th>
				</thead>
				<tbody>
				@foreach($properties as $property)
					<tr style="min-height:50px; background-color:#eeeeee;">
						<td>{{$property->title}}</td>
						<td>{{number_format($property->asking_value) }}</td>
						<td style="padding:0px;">@if($property->status=='new')
							<a href="{{action('PropertyController@publish', $property->id)}}"
							style="margin:0px 0px 1px 0px; color:white; width:95%;" class="button"
							>Publish</a>
						@else{{$property->status}}@endif</td>
						<td style="padding:0px;"><a 
							style="margin:0px 0px 1px 0px; color:white; width:100%;" class="button"
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

						<td>{{$invite->code}}</td>
						<td>{{$invite->claimed_at}}</td>
						<td>2</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>
</div>
@endsection
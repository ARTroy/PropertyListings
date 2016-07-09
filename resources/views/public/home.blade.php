@extends('common.layout')

@section('content')
	
    <p>
    	<a href="{{action('InviteController@claim_create')}}">Claim</a>
    	body content.
    </p>
    
@endsection


@extends('common.layout')

@section('content')
	<h2>test</h2>
    <p>
    	<a href="{{action('InviteController@claim_create')}}">Claim</a>
    	body content.
    </p>
    
@endsection


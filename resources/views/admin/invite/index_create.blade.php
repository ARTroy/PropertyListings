@extends('common.layout')

@section('content')
	

	<div class='panel'>
		<div class="small-6"><p>Add invitation code.
			<br>The code itself will be generated by the system, just add the email it should be claimed by. Leaving email field empty will resulting in a publicly accessible code.</div>
		<div class="small-6"><form><input type="email" name="invite_email"></form></div>
	</div>

	<table>
		<tbody>
		@foreach($invites as $invite)
    		<tr>
				{{$email}}
			</tr>
   		@endforeach
		</tbody>
	</table>
    
    
@endsection


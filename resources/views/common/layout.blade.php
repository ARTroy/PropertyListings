<!DOCTYPE html>
<html>
    <head>
    	@include('common.head')
    </head>
    <body>
    	<div class="header">
            <div class="nav">
                <div class="row">
                    <div class="small-6 columns">
                    </div>
                   
                    <div class="medium-6 columns">
                        <div class="row">
                            @if(Auth::check())
                                You are logged in!
                            @else
                                <form method="POST" action="{{action('AuthController@login')}}">
                                {!! csrf_field() !!}

                                <div class="medium-offset-1 medium-5 columns">
                                    <label>Email
                                        <input type="email" name="email">
                                    </label>
                                </div>
                                <div class="medium-4 columns">
                                    <label>Password
                                        <input type="password" name="password">
                                    </label>
                                </div>
                                <div class="medium-2 columns">
                                    <button  type="submit"
                                        style="margin-top: 21px; border: 1px solid black; padding: 12px;"
                                    >Login</button>
                                </div>
                                </form>
                            @endif
                        </div>
                    </div>  
                </div>
                {{-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> --}}
            </div>
            <div class="row">
                <div class="small-12 columns">
    		        @include('common.errors')
                </div>
            </div>
    	</div>
    	<div class="row">
    		<div class="small-12 primary_container">
    			@yield('content')
    		</div>
    	</div>
    </body>
</html>
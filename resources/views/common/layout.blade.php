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
                            <form method="POST" action="{{action('AuthController@login')}}">
                            {!! csrf_field() !!}
                            <div class="medium-5 columns">
                                <label>Email
                                    <input type="email" name="email">
                                </label>
                            </div>
                            <div class="medium-5 columns">
                                <label>Password
                                    <input type="password" name="password">
                                </label>
                            </div>
                            <div class="medium-5 columns">
                                
                            </div>
                            <button type="submit">Login</button>                   
                            </form>
                        </div>
                    </div>    
                </div>
               
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
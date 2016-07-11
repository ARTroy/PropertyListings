<!DOCTYPE html>
<html>
    <head>
    	@include('common.head')
    </head>
    <body>
        @hasSection('header')
            @yield('header')
        @else
            <div id="loginform" class="small reveal" data-reveal role="dialog">
                <form method="POST" action="{{action('AuthController@login')}}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="medium-12 columns">
                            <h3 id="modalTitle">Login</h3>
                        </div>
                        <div class="small-12 medium-6 columns">
                            <label>Email
                                <input type="email" name="email">
                            </label>
                        </div>
                        <div class="small-12 medium-6 columns">
                            <label>Password
                                <input type="password" name="password">
                            </label>
                        </div>
                        <div class="small-6 columns">
                            <button  type="submit"
                                class="button"
                            >Go</button>
                        </div>
                        <div class="small-6 columns">
                            <a class="button" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
                <button class="close-button" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="header">
                <div class="nav">
                    <div class="row">
                        <div class="small-6 columns">
                        </div>
                       
                        <div class="medium-6 columns">
                            @if(Auth::check())
                                <span style='float:right'>You are logged in</span>
                            @else
                                <span style='float:right'><a class='button' data-open="loginform">Login</a></span>
                            @endif                  
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
        @endif
    	<div class="row">
    		<div class="small-12 columns primary_container">
    			@yield('content')
    		</div>
    	</div>
    </body>
</html>
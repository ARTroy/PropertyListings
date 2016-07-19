<!DOCTYPE html>
<html>
    <head>
    	@include('common.head')
    </head>
    <body class="over">
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
                                <input type="email" name="email" required>
                            </label>
                        </div>
                        <div class="small-12 medium-6 columns">
                            <label>Password
                                <input type="password" name="password" required>
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
                            <div class='icon_row'>
                                <p class='linkheader'><a href='{{action("HomeController@index")}}'>propertylistings.je</a></p>
                                <i class="fi-clipboard-notes clipheader"></i> 
                                <i class="fi-arrow-right arrowheader"></i>
                                <i class="icon-hand-house househeader"></i> 
                            </div>
                            
                        </div>
                       
                        <div class="medium-6 columns">
                           
                            @if(Auth::check())
                                <div style='padding-top:18px; float:right;'>
                                    <a style='font-size:19px; font-weight:bold; margin-right:10px;'
                                        href='{{action('UserController@profile')}}'>View Profile.
                                    </a>
                                    <a style="font-size:19px; font-weight:bold;" href="{{action('AuthController@logout')}}">Logout</a>
                                </div> 
                            @else
                                <span style='float:right; padding-top:10px'><a class='button' data-open="loginform">Login</a></span>
                            @endif                  
                             
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
            @hasSection('sidebar')
                <div class="small-3 columns primary_container">
                    @yield('sidebar')
                </div>
                <div class="small-9 columns primary_container">
                    @yield('content')
                </div>
            @else
        		<div class="small-12 columns primary_container">
        			@yield('content')
        		</div>
            @endif
    	</div>
    </body>
</html>
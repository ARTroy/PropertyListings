<!DOCTYPE html>
<html>
    <head>
    	@include('common.head')
    </head>
    <body>
    	<div class="header">
            <div class="row">
                <div class="small-12">
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
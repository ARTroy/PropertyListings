@extends('common.layout')

@section('header')
     {{-- include this as empty if the main header isnt needed --}}
    <div class="row"> 
        <div class="medium-12 columns">
            <h3>Reset Password</h3>
       </div>
    </div>
@endsection

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="medium-12 columns">
                <label for="email">E-Mail Address 
                    <input id="email" type="email" name="email" value="{{ old('email') }}">
                </label>
            </div>
            <div class="medium-12 columns">
                <button type="submit" class="button">
                    <i></i> Send Password Reset Link
                </button>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.header_login')

@section('content')
    <!-- Section -->
    <div class="container-fluid white section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <header class="centred">
                        <h1>{{__('public_pages.login')}}</h1>
                        <h2></h2>
                    </header>
                    <div class="login">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input id="email" type="email" placeholder="{{__('public_pages.email_addr')}}" class="email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" placeholder="{{__('public_pages.password')}}" class="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <a href="{{ lang_url('register') }}" class="btn btn-grey"><span>{{__('public_pages.register')}}</span></a>

                            <button type="submit" class="btn btn-primary">
                                {{__('public_pages.login')}}
                            </button>

                            <a href="{{ lang_url('password/reset') }}" class="lost-pass">{{__('public_pages.forgot')}}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

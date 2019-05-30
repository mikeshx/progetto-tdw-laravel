@extends('layouts.header_login')

@section('content')
    <!-- Section -->
    <div class="container-fluid white section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <header class="centred">
                        <h1>{{__('public_pages.register')}}</h1>
                        <h2></h2>
                    </header>
                    <hr class="space-40" />
                    <!-- Form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-sm-6">
                                    <input id="name" type="text" placeholder="{{__('public_pages.user')}}" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="{{__('public_pages.email_addr')}}" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="{{__('public_pages.password')}}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="{{__('public_pages.password_confirm')}}" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 btn-wrap">
                                <a href="{{ lang_url('login') }}" class="btn btn-grey"><span>Back</span></a>
                                <button type="submit" class="btn btn-primary">
                                    {{__('public_pages.register')}}
                                </button>
                            </div>
                        </div>

                    </form>
                    <!-- Form end -->
                </div>
            </div>
        </div>
    </div>
@endsection

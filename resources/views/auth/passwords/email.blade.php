@extends('layouts.header_login')

@section('content')

    <div class="container-fluid white section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <header class="centred">
                        <h1>{{$head_title}}</h1>
                        <h2></h2>
                    </header>
                    <hr class="space-40" />
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-sm-6">
                                            <input id="email" type="email" placeholder="{{__('public_pages.email_addr')}}"  name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 btn-wrap">
                                        <a href="{{ lang_url('login') }}" class="btn btn-grey"><span>Back</span></a>
                                        <button type="submit" class="btn btn-primary">
                                            {{__('public_pages.send_reset_link')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

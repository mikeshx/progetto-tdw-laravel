@extends('layouts.header_3')
@section('content')
    <!-- Section -->
    <div class="container-fluid white section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <header class="centred">
                        <h1>Change Password</h1>
                        <h2></h2>
                    </header>
                    <hr class="space-40" />
                    <!-- Form start -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <div class="col-sm-6">
                                    <input id="current-password" placeholder="Current Password" type="password"  name="current-password" required autofocus>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="new-password" type="password"  placeholder="New Password" name="new-password"  required>

                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" placeholder="{{__('public_pages.password_confirm')}}" name="new-password_confirmation" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 btn-wrap">
                                <a href="{{ lang_url('edit_account') }}" class="btn btn-grey"><span>Back</span></a>
                                <button type="submit" class="btn btn-primary">
                                    {{__('public_pages.save')}}
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
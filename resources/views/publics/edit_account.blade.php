@extends('layouts.header_3')

@section('content')
    <!-- Section -->
    <div class="container-fluid white section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <header class="centred">
                        <h1>{{__('public_pages.account')}}</h1>
                        <h2>{{__('public_pages.details')}}</h2>
                    </header>
                    <hr class="space-40" />
                    <!-- Form start -->
                    <form method="post" action="{{url('edit_account/insert')}}">
                        {{ csrf_field() }}
                        @foreach($userInfo as $info)
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="text" name="email" value="{{$info->email}}" placeholder="{{$info->email}}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @forelse($userAddress as $address)
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="Country" value="{{$address->country}}" placeholder="{{$address->country}}">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="City" value="{{$address->city}}" placeholder="{{$address->city}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" name="PostCod" value="{{$address->post_cod}}" placeholder="{{$address->post_cod}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" name="Address" value="{{$address->address}}" placeholder="{{$address->address}}">
                                </div>
                            </div>
                        @empty
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="Country" value="Country" placeholder="Country">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="City" value="City" placeholder="City">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" name="PostCod" value="Post Code" placeholder="Post Code">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" name="Address" value="Address" placeholder="Address">
                            </div>
                        </div>
                    @endforelse
                        <div class="row">
                            <div class="col-sm-12 btn-wrap">
                                <a href="{{ lang_url('changePassword') }}">Do you want to change your password?</a>
                            </div>
                            <div class="col-sm-12 btn-wrap">
                                <a href="{{ lang_url('my_account') }}" class="btn btn-grey"><span>{{__('public_pages.back')}}</span></a> <button type="submit" class="btn btn-default" >{{__('public_pages.save')}}</button>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
            </div>
        </div>
    </div>
@endsection

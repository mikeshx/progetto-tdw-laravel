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
                    @forelse ($img as $imag)
                        <div class="row">
                            <div class="col-sm-12">
                                <img src="{{asset('../storage/app/public/'.$imag->directory)}}" class="centroImg" alt="No IMG" />
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-sm-12">
                                <img src="http://placehold.it/72x72" class="centroImg" alt="No IMG" />
                            </div>
                        </div>
                    @endforelse
                    <div class="row">
                        <br>
                        <div class="col-sm-12 divCento">
                            <button  class="btn btn-default centroBtn" data-toggle="modal" data-target="#modalAddImage">Change Image</button>
                        </div>
                    </div>
                    <form method="post" action="{{url('edit_account/insert')}}">
                        {{ csrf_field() }}
                        @foreach($userInfo as $info)
                            <div class="row">
                                <div class="col-sm-12 btn-wrap">
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


    <!-- Modal Change Image -->
    <div class="modal fade" id="modalAddImage" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>Update image</h4>
                    <form  method="POST" action="{{url('insert_img')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="upload-wrap">
                            <input type="file" class="form-control-file" name="image">
                            <input type="submit" name="upload" class="btn btn-default" value="Upload"></td>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

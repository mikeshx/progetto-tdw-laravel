@extends('layouts.header_3')

@section('content')
    <!-- Section -->
    <div class="container-fluid white section no-padding">
        <div class="row">
            <div class="col-sm-6 matchHeight scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-75">
                <section class="alignMiddle padding-80 mobile-center">
                    <header>
                        <h1>{{__('public_pages.my_account')}}</h1>
                        <h2></h2>
                    </header>
                    <p>{{__('public_pages.my_account_desc')}}</p>
                </section>
            </div>
            <div class="col-sm-6 matchHeight">
                <div class="row">
                    <div class="col-xs-6 icon-grid">
                        <img src="{{ asset('img/box.png') }}" class="svg" alt=""/>
                        <h4><a href="{{ lang_url('my_orders') }}">{{__('public_pages.my_orders')}}</a></h4>
                        <p>{{__('public_pages.my_orders_desc')}}</p>
                    </div>
                    <div class="col-xs-6 icon-grid">
                        <img src="{{ asset('img/support.png') }}" class="svg" alt=""/>
                        <h4><a href="{{ lang_url('support') }}">{{__('public_pages.support')}}</a></h4>
                        <p>{{__('public_pages.support_desc')}}</p>
                    </div>
                    <div class="col-xs-6 icon-grid">
                        <img src="{{ asset('img/user.png') }}" class="svg" alt=""/>
                        <h4><a href="{{ lang_url('edit_account') }}">{{__('public_pages.edit_profile')}}</a></h4>
                        <p>{{__('public_pages.profile_desc')}}</p>
                    </div>
                    <div class="col-xs-6 icon-grid">
                        <img src="{{ asset('img/logout.png') }}" class="svg" alt=""/>
                        <h4><a href="{{ lang_url('logout') }}">{{__('public_pages.logout')}}</a></h4>
                        <p>Logout!</p>
                    </div>
                    <div class="col-xs-6 icon-grid">
                        <img src="" class="svg" alt=""/>
                        <h4><a href=""></a></h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app_public')

@section('content')
    <div class="myaccount-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>{{__('public_pages.my_account')}}</h2>
                    </div>
                    <div class="options-types">
                        <a href="{{ lang_url('my_orders') }}">
                             <div class="box-type active" data-radio-val="cash_on_delivery">
                                 <img src="{{ asset('img/cash_on_deliv.png') }}" alt="econt" class="img-responsive">
                                 <span>{{__('public_pages.my_orders')}}</span>
                            </div>
                        </a>
                    </div>
                    <div class="options-types">
                        <a href="{{ lang_url('logout') }}">
                            <div class="box-type active" data-radio-val="cash_on_delivery">
                                 <img src="{{ asset('img/cash_on_deliv.png') }}" alt="econt" class="img-responsive">
                                <span>{{__('public_pages.logout')}}</span>
                             </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
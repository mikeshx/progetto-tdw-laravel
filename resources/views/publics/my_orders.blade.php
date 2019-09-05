@extends('layouts.header_3')

@section('content')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <div class="container-fluid section no-padding">
        <div class="row">
            <div class="col-md-12">
                <div class="orders-page">
                    <table class="table">
                        <thead class="my-ord">
                        <tr>
                            <th><span class="title">#</span></th>
                            <th><span class="title">{{__('admin_pages.time_created')}}</span></th>
                            <th><span class="title">{{__('admin_pages.order_type')}}</span></th>
                            <th><span class="title">{{__('admin_pages.phone')}}</span></th>
                            <th><span class="title">{{__('admin_pages.status')}}</span></th>
                            <th class="text-right"><span class="title"><i class="fa fa-list" aria-hidden="true"></i></span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td><h2>{{ $order->order_id }}</h2></td>
                                <td><h2>{{ $order->time_created }}</h2></td>
                                <td><h2>{{ __('admin_pages.ord_'.$order->type) }}</h2></td>
                                <td><h2>{{ $order->phone }}</h2></td>

                                @if($order->status == 0)
                                    <td><h2> {{__('admin_pages.ord_status_new')}} </h2></td>
                                @elseif($order->status == 1)
                                    <td> <h2>{{__('admin_pages.ord_status_processed')}}</h2> </td>
                                @elseif($order->status == 2)
                                    <td><h2> {{__('admin_pages.ord_status_rej')}} </h2></td>
                                @endif

                                <td class="text-right">
                                    <a href="#" class="btn show-more-ele" data-show-tr="{{ $order->order_id }}">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="tr-more" data-tr="{{ $order->order_id }}">
                                <td colspan="6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul>
                                                <li>
                                                    <b>{{ __('admin_pages.first_name') }}:</b> <span>{{ $order->first_name }}</span>
                                                </li>
                                                <li>
                                                    <b>{{ __('admin_pages.last_name') }}:</b> <span>{{ $order->last_name }}</span>
                                                </li>
                                                <li>
                                                    <b>{{ __('admin_pages.email') }}:</b> <span>{{ $order->email }}</span>
                                                </li>
                                                <li>
                                                    <b>{{ __('admin_pages.phone') }}:</b> <span>{{ $order->phone }}</span>
                                                </li>
                                                <li>
                                                    <b>{{ __('admin_pages.address') }}:</b> <span>{{ $order->address }}</span>
                                                </li>
                                                <li>
                                                    <b>{{ __('admin_pages.city') }}:</b> <span>{{ $order->city }}</span>
                                                </li>
                                                <li>
                                                    <b>{{ __('admin_pages.post_code') }}:</b> <span>{{ $order->post_code }}</span>
                                                </li>
                                                <li>
                                                    <b>{{ __('admin_pages.notes') }}:</b> <span>{{ $order->notes }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            @php
                                                foreach(unserialize($order->products) as $product) {
                                                $producta = $controller->getProductInfo($product['id']);
                                            @endphp
                                            <div class="product">
                                                <a href="{{ lang_url($producta->url) }}" target="_blank">
                                                    <img src="{{asset('../storage/app/public/'.$producta->image)}}" alt="">
                                                    <div class="info">
                                                        <span class="name">{{$producta->name}}</span>
                                                        <span class="qiantity">
                                                    <b>{{ __('admin_pages.quantity') }}</b> {{$product['quantity']}}
                                                </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </a>
                                            </div>
                                            @php
                                                }
                                            @endphp
                                            @foreach ($expedition as $exp)
                                                <li>
                                                    <b>{{ __('public_pages.expedition_date') }}</b> <span>{{ $exp->data }}</span>
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td>
                                <p><h2>{{ __('public_pages.no_orders') }}</h2></p>
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
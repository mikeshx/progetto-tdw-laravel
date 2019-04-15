@extends('layouts.app_public')

@section('content')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="orders-page">
                    <div class="card card-cascade narrower">
                        <div class="table-responsive-xs">
                            <table class="table">
                                <thead class="blue-grey lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>{{__('admin_pages.time_created')}}</th>
                                    <th>{{__('admin_pages.order_type')}}</th>
                                    <th>{{__('admin_pages.phone')}}</th>
                                    <th>{{__('admin_pages.status')}}</th>
                                    <th class="text-right"><i class="fa fa-list" aria-hidden="true"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->time_created }}</td>
                                        <td>{{ __('admin_pages.ord_'.$order->type) }}</td>
                                        <td>{{ $order->phone }}</td>

                                        @if($order->status == 0)
                                            <td> {{__('admin_pages.ord_status_new')}} </td>
                                        @elseif($order->status == 1)
                                            <td> {{__('admin_pages.ord_status_processed')}} </td>
                                        @elseif($order->status == 2)
                                            <td> {{__('admin_pages.ord_status_rej')}} </td>
                                        @endif

                                        <td class="text-right">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary show-more" data-show-tr="{{ $order->order_id }}">
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
                                                            <b>{{ __('admin_pages.first_name') }}</b> <span>{{ $order->first_name }}</span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('admin_pages.last_name') }}</b> <span>{{ $order->last_name }}</span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('admin_pages.email') }}</b> <span>{{ $order->email }}</span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('admin_pages.phone') }}</b> <span>{{ $order->phone }}</span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('admin_pages.address') }}</b> <span>{{ $order->address }}</span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('admin_pages.city') }}</b> <span>{{ $order->city }}</span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('admin_pages.post_code') }}</b> <span>{{ $order->post_code }}</span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('admin_pages.notes') }}</b> <span>{{ $order->notes }}</span>
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
                                                            <img src="{{asset('storage/'.$producta->image)}}" alt="">
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
                                        <p>{{ __('public_pages.no_orders') }}</p>
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $orders->links() }}
@endsection
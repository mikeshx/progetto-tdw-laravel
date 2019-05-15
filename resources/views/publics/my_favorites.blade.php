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
                                    <th>{{__('public_pages.product_name')}}</th>
                                    <th class="text-right"><i class="fa fa-list" aria-hidden="true"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($favorites as $favorite)
                                    <tr>
                                        <td>{{ $favorite->id }}</td>
                                        <td><a href="{{ lang_url($favorite->url) }}">{{ $favorite->name }}</a></td>
                                    </tr>
                                @empty
                                    <td>
                                        <p>{{ __('No favorites') }}</p>
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
@endsection
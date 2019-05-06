@extends('layouts.app_admin')
@section('content')
    <div class="myaccount-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        @foreach($ticket as $tick)
                            <h2>#{{ $ticket_number }} <br>{{__('public_pages.ticket_title')}}{{ $tick->obj }}</h2>
                        @endforeach
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="orders-page">
                            <div class="card card-cascade narrower">
                                <div class="table-responsive-xs">
                                    <table class="table">
                                        <thead class="blue-grey lighten-4">
                                        <tr>
                                            <th>{{__('public_pages.user')}}</th>
                                            <th>{{__('public_pages.message')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ticket_message as $message)
                                            <tr>
                                                <th>
                                                    <p>{{ $message->name }}</p>
                                                    <br><br>
                                                    <p>{{ $message->time }}</p>
                                                </th>
                                                <th>
                                                    <p>{{ $message->text }}</p>
                                                </th>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <th>
                                                    <p></p>
                                                </th>
                                                <th>
                                                    <div class="modal-body">
                                                        <form method="POST" action="" id="formSendMessage">
                                                            {{ csrf_field() }}
                                                            <div class="md-form">
                                                                <i class="fa prefix grey-text"></i>
                                                                <input type="hidden" value="{{ $ticket_number }}" name="n_ticket" />
                                                                <textarea  class="form-control" placeholder="{{__('public_pages.message')}}" name="message" rows="3"></textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="btn-allign">
                                                        <button type="button" class="btn btn-secondary" onclick="SendMessageAdmin()">{{__('public_pages.reply')}}</button>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
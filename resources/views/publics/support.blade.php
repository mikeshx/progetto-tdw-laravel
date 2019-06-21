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
                            <th><span class="title">{{__('public_pages.id_ticket')}}</span></th>
                            <th><span class="title">{{__('public_pages.obj')}}</span></th>
                            <th><span class="title">{{__('public_pages.requested_date')}}</span></th>
                            <th><span class="title">{{__('public_pages.status')}}</span></th>
                            <th class="text-right">
                                <button class="btn btn-default btn-n" data-toggle="modal" data-target="#modalNewTicket">
                                    {{__('public_pages.new_ticket')}}
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($ticket as $req)
                            <tr>
                                <td><h2>{{ $req->ticket_number }}</h2></td>
                                <td><h2>{{ $req->obj }}</h2></td>
                                <td><h2>{{ $req->time }}</h2></td>
                                @if( $req->status  == 0)
                                    <td><h2>{{__('public_pages.new')}}</h2></td>
                                @elseif( $req->status  == 1)
                                    <td><h2>{{__('public_pages.processing')}}</h2></td>
                                @else
                                    <td><h2>{{__('public_pages.close')}}</h2></td>
                                @endif
                                <td> <a href="support_message/{{ $req->ticket_number }}" class="btn btn-default">{{__('public_pages.open_ticket')}}</a></td>
                            </tr>
                        @empty
                            <td>
                                <p><h2>{{ __('public_pages.no_ticket') }}</h2></p>
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $ticket->links() }}
    <!-- Modal NewTicket -->
    <div class="modal fade" id="modalNewTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{__('public_pages.new_ticket')}}</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="formManageTicket">
                        {{ csrf_field() }}
                        <input type="hidden" name="edit" value="{{isset($_GET['edit']) ? $_GET['edit'] : 0 }}">
                        <div class="md-form">
                            <i class="fa prefix grey-text"></i>
                            <label for="defaultForm-name">{{__('public_pages.obj')}}</label>
                            <input type="text" name="obj" placeholder="{{__('public_pages.obj')}}" id="defaultForm-name" class="form-control">
                        </div>
                        <div class="md-form">
                            <i class="fa prefix grey-text"></i>
                            <label for="defaultForm-name">{{__('public_pages.message')}}</label>
                            <textarea class="form-control" placeholder="{{__('public_pages.message')}}" name="message" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="">
                    <button type="button" class="btn btn-default btn-cn" data-dismiss="modal">{{__('admin_pages.close')}}</button>
                    <button type="button" class="btn btn-default btn-cn" onclick="AddTicket()">{{__('public_pages.send')}}</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        @php
            if (isset($_GET['edit']))
            {
        @endphp
        $(document).ready(function(){
            $('#modalNewTicket').modal('show');
        });
        $("#modalNewTicket").on("hidden.bs.modal", function () {
            window.location.href = "{{ lang_url('publics/support') }}";
        });
        @php
        }
        @endphp
    </script>
@endsection
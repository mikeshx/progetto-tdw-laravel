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
                                    <th>{{__('public_pages.id_ticket')}}</th>
                                    <th>{{__('public_pages.obj')}}</th>
                                    <th>{{__('public_pages.requested_date')}}</th>
                                    <th>{{__('public_pages.status')}}</th>
                                    <th class="text-right">
                                        <button class="btn btn-sm btn-save waves-effect waves-light" data-toggle="modal" data-target="#modalNewTicket">
                                            {{__('public_pages.new_ticket')}}
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($ticket as $req)
                                    <tr>
                                        <td>{{ $req->ticket_number }}</td>
                                        <td> <a href="support_message/{{ $req->ticket_number }}" class="waves-effect waves-light btn green">{{ $req->obj }}</a></td>
                                        <td>{{ $req->time }}</td>
                                        @if( $req->status  == 0)
                                            <td>{{__('public_pages.new')}}</td>
                                            @elseif( $req->status  == 1)
                                            <td>{{__('public_pages.processing')}}</td>
                                            @else
                                            <td>{{__('public_pages.close')}}</td>
                                        @endif
                                    </tr>
                                @empty
                                    <td>
                                        <p>{{ __('public_pages.no_ticket') }}</p>
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
                <div class="btn-allign">
                    <button type="button" class="btn btn-close" data-dismiss="modal">{{__('admin_pages.close')}}</button>
                    <button type="button" class="btn btn-save" onclick="AddTicket()">{{__('public_pages.send')}}</button>
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
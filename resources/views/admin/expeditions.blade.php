@extends('layouts.app_admin')

@section('content')
    <div class="card card-cascade narrower">
        <div class="table-responsive">
            <table class="table">
                <thead class="blue-grey lighten-4">
                <tr>
                    <th>#</th>
                    <th>{{__('admin_pages.order_number')}}</th>
                    <th>{{__('admin_pages.date_expeditions')}}</th>
                    <th>{{__('admin_pages.city')}}</th>
                    <th>{{__('admin_pages.address')}}</th>
                    <th>{{__('admin_pages.post_code')}}</th>
                    <th class="text-right">
                        <button class="btn btn-sm btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#modalAddEditExpeditions">
                            {{__('admin_pages.add_expeditions')}}
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($expeditions as $expedition)
                    <tr>
                        <th scope="row">{{$expedition->id}}</th>
                        <td>{{$expedition->order_id}}</td>
                        <td>{{$expedition->date}}</td>
                        <td>{{$expedition->city}}</td>
                        <td>{{$expedition->address}}</td>
                        <td>{{$expedition->post_code}}</td>
                        <td class="text-right">
                            <a href="{{lang_url('admin/delete/expedition/'.$expedition->id)}}" class="btn btn-sm btn-secondary waves-effect waves-light confirm" data-my-message="{{__('admin_pages.are_u_sure_delete_e')}}">{{__('admin_pages.delete_user')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $expeditions->links() }}
    <!-- Modal Add/Edit expeditions -->
    <div class="modal fade" id="modalAddEditExpeditions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{__('admin_pages.expeditions_settings')}}</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="formManageExpeditions">
                        {{ csrf_field() }}
                        <input type="hidden" name="edit" value="{{isset($_GET['edit']) ? $_GET['edit'] : 0 }}">
                        <div class="md-form">
                            <i class="fa prefix grey-text"></i>
                            <input type="text" name="id_order" value="{{$expeditionInfo != null? $expeditionInfo->id_order : ''}}" id="defaultForm-name" class="form-control">
                            <label for="defaultForm-name">{{__('admin_pages.order_number')}}</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('admin_pages.close')}}</button>
                    <button type="button" class="btn btn-secondary" onclick="updateExpedition()">{{__('admin_pages.save_changes')}}</button>
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
            $('#modalAddEditExpeditions').modal('show');
        });
        $("#modalAddEditExpeditions").on("hidden.bs.modal", function () {
            window.location.href = "{{ lang_url('admin/expeditions') }}";
        });
        @php
            }
        @endphp
    </script>
@endsection

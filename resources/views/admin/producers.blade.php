@extends('layouts.app_admin')

@section('content')
    <div class="card card-cascade narrower">
        <div class="table-responsive">
            <table class="table">
                <thead class="blue-grey lighten-4">
                <tr>
                    <th>#</th>
                    <th>{{__('admin_pages.product_name')}}</th>
                    <th>{{__('admin_pages.producer_brewery')}}</th>
                    <th>{{__('admin_pages.link_to')}}</th>
                    <th class="text-right">
                        <button class="btn btn-sm btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#modalAddEditProducers">
                            {{__('admin_pages.add_producer')}}
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($producers as $producer)
                    <tr>
                        <th scope="row">{{$producer->id}}</th>
                        <td>{{$producer->name}}</td>
                        <td>{{$producer->brewery}}</td>
                        <td>{{$producer->link}}</td>
                        <td class="text-right">
                            <a href="?edit={{$producer->id}}" class="btn btn-sm btn-secondary waves-effect waves-light">{{__('admin_pages.edit_producer')}}</a>
                            <a href="{{lang_url('admin/delete/producers/'.$producer->id)}}" class="btn btn-sm btn-secondary waves-effect waves-light confirm" data-my-message="{{__('admin_pages.are_u_sure_delete_p')}}">{{__('admin_pages.delete_user')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $producers->links() }}
    <!-- Modal Add/Edit expeditions -->
    <div class="modal fade" id="modalAddEditProducers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{__('admin_pages.expeditions_settings')}}</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="formManageProducers">
                        {{ csrf_field() }}
                        <input type="hidden" name="edit" value="{{isset($_GET['edit']) ? $_GET['edit'] : 0 }}">
                        <div class="md-form">
                            <i class="fa prefix grey-text"></i>
                            <input type="text" name="product_id" value="{{$producerInfo != null? $producerInfo->product_id : ''}}" id="defaultForm-product" class="form-control">
                            <label for="defaultForm-name">{{__('admin_pages.product_number')}}</label>
                        </div>
                        <div class="md-form">
                            <i class="fa prefix grey-text"></i>
                            <input type="text" name="producer_brewery" value="{{$producerInfo != null? $producerInfo->brewery : ''}}" id="defaultForm-name" class="form-control">
                            <label for="defaultForm-name">{{__('admin_pages.producer_brewery')}}</label>
                        </div>
                    </form>
                        <div class="md-form">
                            <i class="fa prefix grey-text"></i>
                            <input type="text" name="producer_link" value="{{$producerInfo != null? $producerInfo->link : ''}}" id="defaultForm-name" class="form-control">
                            <label for="defaultForm-name">{{__('admin_pages.link_to')}}</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('admin_pages.close')}}</button>
                    <button type="button" class="btn btn-secondary" onclick="updateProducer()">{{__('admin_pages.save_changes')}}</button>
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
            $('#modalAddEditProducers').modal('show');
        });
        $("#modalAddEditProducers").on("hidden.bs.modal", function () {
            window.location.href = "{{ lang_url('admin/producers') }}";
        });
        @php
            }
        @endphp
    </script>
@endsection
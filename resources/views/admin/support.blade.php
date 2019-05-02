@extends('layouts.app_admin')
@section('content')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <div class="orders-page">
        <div class="card card-cascade narrower">
            <div class="table-responsive-xs">
                <table class="table">
                    <thead class="blue-grey lighten-4">
                    <tr>
                        <th>#</th>
                        <th>{{__('admin_pages.obj')}}</th>
                        <th>{{__('admin_pages.time')}}</th>
                        <th>{{__('admin_pages.status')}}</th>
                        <th>{{__('admin_pages.option_ticket')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ticket as $req)
                        <tr>
                            <td>{{ $req->id }}</td>
                            <td>{{ $req->obj }}</td>
                            <td>{{ $req->time }}</td>
                            <td>
                                <select class="selectpicker change-ord-status" data-ord-id="{{$req->id}}" data-style="btn-secondary">
                                    <option {{ $req->status == 0 ? 'selected="selected"' : '' }} value="0">{{__('admin_pages.new')}}</option>
                                    <option {{ $req->status == 1 ? 'selected="selected"' : '' }} value="1">{{__('admin_pages.processing')}}</option>
                                    <option {{ $req->status == 2 ? 'selected="selected"' : '' }} value="2">{{__('admin_pages.close')}}</option>
                                </select>
                            </td>
                            <td><a href="support_message/{{ $req->id }}" class="waves-effect waves-light btn green">{{__('admin_pages.open_ticket')}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script>
        $('.change-ord-status').change(function () {
            var order_id = $(this).data('ord-id');
            var order_value = $(this).val();
            $.ajax({
                type: "POST",
                url: urls.changeStatus,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {order_id: order_id, order_value: order_value}
            }).done(function (data) {
                showAlert('success', "{{ __('admin_pages.status_changed') }}");
            });
        });
    </script>
@endsection
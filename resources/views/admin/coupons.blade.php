@extends('layouts.app_admin')

@section('content')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="coupon.add" method="POST" >
                {{ csrf_field() }}
                <input type="hidden" name="folder" value="{{isset($product['product']->folder) ? $product['product']->folder : '0'}}">
                <div class="card">
                    <div class="card-body">
                        <div class="form-header btn-secondary">
                            <h3>
                                Add a new coupon
                            </h3>
                        </div>
                        <hr>
                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="value" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Discount Value</label>
                        </div>

                        <div class="md-form">
                            <label class="alone">Product</label>
                            <div class="element-label-text bordered-div">
                                <select class="selectpicker" name="id_product" data-style="btn-secondary">
                                    <option value="000">Empty </option>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            </br>

                            <div class="md-form">
                                <label class="alone">Apply all </label>
                                <div class="element-label-text bordered-div">
                                    <input type="checkbox" name="all_products" value="off" class="switch-me" data-on-color="secondary" name="hidden">
                                </div>
                            </div>

                        </div>
                        <div class="clones"></div>
                        <hr>
                        <div class="text-right">
                            <button class="btn btn-secondary waves-effect waves-light">Generate</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
    <script>
        $('.selectpicker').selectpicker();
        $('.switch-me').bootstrapSwitch();
        document.getElementById('cover-upload').onchange = function () {
            $('.upload-wrap .file-name').show().append(this.value);
        };
        function showMeNewImgUpload() {
            $('.clones').append('<div><input type="file" name="gallery_image[]" multiple></div>');
        }
        $('.input-tags').tagsinput({
            tagClass: function() {
                return 'label label-secondary';
            }
        });
    </script>
@endsection

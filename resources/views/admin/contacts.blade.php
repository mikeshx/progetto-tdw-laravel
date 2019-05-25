@extends('layouts.app_admin')

@section('content')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="contacts.add" method="POST" >
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
                            <input type="text" name="facebook" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Facebook: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="instagram" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Instagram: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="twitter" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Twitter: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="google_plus" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Google Plus: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="position" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Address (coordinates): </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_1" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Address 1: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_2" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Address 2: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_3" value="" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Address 3: </label>
                        </div>

                        </br>

                    </div>
                    <div class="clones"></div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-secondary waves-effect waves-light">Add</button>
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

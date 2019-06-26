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
                                Add company informations
                            </h3>
                        </div>
                        <hr>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="facebook_desc" value="{{$contacts->facebook_desc}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Facebook description: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="facebook_link" value="{{$contacts->facebook_link}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Facebook link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="instagram_desc" value="{{$contacts->instagram_desc}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Instagram description:: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="instagram_link" value="{{$contacts->instagram_link}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Instagram link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="twitter_desc" value="{{$contacts->twitter_desc}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Twitter description: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="twitter_link" value="{{$contacts->twitter_link}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Twitter link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="position" value="{{$contacts->position}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Google maps api link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_1" value="{{$contacts->address}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Address: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_2" value="{{$contacts->email}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Email: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_3" value="{{$contacts->telephone}}" id="publishForm-quantity" class="form-control">
                            <label for="publishForm-quantity">Telephone: </label>
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

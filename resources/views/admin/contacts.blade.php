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
                            <input type="text" name="facebook_desc" value="@isset($contacts){{$contacts->facebook_desc}}@endisset" id="publishForm-quantity1" class="form-control">
                            <label for="publishForm-quantity1">Facebook description: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="facebook_link" value="@isset($contacts){{$contacts->facebook_link}}@endisset" id="publishForm-quantity2" class="form-control">
                            <label for="publishForm-quantity2">Facebook link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="instagram_desc" value="@isset($contacts){{$contacts->instagram_desc}}@endisset" id="publishForm-quantity3" class="form-control">
                            <label for="publishForm-quantity3">Instagram description:: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="instagram_link" value="@isset($contacts){{$contacts->instagram_link}}@endisset" id="publishForm-quantity4" class="form-control">
                            <label for="publishForm-quantity4">Instagram link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="twitter_desc" value="@isset($contacts){{$contacts->twitter_desc}}@endisset" id="publishForm-quantity5" class="form-control">
                            <label for="publishForm-quantity5">Twitter description: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="twitter_link" value="@isset($contacts){{$contacts->twitter_link}}@endisset" id="publishForm-quantity6" class="form-control">
                            <label for="publishForm-quantity6">Twitter link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="google_plus_desc" value="@isset($contacts){{$contacts->google_plus_desc}}@endisset" id="publishForm-quantity7" class="form-control">
                            <label for="publishForm-quantity7">Google plus description: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="google_plus_link" value="@isset($contacts){{$contacts->google_plus_link}}@endisset" id="publishForm-quantity8" class="form-control">
                            <label for="publishForm-quantity8">Google plus link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="position" value="@isset($contacts){{$contacts->position}}@endisset" id="publishForm-quantity9" class="form-control">
                            <label for="publishForm-quantity9">Google maps api link: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_1" value="@isset($contacts){{$contacts->address}}@endisset" id="publishForm-quantity10" class="form-control">
                            <label for="publishForm-quantity10">Address: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_2" value="@isset($contacts){{$contacts->email}}@endisset" id="publishForm-quantity11" class="form-control">
                            <label for="publishForm-quantity11">Email: </label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <input type="text" name="address_3" value="@isset($contacts){{$contacts->telephone}}@endisset" id="publishForm-quantity12" class="form-control">
                            <label for="publishForm-quantity12">Telephone: </label>
                        </div>

                        </br>

                    </div>
                    <div class="clones"></div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-secondary waves-effect waves-light">Add</button>
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

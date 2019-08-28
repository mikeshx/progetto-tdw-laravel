@extends('layouts.app_admin')

@section('content')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="post.add" method="POST" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="form-header btn-secondary">
                                 <h3>
                            Add a new post
                        </h3>
                    </div>
                    <hr>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="post_title" value="" id="publishForm-quantity" class="form-control">
                        <label for="publishForm-quantity">Title: </label>
                    </div>

                        <div class="md-form">
                            <br><br>
                            <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                            <textarea class="form-control" name="post_content" rows="20" id="comment"></textarea>
                            <label for="publishForm-quantity">Post: </label>
                        </div>



                    </br>

                    </div>
                    <div class="clones"></div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-secondary waves-effect waves-light">Add new post</button>
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

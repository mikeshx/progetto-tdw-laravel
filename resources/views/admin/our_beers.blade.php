@extends('layouts.app_admin')

@section('content')

    <h3>Add a new product (our beers)</h3> </br>

    <form action="/admin/our_beers/product.add" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="locale-container locale-container-en"  style="display:block;" >
        <div class="md-form">
            <i class="fa fa-font prefix grey-text"></i>
            <input type="text" name="beer_name" value="" id="publishForm-name-en_0" class="form-control">
            <label for="publishForm-name-en_0">Name of product: </label>
        </div>

        <div class="md-form">
            <i class="fa fa-beer prefix grey-text"></i>
            <input type="text" name="beer_type" value="" id="publishForm-name-en_1" class="form-control">
            <label for="publishForm-name-en_1">Beer type: </label>
        </div>

        <div class="md-form clone-file-upload">
            <label class="alone">Cover image</label>
            <div class="element-label-text">
                <div class="upload-wrap">
                    <button type="button" class="btn btn-secondary">Choose image</button>
                    <input type="file" name="cover_image" id="cover-upload" class="upload-btn">
                    <div class="file-name"></div>
                </div>
            </div>
        </div>

        <div class="md-form">
            <i class="fa fa-pencil prefix grey-text"></i>
            <textarea name="beer_description" id="productDescr-en_2" class="md-textarea"></textarea>
            <label for="productDescr-en_2">Description: </label>
        </div>
        <div class="md-form">
            <i class="fa fa-beer prefix grey-text"></i>
            <textarea name="beer_alcohol_content" id="productDescr-en_3" class="md-textarea"></textarea>
            <label for="productDescr-en_3">Alcohol content %: </label>
        </div>
        <div class="md-form">
            <i class="fa fa-eur prefix grey-text"></i>
            <input type="text" name="beer_price" value="" id="publishForm-price-en_4" class="form-control">
            <label for="publishForm-price-en_4">Price: </label>
        </div>
    </div>

    <div class="modal-footer">
        <button class="btn btn-default" type="submit">Add product </button>
    </div>
    </form>

    </br><h3>Text Containers</h3> </br></br>

    <form action="/admin/our_beers/info.add" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="md-form">
        <i class="fa fa-pencil prefix grey-text"></i>
        <textarea name="text_container_1" id="productDescription1" class="md-textarea">@isset($data) {{$data->text_container_1}} @endisset</textarea>
        <label for="productDescription1">Text Container 1</label>
    </div>

    <div class="md-form">
        <i class="fa fa-pencil prefix grey-text"></i>
        <textarea name="text_container_2" id="productDescription2" class="md-textarea">@isset($data) {{$data->text_container_2}} @endisset</textarea>
        <label for="productDescription2">Text Container 2</label>
    </div>

    <div class="md-form">
        <i class="fa fa-pencil prefix grey-text"></i>
        <textarea name="text_container_3" id="productDescription3" class="md-textarea">@isset($data) {{$data->text_container_3}} @endisset</textarea>
        <label for="productDescription3">Text Container 3</label>
    </div>

    <div class="md-form">
        <i class="fa fa-pencil prefix grey-text"></i>
        <textarea name="text_container_4" id="productDescription4" class="md-textarea">@isset($data) {{$data->text_container_4}} @endisset</textarea>
        <label for="productDescription4">Text Container 4</label>
    </div>

        <div class="md-form">
            <i class="fa fa-pencil prefix grey-text"></i>
            <textarea name="slider_1" type="text" id="productDescription4" class="md-textarea">@isset($data) {{$data->slider_1}} @endisset</textarea>
            <label for="productDescription5">Slider 1</label>
        </div>



    <div class="fast-orders">
        <div class="row">
            <div class="col-sm-8">
                <h3>Informations</h3></br></br>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="counter_1" id="publishForm-quantity_1" class="form-control" value="@isset($data) {{$data->counter_1}} @endisset">
                        <label for="publishForm-quantity_1">Flavours: </label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="counter_2" id="publishForm-quantity_2" class="form-control" value="@isset($data) {{$data->counter_2}} @endisset">
                        <label for="publishForm-quantity_2">Outlets: </label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="counter_3" id="publishForm-quantity_3" class="form-control" value="@isset($data) {{$data->counter_3}} @endisset">
                        <label for="publishForm-quantity_3">Years; </label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="counter_4" id="publishForm-quantity_4" class="form-control" value="@isset($data) {{$data->counter_4}} @endisset">
                        <label for="publishForm-quantity_4">Day: </label>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-default" type="submit">Save </button>
                    </div>

            </div>
        </div>
    </div>
    </form>


@endsection
@extends('layouts.app_admin')

@section('content')
    <h2>{{__('admin_pages.slider')}}</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="add-slider">
                <button class="btn btn-sm btn-secondary waves-effect waves-light pull-right" data-toggle="modal" data-target="#modalAddSlide">
                    {{__('admin_pages.add_new_slide')}}
                </button>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row carousel-sliders">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            @foreach ($sliders as $slider)
                <div class="slide">
                    <img src="{{asset('../storage/app/public/'.$slider->image)}}" class="img-fluid z-depth-1" alt="1">
                    <span class="link">
                <a href="{{$slider->link}}" target="_blank">{{$slider->link}}</a>
            </span>
                    <span class="position z-depth-2">{{$slider->position}}</span>
                    <a href="{{lang_url('admin/delete/story/'.$slider->id)}}" class="btn btn-sm btn-secondary waves-effect waves-light confirm delete" data-my-message="{{__('admin_pages.are_u_sure_delete_s')}}">
                        <i class="fa fa-trash mt-0"></i>
                    </a>
                </div>
            @endforeach
            {{ $sliders->links() }}
        </div>
    </div>
    <div class="modal fade" id="modalAddSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{__('admin_pages.add_new_slide')}}</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formAdd" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="md-form available-translations">
                            <span>{{__('admin_pages.choose_locale')}}</span>
                            @foreach ($locales as $locale)
                                <button type="button" data-locale-change="{{$locale}}" class="btn btn-outline-secondary waves-effect locale-change @if ($currentLocale == $locale) active @endif">{{$locale}}</button>
                            @endforeach
                        </div>
                        <hr>
                        @foreach ($locales as $locale)
                            <input type="hidden" name="translation[]" value="{{$locale}}">
                            <div class="locale-container locale-container-{{$locale}}" @if ($currentLocale == $locale) style="display:block;" @endif>
                                <div class="md-form">
                                    <label class="alone">{{__('admin_pages.image_slide')}}</label>
                                    <div class="element-label-text">
                                        <div class="upload-wrap">
                                            <button type="button" class="btn btn-secondary">{{ __('admin_pages.choose_cover_img')}}</button>
                                            <input type="file" name="image_{{$locale}}[]" class="upload-btn">
                                            <div class="file-name"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-form">
                                    <label class="alone">{{__('admin_pages.title1')}}</label>
                                    <div class="element-label-text">
                                        <input type="text" value="" name="title1"  class="form-control">
                                    </div>
                                </div>
                                <div class="md-form">
                                    <label class="alone">{{__('admin_pages.title2')}}</label>
                                    <div class="element-label-text">
                                        <input type="text" value="" name="title2"  class="form-control">
                                    </div>
                                </div>
                                <div class="md-form">
                                    <label class="alone">{{__('admin_pages.text')}}</label>
                                    <div class="element-label-text">
                                        <input type="text" value="" name="text"  class="form-control">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="md-form">
                            <label class="alone">{{__('admin_pages.position')}}</label>
                            <div class="element-label-text">
                                <input type="text" value="" placeholder="1" name="position"  class="form-control">
                            </div>
                        </div>
                        <div class="md-form">
                            <label class="alone">{{__('admin_pages.link')}}</label>
                            <div class="element-label-text">
                                <input type="text" value="" placeholder="http://yoursite.com/link-1" name="link"  class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('admin_pages.close')}}</button>
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('formAdd').submit();">{{__('admin_pages.add')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fast-orders">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{__('admin_pages.important_date')}}</h2>
                <div class="card card-cascade narrower">
                    <div class="table-responsive-xs">
                        <table class="table">
                            <thead class="blue-grey lighten-4">
                            <tr>
                                <th>{{__('admin_pages.date')}}</th>
                                <th>{{__('admin_pages.title')}}</th>
                                <th>{{__('admin_pages.lang')}}</th>
                                <th class="text-right">
                                    <button class="btn btn-sm btn-secondary waves-effect waves-light pull-right" data-toggle="modal" data-target="#modalAddYear">
                                        {{__('admin_pages.add_date')}}
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($story as $s)
                                <tr>
                                    <td>{{ $s->date }}</td>
                                    <td>{{ $s->title }}</td>
                                    <td>{{ $s->locale }}</td>
                                    <td>
                                        <a href="{{lang_url('admin/delete/storyDate/'.$s->id)}}" class="btn btn-sm btn-secondary waves-effect waves-light confirm delete" data-my-message="{{__('admin_pages.are_u_sure_delete_date')}}">
                                            <i class="fa fa-trash mt-0"></i>
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4">{{__('admin_pages.empty')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalAddYear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{__('admin_pages.add_new_date')}}</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="story/setDate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="md-form available-translations">
                            <span>{{__('admin_pages.choose_locale')}}</span>
                            @foreach ($locales as $locale)
                                <button type="button" data-locale-change="{{$locale}}" class="btn btn-outline-secondary waves-effect locale-change @if ($currentLocale == $locale) active @endif">{{$locale}}</button>
                            @endforeach
                        </div>
                        <hr>
                        @foreach ($locales as $locale)
                            <input type="hidden" name="translation[]" value="{{$locale}}">
                            <div class="locale-container locale-container-{{$locale}}" @if ($currentLocale == $locale) style="display:block;" @endif>
                                <div class="md-form">
                                    <label class="alone">{{__('admin_pages.date')}}</label>
                                    <div class="element-label-text">
                                        <input type="date" value="" name="date"  class="form-control">
                                    </div>
                                </div>
                                <div class="md-form">
                                    <label class="alone">{{__('admin_pages.title')}}</label>
                                    <div class="element-label-text">
                                        <input type="text" value="" name="title"  class="form-control">
                                    </div>
                                </div>
                                <div class="md-form">
                                    <label class="alone">{{__('admin_pages.text')}}</label>
                                    <div class="element-label-text">
                                        <input type="text" value="" name="text"  class="form-control">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{__('admin_pages.close')}}</button>
                            <button type="submit" class="btn btn-secondary" >{{__('admin_pages.add')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="fast-orders">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{__('admin_pages.info_story')}}</h2>

                <form action="story/update" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="flavours" value="{{ $story_info->flavours }}" id="publishForm-quantity" class="form-control">
                        <label for="publishForm-quantity">{{__('admin_pages.flavours')}} </label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="outlets" value="{{ $story_info->outlets }}" id="publishForm-quantity" class="form-control">
                        <label for="publishForm-quantity">{{__('admin_pages.outlets')}} </label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="years" value="{{ $story_info->years }}" id="publishForm-quantity" class="form-control">
                        <label for="publishForm-quantity">{{__('admin_pages.years')}} </label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="day" value="{{ $story_info->day }}" id="publishForm-quantity" class="form-control">
                        <label for="publishForm-quantity">{{__('admin_pages.day')}} </label>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-default" type="submit">{{__('admin_pages.save')}} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $('.upload-btn').change(function () {
            $(this).next('.file-name').show().append($(this).val());
        });
    </script>
@endsection
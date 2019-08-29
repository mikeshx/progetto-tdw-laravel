@extends('layouts.header_1')

@section('content')
<!-- Dynamic content of the website-->

<!-- Section -->

<div class="container-fluid light section no-padding">
    <div class="row">

        @foreach ($posts as $post)

        <div class="col-sm-6 latest-post odd matchHeight">
            <a href="blog-single.html"></a>
            <div class="row">
                <div class="col-sm-10 col-sm-push-1">
                    <header>
                        <span class="date">{{$post->post_date}}</span>
                        <h2>{{$post->post_title}}</h2>
                    </header>
                    {{$post->post_content}}
                    <p><a href="#" class="underline">Read more</a></p>
                </div>
            </div>
            <div class="background" style="background-image: url(http://placehold.it/750x535);"></div>
        </div>

        @endforeach

    </div>
</div>
<!-- Section -->
<div class="container-fluid super-dark section no-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="horz-menu center-menu pages">
                    <li class="active"><span><a href="#">1</a></span></li>
                    <li><span><a href="#">2</a></span></li>
                    <li><span><a href="#">3</a></span></li>
                    <li><span><a href="#">4</a></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

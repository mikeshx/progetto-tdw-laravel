@extends('layouts.header_1')

@section('content')
<!-- Dynamic content of the website-->

<!-- Section -->

<div class="container-fluid light section no-padding">
    <div class="row">

        @php
            $odd_count = 0;
        @endphp

        @foreach($posts as $post)

                @php
                    if ($odd_count == 0) {
                    echo '<div class="col-sm-6 latest-post odd matchHeight">';
                    $odd_count++;
                    } else if ($odd_count == 1) {
                    echo '<div class="col-sm-6 latest-post even matchHeight">';
                    $odd_count--;
                    }

                @endphp

                <a href="{{'/blog/' . $post->post_url . '-' . $post->post_id}}"></a>
                <div class="row">
                    <div class="col-sm-10 col-sm-push-1">
                        <header>
                            <span class="date">{{$post->post_date}}</span>
                            <h2>{{$post->post_title}}</h2>
                        </header>
                        {!! $post->post_content !!}
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

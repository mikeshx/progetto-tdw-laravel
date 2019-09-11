@extends('layouts.header_1')

@section('content')


    <!-- Hero
    <div id="hero" class="single-page section" style="background-image: url(images/beer_blog.jpg)">
        <div class="container">
            <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                <div class="col-md-10 col-md-offset-1">
                    <h1>Welcome to the</h1>
                    <h2>Brewers bible</h2>
                </div>
            </div>
        </div>


    </div>
    -->

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="author center-menu">Posted by {{$posted_by}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid light section">
        <div class="container">

            @php

                if ($canEdit) {
            @endphp
                <h4>Edit post: <a href="/edit_blog_post-{{$post_id}}"><img src="https://img.icons8.com/material-sharp/24/000000/edit.png"> </a></h4>
                <h4>Delete post: <a href="/delete_blog_post-{{$post_id}}"><img src="https://img.icons8.com/material-sharp/24/000000/delete-sign.png"> </a></h4>

            @php } @endphp

            <br/><br/><br/>
            <div class="row"  >

                <div class="col-sm-12 single-blog">

                    <header>
                        <span class="date">{{$post_date}}</span>
                        <h2>{{$post_title}}</h2>
                    </header>
                    <!-- this will allow to write html in posts -->
                    {!! $post_content !!}
                </div>
            </div>
        </div>
    </div>

@endsection
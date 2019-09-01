@extends('layouts.header_1')

@section('content')

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
            <div class="row">
                <div class="col-sm-12 single-blog">
                    <img src="http://placehold.it/750x535" alt="Craft beer single blog post" />
                    <header>
                        <span class="date">{{$post_date}}</span>
                        <h2>{{$post_title}}</h2>
                    </header>
                 {{$post_content}}
                </div>
            </div>
        </div>
    </div>

@endsection
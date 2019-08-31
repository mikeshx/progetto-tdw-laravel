@extends('layouts.header_1')

@section('content')

    <!-- Hero -->
    <div id="hero" class="single-page section" style="background-image: url(http://placehold.it/1500x500)">

        <!-- Content -->
        <div class="container">
            <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                <div class="col-md-10 col-md-offset-1">
                    <h1>Welcome to the</h1>
                    <h2>Brewers bible</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="author center-menu">Posted by Lee {{$posted_by}} / <a href="#comments">3 comments</a></p>
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

    <!-- Section -->
    <div class="container-fluid section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 id="comments">Comments</h3>
                </div>
                <div class="col-sm-12 user-comments">
                    <div class="row scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatey="75">
                        <div class="col-sm-1">
                            <img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
                        </div>
                        <div class="col-sm-11">
                            <h5>David Moore</h5>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>
                            <span class="edit">
										<a href="#">Reply</a> | <a href="#">Edit</a>
									</span>
                        </div>
                    </div>
                    <div class="row scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatey="75">
                        <div class="col-sm-1">
                            <img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
                        </div>
                        <div class="col-sm-11">
                            <h5>Terry Woods</h5>
                            <p>Anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            <span class="edit">
										<a href="#">Reply</a> | <a href="#">Edit</a>
									</span>
                        </div>
                    </div>
                    <div class="row scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatey="75">
                        <div class="col-sm-1">
                            <img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
                        </div>
                        <div class="col-sm-11">
                            <h5>Alex Johnstone</h5>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica.</p>
                            <span class="edit">
										<a href="#">Reply</a> | <a href="#">Edit</a>
									</span>
                        </div>
                    </div>
                    <div class="row scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatey="75">
                        <div class="col-sm-1">
                            <img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
                        </div>
                        <div class="col-sm-11">
                            <h5>Harry Ransome</h5>
                            <p>Anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            <span class="edit">
										<a href="#">Reply</a> | <a href="#">Edit</a>
									</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid light section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 dark matchHeight">
                    <section class="alignMiddle padding-80-0 mobile-center">
                        <header>
                            <h1>Leave a</h1>
                            <h2>Comment</h2>
                        </header>
                        <p>A tough one to drink. The use of molasses and licorice is simply overwhelming and without balance.</p>
                    </section>
                    <div class="grey-background" style="background-image: url(http://placehold.it/750x565); background-size: cover;"></div>
                </div>
                <div class="col-sm-5 col-sm-push-1 matchHeight">
                    <section class="alignMiddle padding-80-0">
                        <form class=" scrollme animateme" data-when="enter" data-from="1" data-to="0" data-opacity="0" data-scale="1.1">
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="_replyto" placeholder="Email">
                            <textarea name="comment" placeholder="Comment" rows="5"></textarea>
                            <input type="submit" value="Post comment" class="btn btn-default">
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.header_3')
@section('content')
    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @foreach($ticket as $tick)
                        <p class="author center-menu"><a href="../support">#{{ $ticket_number }}</a> / {{ $tick->obj }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 id="comments">{{__('public_pages.message')}}</h3>
                </div>
                <div class="col-sm-12 user-comments">
                    @foreach($ticket_message as $message)
                    <div class="row scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatey="75">
                        <div class="col-sm-1">
                            <img src="{{asset('../storage/app/public/'.$message->directory)}}" alt="No IMG" /> <!--- Settare le immagini utente -->
                        </div>
                        <div class="col-sm-11">
                            <h5>{{ $message->name }}</h5>
                            <p>{{ $message->text }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if($tick->status != 2)
    <!-- Section -->
    <div class="container-fluid light section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 dark matchHeight">
                    <section class="alignMiddle padding-80-0 mobile-center">
                        <header>
                            <h1>{{__('public_pages.leave')}}</h1>
                            <h2>{{__('public_pages.message2')}}</h2>
                        </header>
                        <p></p>
                    </section>
                    <div class="grey-background" style="background-color: #101112; background-size: cover;"></div>
                </div>
                <div class="col-sm-5 col-sm-push-1 matchHeight">
                    <section class="alignMiddle padding-80-0">
                        <form class=" scrollme animateme" data-when="enter" data-from="1" data-to="0" data-opacity="0" data-scale="1.1" method="POST" id="formSendMessage">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $ticket_number }}" name="n_ticket" />
                            <textarea name="message" placeholder="{{__('public_pages.message2')}}" rows="5"></textarea>
                            <input type="submit" value="{{__('public_pages.reply')}}" class="btn btn-default" onclick="SendMessage()">
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
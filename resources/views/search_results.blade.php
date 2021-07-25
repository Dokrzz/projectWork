@extends('layouts.master')


@section('main')
    @include('includes.message-block')
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>
                    Your Search results...
                </h3>
            </header>
            <div class="main">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Posts</h3>
                        @if($posts->isNotEmpty())
                            @foreach($posts as $post)
                                <div>
                                    <p>{{$post->body}}</p>
                                    <div class="info">
                                        Posted by {{ $post->user->first_name }} on {{ $post->created_at }} to <a href="#">{{$post->network}}</a> .
                                    </div>
                                </div>

                            @endforeach

                        @else
                            <p>No posts found :(</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h3>Users</h3>
                        @if($users->isNotEmpty())
                            @foreach($users as $user)
                                <div>
                                    <p>User: {{$user->first_name}} {{$user->last_name}}</p>
                                    <p></p>
                                    <div class="info">
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <p>No users found :(</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h3>Events</h3>
                        @if($events->isNotEmpty())
                            @foreach($events as $event)
                                <div>
                                    <h3>{{$event->name}}</h3>
                                    <p>{{$event->description}}</p>
                                    <p>{{$event->date}}</p>
                                    <div class="info">
                                    </div>
                                </div>

                            @endforeach

                        @else
                            <p>No events found :(</p>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </section>


    <script>
        var token = '{{ Session::token() }}';
    </script>
@endsection

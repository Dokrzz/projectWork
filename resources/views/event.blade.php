@extends('layouts.master')


@section('main')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What do you have to say?</h3>
            </header>
            <form action="{{ route('event.create') }}" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="new-post" placeholder="Your Event Name">
                    <textarea class = "form-control" name="description" id="new-post" rows="5" placeholder="Description"></textarea>
                    <textarea class = "form-control" name="network" id="new-post" rows="5" placeholder="Your Network"></textarea>
                    <input type="date" class="form-control" name="date" id="new-post">
                </div>
                <button type="submit" class="btn btn-primary">Create Event!</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>
                    What events are other mdxHub users attending...
                </h3>
            </header>
            @foreach($events as $event)
                <article class="event" data-eventid="{{$event->id}}">
                    <p>{{$event->name}}</p>
                    <p>{{$event->description}}</p>
                    <p>{{$event->date}}</p>
                    <div class="info">
                        Posted by {{ $event->user->first_name }} on {{ $event->created_at }} to <a href="#">{{$event->network}}</a> .
                    </div>
                    <div class="interaction">
{{--                    <a href="#" class="like">{{ Auth::user()->event()->where('id', $event->id)->first() ? Auth::user()->attend()->where('event_id', $event->id)->first()->attend == 1 ? 'You\'re attending' : 'Attending?' : 'Attending'  }}</a> |*/--}}
                        <a href="#" class="edit">Edit</a> |
                        <a href="{{ route('event.delete', ['event_id' => $event->id])  }}">Delete</a>
                    </div>
                </article>
            @endforeach

        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Event</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body"> Edit the post</label>
                            <input type="text" class="form-control" name="name" id="post-name" placeholder="Your Event Name">
                            <textarea class="form-control" name="post-description" id="post-description" rows="5"></textarea>
                            <input type="date" class="form-control" name="date" id="post-date">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save-event">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        var token = '{{ Session::token() }}';
        var urlEditEvent = '{{route('edit-event')}}';
    </script>
@endsection

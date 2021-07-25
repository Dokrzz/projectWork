@extends('layouts.master')

@section('title')
    Post
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <p>{{$post->body}}</p>
        </div>
        <div class="row">
            <form method="post" action="">
                <textarea name="body" class="form-control" cols="8" rows="4"></textarea>
                <button type="submit">Comment</button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.master')


@section('main')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What do you have to say?</h3>
            </header>
            <form action="">
                <div class="form-group">
                    <label for="new-post"></label>
                    <textarea class = "form-control" name="new-post" id="new-post" rows="5" placeholder="Your Post..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post!</button>
            </form>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>
                    What others mdxHub users are saying...
                </h3>
            </header>
            <article class="post">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus nunc non consectetur convallis.
                    Curabitur a scelerisque quam. Proin in auctor massa, quis finibus quam.
                    Pellentesque scelerisque efficitur auctor.
                </p>
                <div class="info">
                    Posted by Max on 12 Feb 016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#"> Comment</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus nunc non consectetur convallis.
                    Curabitur a scelerisque quam. Proin in auctor massa, quis finibus quam.
                    Pellentesque scelerisque efficitur auctor.
                </p>
                <div class="info">
                    Posted by Max on 12 Feb 016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#"> Comment</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
@endsection

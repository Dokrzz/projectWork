@extends('layouts.master')

@section('title')
    Welcome!

@endsection

@section('main')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign in</h3>
            <form action=" {{ route('signinadmin') }}" method="post">
                <div class="form-group" {{ $errors->has('email') ? 'is-invalid' : ''}}>
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>

                <div class="form-group" {{ $errors->has('password') ? 'is-invalid' : ''}}>
                    <label for="password"> Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <button  type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('title')
    Welcome!

@endsection

@section('main')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign up</h3>
            <form action= "{{ route('signup') }}" method="post">
                <div class="form-group" {{ $errors->has('email') ? 'is-invalid' : ""}}>
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>

                <div class="form-group" {{ $errors->has('first_name') ? 'is-invalid' : ''}}>
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                </div>

                <div class="form-group" {{ $errors->has('last_name') ? 'is-invalid' : ''}}>
                    <label for="last_name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ Request::old('last_name') }}">
                </div>

                <div class="form-group" {{ $errors->has('course') ? 'is-invalid' : ''}}>
                    <label for="course">Course</label>
                    <input class="form-control" type="text" name="course" id="course" value="{{ Request::old('course') }}">
                </div>

                <div class="form-group" {{ $errors->has('password') ? 'is-invalid' : ''}}>
                    <label for="password"> Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <button  type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign in</h3>
            <form action=" {{ route('signin') }}" method="post">
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
@endsection

@extends('layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>New User Registration</h2>
                <form method="post" action="/register">
                    @csrf
                    <div class="form-group">
                        <label for="nameExample">Name</label>
                        <input name="name" type="text" class="form-control" id="nameExample" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp"
                               placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                               placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input name="password_confirmation" type="password" class="form-control"
                               id="password_confirmation" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @include('layouts.errors')

            </div>
        </div>
    </div>
@endsection

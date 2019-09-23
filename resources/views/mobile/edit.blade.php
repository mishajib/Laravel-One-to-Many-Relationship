@extends('layouts.app')

@section('site-title', 'One to Many RelationShip')


@section('header-title', 'ONE TO MANY RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Insert Data</h3>
            <a href="{{ route('mobile.index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('mobile.update', $mobile->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="number" class="form-control" id="number" value="{{ $mobile->number }}" placeholder="Number">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user" class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                        <select name="user" id="user" class="custom-select my-1 mr-sm-2">
                            <option selected disabled>Choose...</option>
                                @forelse($users as $user)
                                    <option {{ $mobile->user_id == $user->id ? 'selected':'' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option disabled>No data found!!</option>
                                @endforelse
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <form/>
        </div>
    </div>
@endsection

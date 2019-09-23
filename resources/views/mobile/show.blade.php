@extends('layouts.app')

@section('site-title', 'One to Many RelationShip')


@section('header-title', 'ONE TO MANY RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Show Data</h3>
            <a href="{{ route('mobile.index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            <h1>Number: {{ $mobile->number }}</h1>
            <h3>User: {{ $mobile->user->name }}</h3>
            <a href="{{ route('mobile.edit', $mobile->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection

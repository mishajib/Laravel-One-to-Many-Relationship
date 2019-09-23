@extends('layouts.app')

@section('site-title', 'One to Many RelationShip')


@section('header-title', 'ONE TO MANY RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Show Data</h3>
            <a href="{{ route('index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            @if (!empty($user))
                <h1>Name: {{ $user->name }}</h1>
            @else
                <h1>Name: No data found!</h1>
            @endif

            <h3>Numbers:</h3>
            @forelse($user->mobiles as $number)
                <ul>
                    <li>{{ $number->number }}</li>
                </ul>
            @empty
                <h3>Numbers: No data found!</h3>
            @endforelse

            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection

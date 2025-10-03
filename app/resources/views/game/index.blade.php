@extends('layout')

@section('title', 'Game')

@section('content')
    <div class="container" style="max-width: 540px">
        <h1>{{ __('Welcome, :username', ['username' => auth()->user()->username]) }}</h1>

        <hr>

        <form action="{{ route('game.regenerate', ['token' => request()->route('token')]) }}" method="POST">
            @csrf

            <button class="btn btn-primary w-100">Regenerate link</button>
        </form>

        <form
            action="{{ route('game.deactivate', ['token' => request()->route('token')]) }}"
            method="POST"
            class="mt-2"
            onsubmit="return confirm('{{ __("Are you sure?") }}');"
        >
            @csrf

            <button class="btn btn-danger w-100">Deactivate link</button>
        </form>

        <hr>
        <button class="btn btn-success">I’m feeling lucky</button>
        <button class="btn btn-primary">History</button>

    </div>
@endsection

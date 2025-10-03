@extends('layout')

@section('title', 'Game')

@section('content')
    <div class="container" style="max-width: 540px">
        <h1>{{ __('Welcome, :username', ['username' => auth()->user()->username]) }}</h1>

        <hr>

        <form action="{{ route('game.regenerate', ['token' => request()->route('token')]) }}" method="POST">
            @csrf

            <button class="btn btn-primary w-100" type="submit">{{ __('Regenerate link') }}</button>
        </form>

        <form
            action="{{ route('game.deactivate', ['token' => request()->route('token')]) }}"
            method="POST"
            class="mt-2"
            onsubmit="return confirm('{{ __("Are you sure?") }}');"
        >
            @csrf

            <button class="btn btn-danger w-100" type="submit">{{ __('Deactivate link') }}</button>
        </form>

        <hr>

        <form action="{{ route('game.play', ['token' => request()->route('token')]) }}" method="POST">
            @csrf

            <button class="btn btn-success w-100" type="submit">{{ __('I’m feeling lucky') }}</button>
        </form>

        <form action="{{ route('game.history', ['token' => request()->route('token')]) }}" method="POST" class="mt-2">
            @csrf

            <button class="btn btn-primary w-100" type="submit">{{ __('History') }}</button>
        </form>

        @if($gameResult = session('gameResult'))
            @include('game.result-item', ['gameResult' => $gameResult])
        @endif

        @if($gameResults = session('gameResults'))
            @foreach($gameResults as $gameResult)
                @include('game.result-item', ['gameResult' => $gameResult])
            @endforeach
        @endif

    </div>
@endsection

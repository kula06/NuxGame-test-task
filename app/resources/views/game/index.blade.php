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

        <button class="btn btn-primary mt-2">{{ __('History') }}</button>

        @if($gameResult = session('gameResult'))
            <div class="mt-2 alert alert-{{ $gameResult->is_win ? 'success' : 'danger' }}">
                <p>{{ __('Number: :number', ['number' => $gameResult->number]) }}</p>
                <p>{{ __('Result: :is_win', ['is_win' => $gameResult->is_win ? __('Win') : __('Lose')]) }}</p>
                <p>{{ __('Win Amount: :win_amount', ['win_amount' => $gameResult->win_amount]) }}</p>
            </div>
        @endif

    </div>
@endsection

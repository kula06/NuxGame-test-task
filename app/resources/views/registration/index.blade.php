@extends('layout')

@section('title', 'Registration')

@section('content')
    <div class="container" style="max-width: 540px">
        <h1 class="mb-4">{{ __('Welcome') }}</h1>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">{{ __('Username') }}</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror"
                    required
                    autofocus
                >
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">{{ __('Phone number') }}</label>
                <input
                    type="text"
                    id="phone_number"
                    name="phone_number"
                    value="{{ old('phone_number') }}"
                    class="form-control @error('phone_number') is-invalid @enderror"
                    required
                >
                @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                {{ __('Register') }}
            </button>
        </form>
    </div>
@endsection

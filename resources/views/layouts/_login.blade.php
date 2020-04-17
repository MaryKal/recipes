<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-item">
        <label for="username" class="col-12 ">{{ __('E-mail or Phone:') }}</label>

        <div class="col-12">
            <input id="username" type="username" class="col-12 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-item">
        <label for="password" class="col-12 ">{{ __('Password') }}</label>

        <div class="col-12">
            <input id="password" type="password" class="col-12 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-item">
        <div class="col-12 ">
            <div class=" row">
                <input class="col-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="col-10 btn-link" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-item row mb-0">
        <div class="col-12 ">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</form>
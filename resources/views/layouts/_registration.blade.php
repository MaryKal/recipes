<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-item row">
        <label for="name" class="col-12 ">{{ __('Name') }}</label>

        <div class="col-12">
            <input id="name" type="text" class="col-12 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-item row">
        <label for="email" class="col-12 ">{{ __('E-Mail Address') }}</label>

        <div class="col-12">
            <input id="email" type="email" class="col-12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- <div class="form-item row">
        <label for="phone" class="col-12 ">{{ __('Phone') }}</label>

        <div class="col-12">
            <input id="phone" type="phone" class="col-12 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div> -->

    <div class="form-item row">
        <label for="password" class="col-12 ">{{ __('Password') }}</label>

        <div class="col-12">
            <input id="password" type="password" class="col-12 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-item row">
        <label for="password-confirm" class="col-12 ">{{ __('Confirm Password') }}</label>

        <div class="col-12">
            <input id="password-confirm" type="password" class="col-12" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-item row mb-0">
        <div class="col-12 ">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
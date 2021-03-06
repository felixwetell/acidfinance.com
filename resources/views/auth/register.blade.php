@extends( 'layouts.app' )
@section( 'title', 'Register' )
@section( 'content' )

    <div class="text-center">
        <a class="dark-link" href="{{ route( 'login' ) }}">
            Already a user? Login here
        </a>
    </div>
    <br>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label class="text-muted" for="username" class="">Username</label>
                <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" required autofocus>

                @if( $errors->has( 'username' ) )
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label class="text-muted" for="email" class="">E-Mail Address</label>
                <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label class="text-muted" for="password" class="">Password</label>
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label class="text-muted" for="password-confirm" class="">Confirm Password</label>
                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-lg-8 offset-lg-2">
                <p>By registering you accept the <a href="{{ route( 'privacy' ) }}">privacy policy</a>.</p>
                <button type="submit" class="btn btn-primary ml-0">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>

@endsection

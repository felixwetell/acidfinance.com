@extends( 'layouts.app' )
@section( 'title', 'Profile' )
@section( 'content' )
@auth

    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#username" id="username-tab" data-toggle="tab" role="tab" aria-controls="username" aria-selected="true">Username</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#email" id="email-tab" data-toggle="tab" role="tab" aria-controls="email" aria-selected="true">Email</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#password" id="password-tab" data-toggle="tab" role="tab" aria-controls="password" aria-selected="true">Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#settings" id="settings-tab" data-toggle="tab" role="tab" aria-controls="settings" aria-selected="true">Settings</a>
        </li>
    </ul>
    <br>
    <div class="tab-content">
        <div class="tab-pane show active" id="username" role="tabpanel" aria-labelledby="username-tab">
            <h4 class="text-center">Change username</h4>
            <form method="post" action="{{ 'user.' . Auth::user()->id }}" id="changeUsername">
                @csrf
                {{ method_field( 'update' ) }}

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="username" class="">Username</label>
                        <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has( 'username' ) ? ' is-invalid' : '' }}" name="username" value="{{ Auth::user()->username }}" autofocus>

                        @if( $errors->has( 'username' ) )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'username' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <div class="text-center">
                <h4>Change e-mail address</h4>
                <p>
                    Password is required to change the email to your profile
                </p>
            </div>
            <form method="post" action="{{ 'user.' . Auth::user()->id }}" id="changeEmail">
                @csrf
                {{ method_field( 'update' ) }}

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="email" class="">E-Mail Address</label>
                        <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has( 'email' ) ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                        @if ($errors->has( 'email' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'email' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="emailPassword" class="">Password</label>
                        <input id="emailPassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has( 'emailPassword' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'emailPassword' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            <div class="text-center">
                <h4 class="text-center">Change password</h4>
                <p class="text-center">
                    To change password you must first enter your old password, then type in the new,
                    and confirm the new password
                </p>
            </div>
            <form method="post" action="{{ 'user.' . Auth::user()->id }}" id="changePassword">
                @csrf
                {{ method_field( 'update' ) }}

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="oldPassword" class="">Current Password</label>
                        <input id="oldPassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has( 'oldPassword' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'oldPassword' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="password" class="">New Password</label>
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has( 'password' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="confirmPassword" class="">Confirm Password</label>
                        <input id="confirmPassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has( 'confirmPassword' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'confirmPassword' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <div class="text-center">
                <h4>Settings</h4>
                <p>Other settings to handle your account</p>
            </div>
            <hr>
            <form method="post" action="{{ 'user.' . Auth::user()->id }}" id="deleteUser">
                {{ method_field( 'delete' ) }}

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <p>To delete the profile you must enter your password</p>
                        <label class="text-muted" for="deletePassword" class="">Password</label>
                        <input id="deletePassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has( 'deletePassword' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'deletePassword' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-danger ml-0">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endauth
@endsection

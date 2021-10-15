@extends('layouts.app')

@section('content')
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ url('login') }}">
                    @csrf

                    <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                    <span class="login100-form-title p-b-34 p-t-27">
						{{ __('Login') }}
										</span>

                    <div class="wrap-input100 validate-input" data-validate="Enter email">
                        <input id="email" type="email" placeholder="Email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
                        <span class="invalid-feedback" role="alert">
							  <strong>{{ $message }}</strong>
						  </span> @enderror
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input id="password" type="password" placeholder="Password" class="input100 form-control @error('password')  is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
                        <span class="invalid-feedback" role="alert">
							  <strong>{{ $message }}</strong>
						  </span> @enderror
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="form-check-input input-checkbox100" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                        <label class="label-checkbox100" for="remember">
							{{ __('Remember Me') }}
						</label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
							{{ __('Login') }}

						</button>
                    </div>
                    @if (Route::has('password.request'))

                    <div class="text-center p-t-90">
                        <a class="txt1" href="{{ route('password.request') }}">
							{{ __('Forgot Your Password?') }}
						</a>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>









@endsection

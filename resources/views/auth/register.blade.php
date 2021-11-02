@extends('layouts.app')

@section('content')
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ url('register') }}">
                    @csrf

                    <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                    <span class="login100-form-title p-b-34 p-t-27">
						{{ __('Register') }}
										</span>

                    <div class="wrap-input100 validate-input" data-validate="Enter name">
                        <input id="name" type="text" placeholder="Name" class="input100 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
							  <strong>{{ $message }}</strong>
						  </span> @enderror
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>


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

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                                <input id="password-confirm" type="password" class="input100 form-control" placeholder="{{ __('Confirm Password') }}" name="confirm_password" required autocomplete="new-password">
                        </div>



                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
							{{ __('Register') }}

						</button>
                    </div>


                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>









@endsection

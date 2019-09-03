@extends('admin.layouts.login')

@section('content')
<div class="content d-flex justify-content-center align-items-center">
    <form method="POST" action="{{ route('login') }}" class="login-form">
		@csrf
		<div class="card mb-0">
			<div class="card-body">
				<div class="text-center mb-3">
					<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
					<h5 class="mb-0">{{ __('Login to your account') }}</h5>
					<span class="d-block text-muted">{{ __('Your credentials') }}</span>
				</div>
				<div class="form-group form-group-feedback form-group-feedback-left">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
					<div class="form-control-feedback"><i class="icon-user text-muted"></i></div>
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group form-group-feedback form-group-feedback-left">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
					<div class="form-control-feedback"><i class="icon-lock2 text-muted"></i></div>
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group d-flex align-items-center">
					<div class="form-check mb-0">
						<label class="form-check-label">
							<input class="form-check-input form-input-styled" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} data-fouc>										
							{{ __('Remember') }}
						</label>
					</div>
					@if (Route::has('password.request'))
						<a class="btn btn-link ml-auto" href="{{ route('password.request') }}">
							{{ __('Forgot Your Password?') }}
						</a>
					@endif
				</div>
				<div class="form-group">
					<div class="form-group">
						<button type="submit" class="btn bg-teal-400 btn-primary btn-block">
							{{ __('Login') }} <i class="icon-circle-right2 ml-2"></i>
						</button>
					</div>							
				</div>
			</div>
		</div>
    </form>
</div>        
@endsection

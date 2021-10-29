@extends('layouts.template')

@section('content')


	<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>{{ __('Login') }}</p>

					<form method="POST" action="{{ route('login') }}">
                        @csrf

                            <div class="form-group text-left">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            </div>
                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-group text-left">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                             </div>
							 <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                             </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <div class="form-group">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                     
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                               </div>
                              <div class="form-group">
								<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
                                      <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                     </button>
	                            </div>
							  </div>
							  </div>
                                @if (Route::has('password.request'))
								<div class="form-group">
								  <div class="row">
									<div class="col-lg-12">
									 <div class="text-center">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
									</div>
									</div>
								   </div>
								</div>
                                @endif
                             </form>
					
								
							</div>
						</div>

						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

@endsection

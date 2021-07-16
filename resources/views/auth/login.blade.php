<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>EMR - Dashboard</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
	
		<!-- Main Wrapper -->
		<div class="main-wrapper login-body">
			<div class="login-wrapper">
				<div class="container">
				
					<img class="img-fluid logo-dark mb-2" src="assets/img/logo.png" alt="Logo">
					<div class="loginbox">
						
						<div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to dashboard</p>
								
								<form method="POST" action="{{ route('login') }}">
                                    @csrf
									<div class="form-group">
										<label class="form-control-label">Email Address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>

									<div class="form-group">
										<label class="form-control-label">Password</label>
										<div class="pass-group">											
                                            <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <span class="fas fa-eye toggle-password"></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" id="cb1">
													<label class="custom-control-label" for="remember">Remember me</label>
												</div>
											</div>
											<div class="col-6 text-right">
                                                @if (Route::has('password.request'))
                                                    <a class="forgot-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Password?') }}
                                                    </a>
                                                @endif
											</div>
										</div>
									</div>
									<button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>
									<div class="login-or">
										<span class="or-line"></span>
										<span class="span-or">or</span>
									</div>
									<!-- Social Login -->
									<div class="social-login mb-3">
										<span>Login with</span>
										<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
									</div>
									<!-- /Social Login -->
                                    @if (Route::has('register'))
                                        <div class="text-center dont-have">Don't have an account yet? <a href="{{ route('register') }}">Register</a></div>
                                    @endif
									
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="assets/js/jquery-3.6.0.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

	</body>
</html>
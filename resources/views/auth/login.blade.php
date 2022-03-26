<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>SFICMS - Login</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/sfi-favicon.png') }}">
		
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
				
					
					<div class="loginbox">
						
						<div class="login-right">
							<div class="login-right-wrap">
								<img class="img-fluid logo-dark mb-2" height="60" width="60" src="{{ asset('assets/img/cms-logo.png') }}" alt="Logo">
								{{-- <h1>Login</h1> --}}
								<p class="account-subtitle">Portal Access</p>
								
								<form method="POST" action="{{ route('login') }}">
                                    @csrf
									<div class="form-group">
										<label class="form-control-label">Email Address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>

									<div class="form-group">
										<label class="form-control-label">Password</label>
										<div class="pass-group">											
                                            <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                                            <span class="fas fa-eye toggle-password" onclick="revealPassFunction()"></span>
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
													<label class="custom-control-label pt-1" for="remember">Remember me</label>
												</div>
											</div>
											
										</div>
									</div>
									<button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>
									<div class="login-or">
										<span class="or-line"> <a href="#">Forgot Password?</a> </span>
										<span class="span-or"><i class="fas fa-heart"></i></span>
									</div>
                                    @if (Route::has('register'))
                                        <div class="text-center dont-have">Developed by <a href="#">Jemman & Associates</a></div>
                                    @endif
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
		<script>
			function revealPassFunction() {
			  var x = document.getElementById("password");
			  if (x.type === "password") {
				x.type = "text";
			  } else {
				x.type = "password";
			  }
			}
		</script>
		<!-- jQuery -->
		<script src="assets/js/jquery-3.6.0.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>CMS - Unauthorized Page</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel=" stylesheet" href="{{ asset('assets/css/style.css') }}">
	</head>
    <body class="error-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<div class="error-box">
				<h1>404</h1>
				<h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i> Oops! Unauthorized Access!</h3>
				<p class="h4 font-weight-normal">Hi {{ Auth::user()->name }}, You do not have the permission to view the page you requested.</p>
				<a href="/" class="btn btn-primary">Back to Home</a>
			</div>
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('assets/js/script.js') }}"></script>

	</body>
</html>
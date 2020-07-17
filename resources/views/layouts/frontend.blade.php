<!DOCTYPE html>
<html lang="ind">
	<head>
		<!-- Meta Tag -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name='copyright' content='pavilan'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title Tag  -->
		<title>Aplikasi Point Pelanggaran Siswa</title>
		
		<!-- Favicon -->
		<link rel="icon" type="image/favicon.png" href="{{asset('front/img/favicon.png')}}">
		
		<!-- Web Font -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		
		<!-- Bizwheel Plugins CSS -->
		<link rel="stylesheet" href="{{asset('front/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/cubeportfolio.min.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/font-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.min.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/magnific-popup.min.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/owl-carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/slicknav.min.css')}}">

		<!-- Bizwheel Stylesheet -->  
		<link rel="stylesheet" href="{{asset('front/css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('front/style.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
		<script src="{{asset('front/js/jquery.min.js')}}"></script>
		<script src="{{asset('front/js/jquery-migrate-3.0.0.js')}}"></script>
		
	</head>
	<body id="bg">
	
		<!-- Boxed Layout -->
		<div id="page" class="site boxed-layout"> 
		
		<!-- Preloader -->
		<div class="preeloader">
			<div class="preloader-spinner"></div>
		</div>
		<!--/ End Preloader -->
	
		<!-- Header -->
		<header class="header">
			
			<!-- Middle Header -->
			<div class="middle-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="middle-inner">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-12">
										<!-- Logo -->
										<div class="logo">
											<!-- Image Logo -->
											<div class="img-logo">
												<a href="#">
													<img src="{{asset('front/img/logo_smk.png')}}"  alt="#">
												</a>
											</div>
										</div>								
										<div class="mobile-nav"></div>
									</div>
									<div class="col-lg-10 col-md-9 col-12">
										<div class="menu-area">
											<!-- Main Menu -->
											<nav class="navbar navbar-expand-lg">
												<div class="navbar-collapse">	
													<div class="nav-inner">	
														<div class="menu-home-menu-container">
															<!-- Naviagiton -->
															<ul id="nav" class="nav main-menu menu navbar-nav">
																<li><a href="{{route('home')}}">Home</a></li>
																<li><a href="{{route('profil')}}">Profil Sekolah</a></li>
																<li><a href="{{route('visi-misi')}}">Visi dan Misi</a></li>
																<li><a href="{{route('gedung')}}">Kondisi Gedung</a></li>
																<li class="icon-active"><a href="#">Jurusan</a>
																	<ul class="sub-menu">
																		<li><a href="blog.html">Blog Grid</a></li>
																		<li><a href="blog-single.html">Blog Single</a></li>
																	</ul>
																</li>
																@auth
																 @if(Auth::user()->level=='admin')
																<li ><a href="{{route('admin')}}" >Profil</a></li>
																 @elseif(Auth::user()->level=='guru')
																<li ><a href="{{route('guru')}}" >Profil</a></li>
																@else
																<li ><a href="{{route('siswa')}}" >Profil</a></li>
																@endif
																

																<li ><a class="" href="{{ route('logout') }}"
														               onclick="event.preventDefault();
														                             document.getElementById('logout-form').submit();">
														                {{ __('Logout') }}
														            </a>

														            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														                @csrf
														            </form></li>

																@else
																<li ><a href="{{route('login')}}" >Login</a>
																@endif
																
															</ul>
															<!--/ End Naviagiton -->
														</div>
													</div>
												</div>
											</nav>
											<!--/ End Main Menu -->	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Middle Header -->
		</header>
		<!--/ End Header -->
		
		  @yield('content')
		
		
		<!-- Footer -->
		<footer class="footer" style="background-image:url('{{asset('front/img/map.png')}}')">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<!-- Footer About -->		
							<div class="single-widget footer-about widget">	
								<div class="logo">
									<div class="img-logo">
										<a class="logo" href="index.html">
											<img class="img-responsive" src="{{asset('front/img/logo_smk2.png')}}" alt="logo">
										</a>
									</div>
								</div>
								<div class="footer-widget-about-description">
									<p>SMK SEKAR BUMI NUSANTARA Menciptakan Sumber Daya Manusia yang Terampil, Kreatif, Inovatif, Menguasai IPTEK yang Memiliki IMTAQ, Siap Kerja dan Berkarya </p>
								</div>	
								<div class="social">
									<!-- Social Icons -->
									<ul class="social-icons">
										<li><a class="facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a class="instagram" href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
								
							</div>		
							<!--/ End Footer About -->		
						</div>
					
					
						<div class="col-lg-6 col-md-6 col-12">	
							<!-- Footer Contact -->		
							<div class="single-widget footer_contact widget">	
								<h3 class="widget-title">Alamat <br><b>SMK SEKAR BUMI NUSANTARA</b></h3>
								
								<ul class="address-widget-list">
									<li class="footer-mobile-number"><i class="fa fa-phone"></i>082322587817 </li>
									<li class="footer-mobile-number"><i class="fa fa-envelope"></i>smk.sbn@gmail.com</li>
									<li class="footer-mobile-number"><i class="fa fa-map-marker"></i>Jl. Plelen – Ketanggan KM 2 Ds. Sawangan Kec. Gringsing Kab. Batang 51281 </li>
								</ul>
							</div>		
							<!--/ End Footer Contact -->						
						</div>
					</div>
					
				</div>
			</div>
		<script type="text/javascript">
			

		</script>


			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="copyright-content">
								<!-- Copyright Text -->
								<p>© Copyright <a href="#"> Ahmad </a> Khoirul   Abid</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		
		<!-- Jquery JS -->
		
		<!-- Popper JS -->
		<script src="{{asset('front/js/popper.min.js')}}"></script>
		<!-- Bootstrap JS -->
		<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
		<!-- Modernizr JS -->
		<script src="{{asset('front/js/modernizr.min.js')}}"></script>
		<!-- ScrollUp JS -->
		<script src="{{asset('front/js/scrollup.js')}}"></script>
		<!-- FacnyBox JS -->
		<script src="{{asset('front/js/jquery-fancybox.min.js')}}"></script>
		<!-- Cube Portfolio JS -->
		<script src="{{asset('front/js/cubeportfolio.min.js')}}"></script>
		<!-- Slick Nav JS -->
		<script src="{{asset('front/js/slicknav.min.js')}}"></script>
		<!-- Slick Nav JS -->
		<script src="{{asset('front/js/slicknav.min.js')}}"></script>
		<!-- Slick Slider JS -->
		<script src="{{asset('front/js/owl-carousel.min.js')}}"></script>
		<!-- Easing JS -->
		<script src="{{asset('front/js/easing.js')}}"></script>
		<!-- Magnipic Popup JS -->
		<script src="{{asset('front/js/magnific-popup.min.js')}}"></script>
		<!-- Active JS -->
		<script src="{{asset('front/js/active.js')}}"></script>
		
	</body>
</html>
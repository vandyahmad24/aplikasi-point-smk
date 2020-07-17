@extends('layouts.frontend')

@section('content')
	<!-- Hero Slider -->
		<section class="hero-slider style1">
			<div class="home-slider">
				<!-- Single Slider -->
				<div class="single-slider" style="background-image:url('{{asset('upload/slide/slide1.jpg')}}')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-8 col-12">
								<div class="welcome-text"> 
									<div class="hero-text"> 
										<h4>SMK SEKAR BUMI NUSANTARA GRINGSING</h4>
										<br>

										<span class="badge badge-pill badge-primary"><h3 class="text-white"> Kegiatan Upacara</h3></span>
										
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Single Slider -->
				<div class="single-slider" style="background-image:url('{{asset('upload/slide/slide2.jpg')}}')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-8 col-12">
								<div class="welcome-text"> 
									<div class="hero-text"> 
										<h4>SMK SEKAR BUMI NUSANTARA GRINGSING</h4>
										<br>
										<span class="badge badge-pill badge-primary"><h5 class="text-white"> Kegiatan Praktek Siswa</h5></span>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Single Slider -->
			</div>
		</section>
		<!--/ End Hero Slider -->
		
		<!-- Features Area -->
		<section class="features-area section-bg">
			<div class="container">
				<div class="row">
					<h1 class="text-center">Aplikasi Pelanggaran Siswa</h1>
				</div>
				<div class="row">

					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">Efisiensi </a></h4>
							<p>Mempermudah guru untuk mencatat point pelanggaran siswa</p>
							
						</div>
						<!--/ End Single Feature -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">Efisiensi </a></h4>
							<p>Mempermudah guru untuk mencatat point pelanggaran siswa</p>
							
						</div>
						<!--/ End Single Feature -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">Efisiensi </a></h4>
							<p>Mempermudah guru untuk mencatat point pelanggaran siswa</p>
							
						</div>
						<!--/ End Single Feature -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">Efisiensi </a></h4>
							<p>Mempermudah guru untuk mencatat point pelanggaran siswa</p>
							
						</div>
						<!--/ End Single Feature -->
					</div>
					
				</div>
			</div>
		</section>
		<!--/ End Features Area -->
		
		<!-- Portfolio -->
		<section class="portfolio section-space">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
						<div class="section-title default text-center">
							<div class="section-top">
								<h1><b>Foto Kegiatan</b></h1>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="portfolio-main">
							<div id="portfolio-item" class="portfolio-item-active">
								<div class="cbp-item business animation">
									<!-- Single Portfolio -->
									<div class="single-portfolio">
										<div class="portfolio-head overlay">
											<img src="https://via.placeholder.com/600x415" alt="#"></a>
										</div>
										<div class="portfolio-content">
											<h4><a href="">Nama Kegiatan </a></h4>
										</div>
									</div>
									<!--/ End Single Portfolio -->
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Portfolio -->

@endsection
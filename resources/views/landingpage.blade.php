<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SIGERES / Landing Page</title>
    <link href="#" rel="stylesheet" />
    <link href="{{ asset('539/css/all.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('539/css/templatemo-style.css') }}" rel="stylesheet" />
</head>

<body> 

	
				

		<div class="placeholder">
			
			<div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('539/img/simple-house-01.jpg') }}">

				<div class="tm-header">

					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="{{ asset('539/img/simple-house-logo.png') }}" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">SIGERES</h1>
								<h6 class="tm-site-description">sistema de gestão de restaurantes</h6>	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<!-- <ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="{{ route('dashboard.index') }}" class="tm-btn tm-btn-danger">Dashboard</a></li>	
							</ul> --> 

							<!-- Botões Login e Register -->
							<div class="top-right-buttons">

    					<a href="/login" class="login-btn">Login</a>
						<a href="/register" class="register-btn">Register</a>
							</div>

						<style>
   							 .top-right-buttons {
        						position: fixed;
        						top: 20px;
								right: 25px;
								display: flex;
								gap: 10px;
								z-index: 9999;
							}

							.top-right-buttons a {
								text-decoration: none;
								color: white;
								padding: 10px 20px;
								border-radius: 5px;
								font-size: 15px;
								font-weight: bold;
								transition: 0.3s;
							}

								/* Botão Login */
								.login-btn {
									background-color: #28a745;
								}

								.login-btn:hover {
									background-color: #218838;
								}

								/* Botão Register */
								.register-btn {
									background-color: #007bff;
								}

								.register-btn:hover {
									background-color: #0056b3;
								}
							</style>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Bem-vindo!</h2>
				<p class="col-12 text-center">Sistema de gestão de restaurantes.  bem-vindo!</p>
			</header>

			<div class="tm-container-inner tm-persons">
				<div class="row">
					<article class="col-lg-6">
						<figure class="tm-person">
							<img src="{{ asset('539/img/about-01.jpg') }}" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Jennifer Soft</h4>
								<p class="tm-person-title">Founder and CEO</p>
								<p class="tm-person-about">Vivamus cursus leo nec sem feugiat sagittis.
								Duis ut feugiat odio, sit amet accumsan
								odio.</p>
								<div>
									<a href="#" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
									<a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-6">
						<figure class="tm-person">
                        <img src="{{ asset('539/img/about-02.jpg') }}" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Daisy Walker</h4>
								<p class="tm-person-title">Executive Chef</p>
								<p class="tm-person-about">Praesent non vulputate elit. Orci varius
								natoque et magnis dis parturient, nascetur ridiculus mus.</p>
								<div>
									<a href="#" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-6">
						<figure class="tm-person">
                        <img src="{{ asset('539/img/about-03.jpg') }}" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Florence Nelson</h4>
								<p class="tm-person-title">Kitchen Manager</p>
								<p class="tm-person-about">Aenean sapien sem, ultricies sed vulputate
								et, auctor vel mauris. Integer sit amet diam eget est facilisis lacinia vitae.</p>
								<div>
									<a href="#" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-6">
						<figure class="tm-person">
							<img src="{{ asset('539/img/about-04.jpg') }}" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Valentina Martin</h4>
								<p class="tm-person-title">Culinary Director</p>
								<p class="tm-person-about">Praesent non vulputate elit. Orci varius
								natoque penatibus et magnis montes, nascetur ridiculus mus.</p>
								<div>
									<a href="#" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
									<a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
									<a href="#" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
				</div>
			</div>
			<div class="tm-container-inner tm-featured-image">
				<div class="row">
					<div class="col-12">
						<div class="placeholder-2">
							<div class="parallax-window-2" data-parallax="scroll" data-image-src="{{ asset('539/img/about-05.jpg') }}"></div>		
						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner tm-features">
				<div class="row">
					<div class="col-lg-4">
						<div class="tm-feature">
							<i class="fab fa-4x fa-cc-visa tm-feature-icon"></i>
							<p class="tm-feature-description">Podes fazer os teus pagamentos com Visa.</p>
							<a href="#" class="tm-btn tm-btn-primary" style="background-color: #1a1f71; border-color: #1a1f71; color: #ffffff;">Pagar</a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="tm-feature">
							<img src="{{ asset('539/img/E-mola.png') }}" class="tm-feature-icon" style="width: 64px; height: auto;">
							<p class="tm-feature-description">Podes fazer os teus pagamentos com  E-Mola.</p>
							<a href="#" class="tm-btn tm-btn-primary" style="background-color: #eb930f; border-color: #de7710; color: #ffffff;">Pagar</a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="tm-feature">
							<img src="{{ asset('539/img/M-PESA_LOGO-01.svg.webp') }}" class="tm-feature-icon" style="width: 100px; height: auto;">
							<p class="tm-feature-description">Podes fazer os teus pagamentos com  M-Pesa.</p>
							<a href="#" class="tm-btn tm-btn-primary" style="background-color: #00b050; border-color: #00b050; color: #ffffff;">Pagar</a>
						</div>
					</div>
				</div>
			</div>

			<div class="tm-container-inner-2 tm-info-section">
				<div class="row">
					<!-- FAQ -->
					<div class="col-12 tm-faq">
						<h2 class="text-center tm-section-title">FAQs</h2>
						<p class="text-center">This section comes with Accordion tabs for different questions and answers about Simple House HTML CSS template. Thank you. #666</p>
						<div class="tm-accordion">
							<button class="accordion">1. Fusce eu lorem et dui #09C maximus varius?</button>
							<div class="panel">
							  <p>#666 Duis blandit purus vel nenenatis rutrum. Pellentesque pellentesque tindicunt lorem, ac egestas massa sollicitudin vel. Nam scelerisque vulputate quam mollis pretium. Morbi condimentum volutpat.</p>
							</div>
							
							<button class="accordion">2. Vestibulum #999 ante ipsum primis in faucibus orci?</button>
							<div class="panel">
							  <p>Mauris euismod odio at commodo rhoncus. Maecenas nec interdum purus, sed auctor est. Sed eleifend urna nec diam consectetur, a aliquet turpis facilisis. Integer est sapien, sagittis vel massa vel, interdum euismod erat. Aenean sollicitudin nisi neque, efficitur posuere urna rutrum porta.</p>
							</div>
							
							<button class="accordion">3. Can I redistribute this template as a ZIP file?</button>
							<div class="panel">
							  <p>Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a href="https://templatemo.com/contact">contact TemplateMo</a> for additional permissions about our templates. Thank you.</p>
							</div>
							
							<button class="accordion">4. Ut ac erat sit amet neque efficitur faucibus et in lectus?</button>
							<div class="panel">
								<p>Vivamus viverra pretium ultricies. Praesent feugiat, sapien vitae blandit efficitur, sem nulla venenatis nunc, vel maximus ligula sem a sem. Pellentesque ligula ex, facilisis ac libero a, blandit ullamcorper enim.</p>
							</div>
						</div>	
					</div>
				</div>
			</div>

            <header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Contact Page</h2>
				<p class="col-12 text-center">You may use <a rel="nofollow" href="https://www.ltcclock.com/downloads/simple-contact-form/" target="_blank">Simple Contact Form</a> to send email to your inbox. You can modify and use this template for your website. Header image has a parallax effect. Total 3 HTML pages included in this template.</p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="name" class="form-control" placeholder="Name" required="" />
					        </div>
					        
					        <div class="form-group">
					          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
					        </div>
				
					        <div class="form-group">
					          <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
					            Send
					          </button>
					        </div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Our Address</h4>
							<address>
								180 Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus 10550
							</address>
							<a href="tel:080-090-0110" class="tm-contact-link">
								<i class="fas fa-phone tm-contact-icon"></i>080-090-0110
							</a>
							<a href="mailto:info@company.co" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>info@company.co
							</a>
							<div class="tm-contact-social">
								<a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
    

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2026 SIGERES V1.0 
            
            | Design: <a rel="nofollow" href="#">Omar Barbosa</a></p>
		</footer>
	</div>
<script src="{{ asset('539/js/jquery.min.js') }}"></script>
	<script src="{{ asset('539/js/parallax.min.js') }}"></script>
</body>
</html>
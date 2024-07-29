<!DOCTYPE html>
<html>

<head>
    @livewireStyles
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>FitApp</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ url ('assets/css/bootstrap.css')}}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ url ('assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ url ('assets/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
    @livewireScripts
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{ url ('assets/images/logo.png')}}" alt="" />
            <span>
                FitApp
            </span>
          </a>
          <div class="contact_nav" id="">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="{{ url ('assets/images/location.png')}}" alt="" />
                  <span>Localização</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="{{ url ('assets/images/call.png')}}" alt="" />
                  <span>Ligue: (18) 99854-7258</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="{{ url ('assets/images/envelope.png')}}" alt="" />
                  <span>fitappcontact@gmail.com</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>


      <div class="container-fluid">
        <div class="custom_nav2">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex  flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="about.html">Sobre </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="service.html">Serviços </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact.html">Nos Contrate</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- end header section -->
    <!-- slider section   -->
    <section class=" ">
        
      <div class="container">

      <livewire:avaliacao-component/>
      
        
        
        </div>    
    </section>            
</body>               
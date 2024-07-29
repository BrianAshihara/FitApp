<!DOCTYPE html>
<html>

<head>
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
                  <span>Ligue : sla dps coloca algm número</span>
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

    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="container">
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
                    <a class="nav-link" href="{{ url('/cadastro') }}">Login</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                    <div class="detail-box">
                      <h2>
                        Get Your Body
                      </h2>
                      <h1>
                        Fitness Here
                      </h1>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Read More
                        </a>
                        <a href="" class="btn-2">
                          Get A Quote
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                    <div class="detail-box">
                      <h2>
                        Get Your Body
                      </h2>
                      <h1>
                        Fitness Here
                      </h1>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Read More
                        </a>
                        <a href="" class="btn-2">
                          Get A Quote
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                    <div class="detail-box">
                      <h2>
                        Get Your Body
                      </h2>
                      <h1>
                        Fitness Here
                      </h1>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Read More
                        </a>
                        <a href="" class="btn-2">
                          Get A Quote
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          About FitApp
        </h2>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="{{ url ('assets/images/about-img.png')}}" alt="">
        </div>
        <div class="detail-box">
          <p>
                Apaixonados por futmesa.
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Nossos Serviços
        </h2>
      </div>
      <div class="service_container">
        <div class="box">
          <img src="{{ url ('assets/images/s-1.jpg')}}" alt="">
          <h6 class="visible_heading">
            Treino
          </h6>
          <div class="link_box">
          <a href="{{ url('/treino') }}">
          <img src="{{ url ('assets/images/link.png')}}" alt="">
            </a>
            <h6>
              Personalize seu treino
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="{{ url ('assets/images/s-2.jpg')}}" alt="">
          <h6 class="visible_heading">
            Metas
          </h6>
          <div class="link_box">
            <a href="{{ url('/metas') }}">
              <img src="{{ url ('assets/images/link.png')}}" alt="">
            </a>
            <h6>
              Insira suas metas
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="{{ url ('assets/images/s-3.jpg')}}" alt="">
          <h6 class="visible_heading">
            Registro de Atividade
          </h6>
          <div class="link_box">
            <a href="{{url('/registroAtividades') }}">
              <img src="{{ url ('assets/images/link.png')}}" alt="">
            </a>
            <h6>
              Insira sua rotina
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="{{ url ('assets/images/s-4.jpg')}}" alt="">
          <h6 class="visible_heading">
            Alimentação
          </h6>
          <div class="link_box">
          <a href="{{ url('/alimentacao') }}">
              <img src="{{ url ('assets/images/link.png')}}" alt="">
            </a>
            <h6>
              Insira sua alimentação diária
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="{{ url ('assets/images/s-5.jpg')}}" alt="">
          <h6 class="visible_heading">
            Histórico Peso
          </h6>
          <div class="link_box">
            <a href="{{ url('/historicoPeso') }}">
              <img src="{{ url ('assets/images/link.png')}}" alt="">
            </a>
            <h6>
              Insira seu histórico de peso
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="{{ url ('assets/images/s-6.jpg')}}" alt="">
          <h6 class="visible_heading">
            Gordura Corporal (BF)
          </h6>
          <div class="link_box">
          <a href="{{ url('/bf') }}">
          <img src="{{ url ('assets/images/link.png')}}" alt="">
            </a>
            <h6>
              Calcule seu índice de gordura corporal (BF)
            </h6>
          </div>
        </div>
        <div class="box">
          <img src="{{ url ('assets/images/registro_sono.jpg')}}" alt="">
          <h6 class="visible_heading">
            Registro de Sono
          </h6>
          <div class="link_box">
          <a href="{{ url('/registroSono') }}">
          <img src="{{ url ('assets/images/link.png')}}" alt="">
            </a>
            <h6>
              Insira o seu registro de sono
            </h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->


  <!-- Us section -->

  <section class="us_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="us_container">
        <div class="box">
          <div class="img-box">
            <img src="{{ url ('assets/images/u-1.png')}}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              QUALITY EQUIPMENT
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ url ('assets/images/u-2.png')}}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              HEALTHY NUTRITION PLAN
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ url ('assets/images/u-3.png')}}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              SHOWER SERVICE
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ url ('assets/images/u-4.png')}}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              UNIQUE TO YOUR NEEDS
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end us section -->


  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="img-box">
                <img src="{{ url ('assets/images/client.png')}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Consectetur
                </h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img src="{{ url ('assets/images/client.png')}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Consectetur
                </h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img src="{{ url ('assets/images/client.png')}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Consectetur
                </h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end client section -->

  <!-- result section -->

  <section class="result_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="{{ url ('assets/images/Renato_Cariri.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-4 col-md-5">
          <div class="detail-box">
            <h2>
              Costrua <br>
              os melhores resultados
            </h2>
            <p>
              "Maldito homem que acredita no homem"
            </p>
            <a href="">
              Adquira já!
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end result section -->


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span>
            Get In Touch
          </span>
        </h2>
      </div>
      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-md-6 ">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name" />
                  </div>
                  <div>
                    <input type="email" placeholder="Email" />
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" />
                  </div>
                  <div class="mt-5">
                    <input type="text" placeholder="Message" />
                  </div>
                  <div class="mt-5">
                    <button type="submit">
                      Send
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="map_container">
              <div class="map-responsive">
                <iframe
                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                  width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- info section -->

  <section class="info_section layout_padding2-top">
    <div class="container">
      <div class="info_form">
        <h4>
          Our Newsletter
        </h4>
        <form action="">
          <input type="text" placeholder="Enter your email">
          <div class="d-flex justify-content-end">
            <button>
              subscribe
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>
            About Energym
          </h6>
          <p>
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation u
          </p>
        </div>
        <div class="col-md-2 offset-md-1">
          <h6>
            Menus
          </h6>
          <ul>
            <li class=" active">
              <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="about.html">About </a>
            </li>
            <li class="">
              <a class="" href="service.html">Services </a>
            </li>
            <li class="">
              <a class="" href="#contactSection">Contact Us</a>
            </li>
            <li class="">
              <a class="" href="#">Login</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Useful Links
          </h6>
          <ul>
            <li>
              <a href="">
                Adipiscing
              </a>
            </li>
            <li>
              <a href="">
                Elit, sed
              </a>
            </li>
            <li>
              <a href="">
                do Eiusmod
              </a>
            </li>
            <li>
              <a href="">
                Tempor
              </a>
            </li>
            <li>
              <a href="">
                incididunt
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Contact Us
          </h6>
          <div class="info_link-box">
            <a href="">
              <img src="{{ url ('assets/images/location-white.png')}}" alt="">
              <span> No.123, loram ipusm</span>
            </a>
            <a href="">
              <img src="{{ url ('assets/images/call-white.png')}}" alt="">
              <span>+01 12345678901</span>
            </a>
            <a href="">
              <img src="{{ url ('assets/images/mail-white.png')}}" alt="">
              <span> demo123@gmail.com</span>
            </a>
          </div>
          <div class="info_social">
            <div>
              <a href="">
                <img src="{{ url ('assets/images/facebook-logo-button.png')}}" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="{{ url ('assets/images/twitter-logo-button.png')}}" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="{{ url ('assets/images/linkedin.png')}}" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="{{ url ('assets/images/instagram.png')}}" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; 2019 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="{{ url ('assets/js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{ url ('assets/js/bootstrap.js')}}"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document
        .querySelector(".custom_menu-btn")
        .classList.toggle("menu_btn-style");
    }
  </script>
</body>

</html>
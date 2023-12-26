
@extends('layouts.app')

@section('content')
@include('layouts.links')

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="{{ route('home') }}">Homepage</a></li>
                                <li><a href="./categories.html">Categories <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="./categories.html">Video Games</a></li>
                                        <li><a href="./anime-details.html">Board Games</a></li>
                                        <li><a href="./anime-watching.html">Online Games</a></li>
                                        <li><a href="./blog-details.html">Mobile Games</a></li>
                                        <li><a href="./signup.html">Sign Up</a></li>
                                        <li><a href="./login.html">Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="./blog.html">Our Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a href="{{ route('logout') }}" id="logout-form"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->


    @yield('main')
    <!-- Hero Section Begin -->
    <section class="hero">
       <div class="container">
           <div class="hero__slider owl-carousel">
               <div class="hero__items set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}">
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="hero__text">
                               <div class="label">Adventure</div>
                               <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                               <p>After 30 days of travel across the world...</p>
                               <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="hero__items set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}">
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="hero__text">
                               <div class="label">Adventure</div>
                               <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                               <p>After 30 days of travel across the world...</p>
                               <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="hero__items set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}">
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="hero__text">
                               <div class="label">Adventure</div>
                               <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                               <p>After 30 days of travel across the world...</p>
                               <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Hero Section End -->

   <!-- Product Section Begin -->
   <section class="product spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="trending__product">
                       <div class="row">
                           <div class="col-lg-8 col-md-8 col-sm-8">
                               <div class="section-title">
                                   <h4>Trending Now</h4>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4">
                               <div class="btn__all">
                                   <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-4 col-md-6 col-sm-6">
                               <div class="product__item">
                                   <div class="product__item__pic set-bg" data-setbg="{{ asset('img/trending/trend-1.jpg') }}">
                                       <div class="ep">18 / 18</div>
                                       <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                       <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                   </div>
                                   <div class="product__item__text">
                                       <ul>
                                           <li>Active</li>
                                           <li>Movie</li>
                                       </ul>
                                       <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-6 col-sm-6">
                               <div class="product__item">
                                   <div class="product__item__pic set-bg" data-setbg="{{ asset('img/trending/trend-2.jpg') }}">
                                       <div class="ep">18 / 18</div>
                                       <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                       <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                   </div>
                                   <div class="product__item__text">
                                       <ul>
                                           <li>Active</li>
                                           <li>Movie</li>
                                       </ul>
                                       <h5><a href="#">Gintama Movie 2: Kanketsu-hen - Yorozuya yo Eien</a></h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-6 col-sm-6">
                               <div class="product__item">
                                   <div class="product__item__pic set-bg" data-setbg="{{ asset('img/trending/trend-3.jpg') }}">
                                       <div class="ep">18 / 18</div>
                                       <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                       <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                   </div>
                                   <div class="product__item__text">
                                       <ul>
                                           <li>Active</li>
                                           <li>Movie</li>
                                       </ul>
                                       <h5><a href="#">Shingeki no Kyojin Season 3 Part 2</a></h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-6 col-sm-6">
                               <div class="product__item">
                                   <div class="product__item__pic set-bg" data-setbg="{{ asset('img/trending/trend-4.jpg') }}">
                                       <div class="ep">18 / 18</div>
                                       <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                       <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                   </div>
                                   <div class="product__item__text">
                                       <ul>
                                           <li>Active</li>
                                           <li>Movie</li>
                                       </ul>
                                       <h5><a href="#">Fullmetal Alchemist: Brotherhood</a></h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-6 col-sm-6">
                               <div class="product__item">
                                   <div class="product__item__pic set-bg" data-setbg="{{ asset('img/trending/trend-5.jpg') }}">
                                       <div class="ep">18 / 18</div>
                                       <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                       <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                   </div>
                                   <div class="product__item__text">
                                       <ul>
                                           <li>Active</li>
                                           <li>Movie</li>
                                       </ul>
                                       <h5><a href="#">Shiratorizawa Gakuen Koukou</a></h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-6 col-sm-6">
                               <div class="product__item">
                                   <div class="product__item__pic set-bg" data-setbg="{{ asset('img/trending/trend-6.jpg') }}">
                                       <div class="ep">18 / 18</div>
                                       <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                       <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                   </div>
                                   <div class="product__item__text">
                                       <ul>
                                           <li>Active</li>
                                           <li>Movie</li>
                                       </ul>
                                       <h5><a href="#">Code Geass: Hangyaku no Lelouch R2</a></h5>
                                   </div>
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
   <!-- Product Section End -->


<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="./index.html">Homepage</a></li>
                        <li><a href="./categories.html">Categories</a></li>
                        <li><a href="./blog.html">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/player.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>


</body>

</html>
@endsection
{{-- @endsection--}}



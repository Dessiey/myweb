@include('layouts.main')
<br>
<br>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
     
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          
            <h2>FACILITIES</h2>
          <ol>
            <li><a href="">MYWEB</a></li>
            <li>facilities</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

   <!-- ======= Services Section ======= -->
   <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">
      
      <center><h4><br>MYWEB has the following state-of-the-art facilities and resources: </h4></center>

<br>
      <div class="row">
        @if(count($facilities)>0)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[0]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[0]['name']) ? $facilities[0]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[0]['name']) ? $facilities[0]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[0]['description']) ? $facilities[0]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        @if(count($facilities)>1)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[1]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[1]['name']) ? $facilities[1]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[1]['name']) ? $facilities[1]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[1]['description']) ? $facilities[1]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        @if(count($facilities)>2)

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[2]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[2]['name']) ? $facilities[2]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[2]['name']) ? $facilities[2]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[2]['description']) ? $facilities[2]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        @if(count($facilities)>3)

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[3]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[2]['name']) ? $facilities[2]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[3]['name']) ? $facilities[3]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[3]['description']) ? $facilities[3]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif

    </div>
    <center><br></center>
    <div class="row">
        @if(count($facilities)>4)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[4]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[4]['name']) ? $facilities[4]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[4]['name']) ? $facilities[4]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[4]['description']) ? $facilities[4]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        @if(count($facilities)>5)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[5]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[5]['name']) ? $facilities[5]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[5]['name']) ? $facilities[5]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[5]['description']) ? $facilities[5]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        @if(count($facilities)>6)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[6]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[6]['name']) ? $facilities[6]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[6]['name']) ? $facilities[6]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[6]['description']) ? $facilities[6]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        @if(count($facilities)>7)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[7]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[7]['name']) ? $facilities[7]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[7]['name']) ? $facilities[7]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[7]['description']) ? $facilities[7]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        <center><br></center>

        @if(count($facilities)>8)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[8]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[8]['name']) ? $facilities[8]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[8]['name']) ? $facilities[8]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[8]['description']) ? $facilities[8]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif

        @if(count($facilities)>9)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[9]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[9]['name']) ? $facilities[9]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[9]['name']) ? $facilities[9]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[9]['description']) ? $facilities[9]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif

        @if(count($facilities)>10)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[10]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[10]['name']) ? $facilities[10]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[10]['name']) ? $facilities[10]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[10]['description']) ? $facilities[10]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif

        @if(count($facilities)>11)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[11]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[11]['name']) ? $facilities[11]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[11]['name']) ? $facilities[11]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[11]['description']) ? $facilities[11]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
        <center><br></center>

        @if(count($facilities)>12)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[12]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[12]['name']) ? $facilities[12]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[12]['name']) ? $facilities[12]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[12]['description']) ? $facilities[12]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif

        @if(count($facilities)>13)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[13]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[13]['name']) ? $facilities[13]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[13]['name']) ? $facilities[13]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[13]['description']) ? $facilities[13]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif

        @if(count($facilities)>14)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[14]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[14]['name']) ? $facilities[14]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[14]['name']) ? $facilities[14]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[14]['description']) ? $facilities[14]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif

        @if(count($facilities)>15)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
                <div class="member-img">
                    <img src="{{ asset('facility/' . $facilities[15]['imageid']) }}" class="img-fluid" alt="">
                    <div class="social">
                        {{ !empty($facilities[15]['name']) ? $facilities[15]['name'] : 'Not listed' }}
                    </div>
                </div>
                <div class="member-info">
                    <h4>{{ !empty($facilities[16]['name']) ? $facilities[16]['name'] : 'Not listed' }} </h4>
                    <span>{{ !empty($facilities[16]['description']) ? $facilities[16]['description'] : 'Not Given' }} </span>
                </div>
            </div>
        </div>
        @endif
    </div>
    
  </section><!-- End Services Section -->

 
   
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="frontend/assets/vendor/aos/aos.js"></script>
<script src="frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="frontend/assets/vendor/php-email-form/validate.js"></script>
<script src="frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="frontend/assets/vendor/waypoints/noframework.waypoints.js"></script>

<!-- Template Main JS File -->
<script src="frontend/assets/js/main.js"></script>

</body>

</html>
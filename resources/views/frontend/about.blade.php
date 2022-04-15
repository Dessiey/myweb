@include('layouts.main')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <br>
    <br>
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>About</h2>
                <ol>
                    <li><a href="">Home</a></li>
                    <li>About</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    @include('layouts.aboutus')

    {{-- <section id="services" class="services section-bg row animate__animated animate__fadeInDown">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                        <div class="member-img">
                            <img src="logo/sokoru.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <h4><a href="">Sokoru Research Site </a></h4>
                        <p>Short Decription
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                        <div class="member-img">
                            <img src="logo/pres.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <h4><a href="">Bonga Research Site </a></h4>
                        <p>Short Decription
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                        <div class="member-img">
                            <img src="logo/pres.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <h4><a href="">Gambela Research Site </a></h4>
                        <p>Short Decription
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">

                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                        <div class="member-img">
                            <img src="logo/pres.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <h4><a href="">Any Research Site </a></h4>
                        <p>Short Decription
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                        <div class="member-img">
                            <img src="logo/pres.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <h4><a href="">Any Research Site </a></h4>
                        <p>Short Decription
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                        <div class="member-img">
                            <img src="logo/pres.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <h4><a href="">Anyother Research Site </a></h4>
                        <p>Short Decription
                        </p>
                    </div>
                </div>

            </div>
    </section><!-- End Services Section --> --}}
    <!-- ======= Our Clients Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

            <div class="row justify-content-end">

                <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <span data-purecounter-start="0"
                            data-purecounter-end="{{ !empty($abouts[0]['happyclients']) ? $abouts[0]['happyclients'] : '25' }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Collaborations (Global+Local)</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <span data-purecounter-start="0"
                            data-purecounter-end="{{ !empty($abouts[0]['projects']) ? $abouts[0]['projects'] : '165' }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <span data-purecounter-start="0"
                            data-purecounter-end="{{ !empty($abouts[0]['experience']) ? $abouts[0]['experience'] : '11' }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Years of experience</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <span data-purecounter-start="0"
                            data-purecounter-end="{{ !empty($abouts[0]['awards']) ? $abouts[0]['awards'] : '11' }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Awards</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->


    <!-- ======= publications Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>RECENT publications </h2>
              
            </div>
            <div class="faq-list">
                <ul>
                    @for ($i = 0; $i < count($publications); $i++)
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                class="collapse" data-bs-target="#faq-list-{{ $i }}"
                                class="collapsed" style="text-align: justify">
                                {{ !empty($publications[$i]['pubyear']) ? $publications[$i]['pubyear'] : '' }} | -
                                {{ !empty($publications[$i]['title']) ? $publications[$i]['title'] : '' }}
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-{{ $i }}" class="collapse" data-bs-parent=".faq-list">
                                <p><i>
                                        <small>
                                            {{ !empty($publications[$i]['abstract']) ? $publications[$i]['abstract'] : '' }}

                                            <u> <a href="{{ !empty($publications[$i]['paperlink']) ? $publications[$i]['paperlink'] : '' }} 
                                " target="_blank">
                                                    click here to read more </u> </small></i>
                                    </a>
                                </p>
                            </div>
                        </li>
                    @endfor



                </ul>
            </div>

        </div>
    </section>
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>collaborations</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                @for ($i = 0; $i < count($suppporters); $i++)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="client-logo">
                            {{ !empty($suppporters[$i]['name']) ? $suppporters[$i]['name'] : '' }} &nbsp; &nbsp;
                            &nbsp;<img
                                src="logo/{{ !empty($suppporters[$i]['logoid']) ? $suppporters[$i]['logoid'] : '' }}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                @endfor


            </div>

        </div>
    </section><!-- End Our Clients Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">

                    <h2>MYWEB</h2>

                    <p>JIMMA UNIVERSITY<br>
                        PO-BOX 378<br>
                        ETHIOPIA<br><br>
                        <strong>Phone:</strong> +251 917 80 43 52<br>
                        <strong>Email:</strong> delenasaw.yewhalaw@ju.edu.et or delenasawye@yahoo.com <br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Centers</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Researches</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Projects</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Consultancy</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Collaborations</a></li>

                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Latest updates</h4>
                    <p>Subscribe to get our latest news</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>JU-MYWEB</span></strong>. All Rights Reserved
            </div>

        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="frontend/assets/vendor/aos/aos.js"></script>
<script src="frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="frontend/assets/vendor/php-email-form/validate.js"></script>
<script src="frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="frontend/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="frontend/assets/vendor/purecounter/purecounter.js"></script>

<!-- Template Main JS File -->
<script src="frontend/assets/js/main.js"></script>

</body>

</html>

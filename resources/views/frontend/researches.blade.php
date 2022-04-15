@include('layouts.main')
<br><br>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">

            <h2>Research Publications</h2>
            <ol>
                <li><a href="">MYWEB</a></li>
                <li>Publications</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->


<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>publications / Achievements </h2>
            <p>Jimma University to Become First Institution in Ethiopia to Carry Out Molecular Entomology
                <a
                    href="https://www.pmi.gov/jimma-university-to-become-first-institution-in-ethiopia-to-carry-out-molecular-entomology/">
                    Read more on US President's Malaria initiative PMI
                </a>
            </p>
        </div>
        <div class="faq-list">
            <ul>
                @for ($i = 0; $i < count($publications); $i++)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">

                    </div>
                    <li data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                            data-bs-target="#faq-list-{{ $i }}" class="collapsed">
                            {{ !empty($publications[$i]['title']) ? $publications[$i]['title'] : '' }}
                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
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


                <div class="icon-box iconbox-orange ">
                    <div class="member-img">
                        <br>
                        <h4></h4>
                        @if (count($certificates) > 0)

                            <img src="{{ asset('certificate/' . $certificates[0]['imageid']) }}"
                                class="img-fluid" alt="">
                        @endif

                    </div>

                </div>
            </ul>
        </div>

    </div>
</section>

<!-- ======= Services Section ======= -->
<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="row">
            @if (count($certificates) > 1)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('certificate/' . $certificates[1]['imageid']) }}"
                                class="img-fluid" alt="">
                            <div class="social">
                                {{ !empty($certificates[1]['name']) ? $certificates[1]['name'] : 'Not listed' }}
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ !empty($certificates[1]['name']) ? $certificates[1]['name'] : 'Not listed' }} </h4>
                            <span>{{ !empty($certificates[1]['description']) ? $certificates[1]['description'] : 'Not Given' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($certificates) > 2)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('certificate/' . $certificates[2]['imageid']) }}"
                                class="img-fluid" alt="">
                            <div class="social">
                                {{ !empty($certificates[2]['name']) ? $certificates[2]['name'] : 'Not listed' }}
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ !empty($certificates[2]['name']) ? $certificates[2]['name'] : 'Not listed' }}
                            </h4>
                            <span>{{ !empty($certificates[2]['description']) ? $certificates[2]['description'] : 'Not Given' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($certificates) > 3)

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('certificate/' . $certificates[3]['imageid']) }}"
                                class="img-fluid" alt="">
                            <div class="social">
                                {{ !empty($certificates[3]['name']) ? $certificates[3]['name'] : 'Not listed' }}
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ !empty($certificates[3]['name']) ? $certificates[3]['name'] : 'Not listed' }}
                            </h4>
                            <span>{{ !empty($certificates[3]['description']) ? $certificates[3]['description'] : 'Not Given' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($certificates) > 4)

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('certificate/' . $certificates[4]['imageid']) }}"
                                class="img-fluid" alt="">
                            <div class="social">
                                {{ !empty($certificates[4]['name']) ? $certificates[4]['name'] : 'Not listed' }}
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ !empty($certificates[4]['name']) ? $certificates[4]['name'] : 'Not listed' }}
                            </h4>
                            <span>{{ !empty($certificates[4]['description']) ? $certificates[4]['description'] : 'Not Given' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
</section><!-- End Services Section -->
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

<!-- Template Main JS File -->
<script src="frontend/assets/js/main.js"></script>

</body>

</html>

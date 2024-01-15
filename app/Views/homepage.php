<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('css/bootstrap.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('style.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('css/dark.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('css/font-icons.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('css/animate.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('css/magnific-popup.css')?>" type="text/css" />

    <link rel="stylesheet" href="<?=base_url('css/custom.css')?>" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Fitnesia</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
		============================================= -->
        <header id="header" class="transparent-header page-section dark" data-sticky-class="not-dark">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <!-- Logo
						============================================= -->
                        <div id="logo">
                            <a href="index.html" class="standard-logo" data-dark-logo="demos/gym/images/logo3.png"><img
                                    src="demos/gym/images/logo3.png" alt="Canvas Logo"></a>
                            <a href="index.html" class="retina-logo" data-dark-logo="demos/gym/images/logo3.png"><img
                                    src="demos/gym/images/logo3.png" alt="Canvas Logo"></a>
                        </div><!-- #logo end -->



                        <!-- Primary Navigation
						============================================= -->
                        <nav class="primary-menu">

                            <ul class="menu-container one-page-menu">
                                <li class="menu-item current"><a class="menu-link" href="<?= base_url('dashadmin')  ?>">
                                        <div>Beranda</div>
                                    </a></li>
                                <!-- <li class="menu-item"><a class="menu-link" href="#" data-href="#section-features"><div>Features</div></a></li> -->
                                <li class="menu-item"><a class="menu-link" href="#" data-scrollto="#section-Pricing">
                                        <div>Harga</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#" data-href="#section-testimonials">
                                        <div>Testimoni</div>
                                    </a></li>
                                <!-- <li class="menu-item"><a class="menu-link" href="#" data-href="#section-specs"><div>Specifications</div></a></li> -->
                                <?php if (!session()->auth): ?>
                                <li class="nav-item">
                                    <a class="menu-link" aria-current="page" href="<?= base_url('login')  ?>">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="menu-link" href="<?= base_url('register')  ?>">Register</a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <span class="menu-link">
                                        Hello <b><?= session('auth')['username']; ?></b>
                                    </span>
                                </li>
                                <li class="nav-item">
                                    <a class="menu-link" aria-current="page"
                                        href="<?= base_url('logout')  ?>">Logout</a>
                                </li>
                                <?php endif ?>
                            </ul>

                        </nav><!-- #primary-menu end -->

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->

        <section id="slider" class="slider-element slider-parallax min-vh-60 min-vh-md-100 dark include-header"
            style="background: url(demos/gym/images/landing/-1.jpg) center center no-repeat; background-size: cover">
            <div class="slider-inner">

                <div class="vertical-middle slider-element-fade">
                    <div class="container-fluid py-5">
                        <div class="heading-block text-center border-bottom-0">
                            <h1>ikuti program kami di fitnessia</h1>
                            <span>Membangun Tubuh Sehat &amp; Keren</span>
                        </div>

                        <div class="text-center">
                            <a href="#section-Pricing" class="button button-3d button-teal button-xlarge mb-0"><i
                                    class="icon-star3"></i>Mulai Percobaan Gratis</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Content
		============================================= -->
        <section id="content">
            <class="content-wrap">
                <div class="container clearfix">
                    <div class="divider divider-sm divider-center"><i class="icon-circle"></i></div>
                </div>\
                <div class="section">
                    <div class="container clearfix">

                        <body>
                            <div id="section-Pricing" class="heading-block text-center page-section">
                                <h2>Harga</h2>
                                <span>Beberapa Kelas Yang Tersedia</span>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: center; margin: 1cm; border: 3px solid #ccc;">
                                    <div style="padding: 10px;">
                                        <h2>Pemula</h2>
                                        <h3><del>Rp.10.000</del></h3>
                                        <h3>Gratis Untuk Pendaftar Baru</h3>
                                        <div>
                                            <div style="padding: 2mm;">
                                                Gratis 1x tiket masuk GYM
                                                <br>
                                                Video Tutorial Pemula
                                                <br>
                                                Konsultasi GYM Trainer Online
                                                <br>
                                                <br>
                                                <?php if (!session()->auth): ?>
                                                <a href="<?= base_url('login')?>"
                                                    class="button button-3d button-red button-xlarge mb-0">Beli
                                                    Sekarang</a>
                                                <?php else: ?>
                                                <button id="pay-button" target="_blank" data-scrollto="#section-pricing"
                                                    class="button button-3d button-red button-xlarge mb-0">Beli
                                                    Sekarang</button>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="text-align: center; border: 3px solid #ccc;  margin: 1cm;">
                                    <div style="padding: 10px;">
                                        <h2>Menengah</h2><br>
                                        <h3><del>Rp.40.000</del></h3>
                                        <h3>Rp.25.000</h3>
                                        <div>
                                            <div style="padding: 2mm;"><br>
                                                Gratis 1x tiket masuk GYM
                                                <br>
                                                Video Tutorial Menengah
                                                <br>
                                                Konsultasi GYM Trainer Online
                                                <br>
                                                <br>
                                                <?php if (!session()->auth): ?>
                                                <a href="<?= base_url('login')?>"
                                                    class="button button-3d button-red button-xlarge mb-0">Beli
                                                    Sekarang</a>
                                                <?php else: ?>
                                                <button id="pay-button" target="_blank" data-scrollto="#section-pricing"
                                                    class="button button-3d button-red button-xlarge mb-0">Beli
                                                    Sekarang</button>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="text-align: center; border: 3px solid #ccc; margin: 1cm;">
                                    <div style="padding: 10px;">
                                        <h2>Ahli</h2><br>
                                        <h3><del>Rp.60.000</del></h3>
                                        <h3>Rp.40.000</h3>
                                        <div>
                                            <div style="padding: 2mm;"><br>
                                                Gratis 1x tiket masuk GYM
                                                <br>
                                                Video Tutorial Ahli
                                                <br>
                                                Konsultasi GYM Trainer Online
                                                <br>
                                                <br>
                                                <?php if (!session()->auth): ?>
                                                <a href="<?= base_url('login')?>"
                                                    class="button button-3d button-red button-xlarge mb-0">Beli
                                                    Sekarang</a>
                                                <?php else: ?>
                                                <button id="paybutton" target="_blank" data-scrollto="#section-pricing"
                                                    class="button button-3d button-red button-xlarge mb-0">Beli
                                                    Sekarang</button>
                                                <?php endif ?>
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



    <div class="section">

        <div class="container clearfix">

            <div id="section-testimonials" class="heading-block text-center page-section">
                <h2>Testimoni</h2>
                <span>Beberapa Ulasan Untuk Program Kami</span>
            </div>

            <ul class="testimonials-grid grid-1 grid-md-2 grid-lg-3">
                <li class="grid-item">
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam
                                quibusdam cum libero illo rerum repellendus!</p>
                            <div class="testi-meta">
                                John Doe
                                <span>XYZ Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="grid-item">
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos
                                obcaecati id culpa corporis molestias.</p>
                            <div class="testi-meta">
                                Collis Ta'eed
                                <span>Envato Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="grid-item">
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="images/testimonials/7.jpg" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Fugit officia dolor sed harum excepturi ex iusto magnam asperiores molestiae
                                qui natus obcaecati facere sint amet.</p>
                            <div class="testi-meta">
                                Mary Jane
                                <span>Google Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="grid-item">
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Similique fugit repellendus expedita excepturi iure perferendis provident
                                quia eaque. Repellendus, vero numquam?</p>
                            <div class="testi-meta">
                                Steve Jobs
                                <span>Apple Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="grid-item">
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="images/testimonials/4.jpg" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, perspiciatis
                                illum totam dolore deleniti labore.</p>
                            <div class="testi-meta">
                                Jamie Morrison
                                <span>Adobe Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="grid-item">
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="images/testimonials/8.jpg" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Porro dolorem saepe reiciendis nihil minus neque. Ducimus rem necessitatibus
                                repellat laborum nemo quod.</p>
                            <div class="testi-meta">
                                Cyan Ta'eed
                                <span>Tutsplus</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

        </div>

    </div>
    </section><!-- #content end -->

    <!-- Tambahkan tombol di dalam view homepage -->

    <!-- Sisipkan script JavaScript -->
    <!-- <script>
    document.getElementById('updateLevelButton').onclick = function() {
        fetch('/update-user-level', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // Jika kamu menggunakan CSRF protection di CodeIgniter 4, tambahkan header ini dengan token CSRF
                    // 'X-CSRF-TOKEN': 'token_csrf',
                },
                // Jika kamu perlu mengirimkan data ke server, tambahkan bagian body
                // body: JSON.stringify({ key: 'value' }),
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                console.log(data); // Tampilkan data respons jika perlu
                // Lakukan hal lain setelah berhasil memperbarui level pengguna
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    };
    </script> -->




    <!-- Copyrights
			============================================= -->
    <div id="copyrights">
        <div class="container">

            <div class="row col-mb-30">

                <div class="col-md-6 text-center text-md-left">
                    Copyrights &copy; <span id="currentYear">2020</span> All Rights Reserved by Fitnessia<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>


                <div class="col-md-6 text-center text-md-right">
                    <div class="d-flex justify-content-center justify-content-md-end">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <!-- <div class="clear"></div>

							<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
						</div> -->

                </div>

            </div>
        </div><!-- #copyrights end -->
        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="<?=base_url('js/jquery.js')?>"></script>
    <script src="<?=base_url('js/plugins.min.js')?>"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="<?=base_url('js/functions.js')?>"></script>
    <script>
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();
    </script>

    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
        data-client-key="<Mid-client-9tGfgf8RKUxn8Ej7>">
    </script>
    </script>
    <script type="text/javascript">
    document.getElementById('paybutton').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(JSON.stringify(result, null, 2));
                // Panggil URL untuk memperbarui level pengguna
                fetch('/update-user-level', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            // Jika kamu menggunakan CSRF protection di CodeIgniter 4, tambahkan header ini dengan token CSRF
                            // 'X-CSRF-TOKEN': 'token_csrf',
                        },
                        // Jika kamu perlu mengirimkan data ke server, tambahkan bagian body
                        // body: JSON.stringify({ key: 'value' }),
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    })
                    .then(data => {
                        console.log(data); // Tampilkan data respons jika perlu
                        return view('/dashadmin')
                        // Lakukan hal lain setelah berhasil memperbarui level pengguna
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });

            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };

    $('#paybutton').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/homepage",
            data: {

            },
            dataType: "json",
            success: function(response) {

            }

        });
    });
    </script>



</body>

</html>
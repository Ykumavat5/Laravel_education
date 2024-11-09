<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="dashboard" class="logo d-flex align-items-center">
                    <span class="sitename">Mentor</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('about.index') }}">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="/terms">Terms of service</a></li>
                    <li><a href="/policy">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                @if ($newsletterExists)
                    <p>You are subscribed to our newsletter. If you want to unsubscribe, click the button below:</p>
                    <form action="{{ route('newsletter.unsubscribe') }}" method="post">
                        @csrf
                        <input type="submit" value="Unsubscribe" class="btn btn-danger">
                    </form>
                @else
                    <p>Subscribe to our newsletter to receive the latest news about our products and services!</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="post">
                        @csrf
                        <div class="newsletter-form">
                            <input type="email" name="email" placeholder="Enter your email" required>
                            <input type="submit" value="Subscribe" class="btn btn-primary">
                        </div>
                    </form>
                @endif


            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Mentor</strong> <span>All Rights Reserved</span>
        </p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('notification');
        if (notification) {
            const bar = notification.querySelector('.notification-bar');

            // Start the progress bar from full width and shrink it
            bar.style.width = '100%';

            // Start reducing the width to 0% over 5 seconds
            setTimeout(() => {
                bar.style.width = '0%';
            }, 0); // Start immediately

            // Fade out the notification after the bar is gone
            setTimeout(() => {
                notification.classList.add('fade');
            }, 5000);

            // Remove the notification from the DOM after the fade out
            setTimeout(() => {
                notification.remove();
            }, 10000); // Give it time to fade
        }
    });
</script>
</body>


</html>

<!--footer section start -->
<!-- <div class="footer_section layout_padding">
    <div class="container"> -->
<!-- <div class="row">
            <div class="col-sm-3">
                <div class="footer_contact">Contact Us</div>
            </div>
            <div class="col-sm-3">
                <div class="location_text"><img src="<?= base_url("assets/images/map-icon.png") ?>"><span
                        style="padding-left: 10px;">Locations</span></div>
            </div>
            <div class="col-sm-3">
                <div class="location_text"><img src="<?= base_url("asets/images/call-icon.png") ?>"><span
                        style="padding-left: 10px;">Locations</span></div>
            </div>
            <div class="col-sm-3">
                <div class="location_text"><img src="<?= base_url("assets/images/mail-icon.png") ?>"><span
                        style="padding-left: 10px;">Locations</span></div>
            </div> -->
</div>
<!-- <div class="enput_bt">
        <div class="row">
            <div class="col-md-6">
                <div class="input_main">
                    <div class="container">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <input type="text" class="email-bt" placeholder="NAME" name="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="email-bt" placeholder="EMAIL" name="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="email-bt" placeholder="PHONE NUMBER" name="Email">
                            </div>
                            <form action="/action_page.php">
                                <div class="form-group">
                                    <textarea class="massage-bt" placeholder="MASSAGE" rows="5" id="comment"
                                        name="text"></textarea>
                                </div>
                            </form>
                        </form>
                    </div>
                    <div class="send_bt_main">
                        <div class="left">
                            <div class="send_bt"><a href="#">SEND</a></div>
                        </div>
                        <div class="right">
                            <div class="social_icon">
                                <ul>
                                    <li><a href="#"><img src="images/fb-icon.png"></a></li>
                                    <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                                    <li><a href="#"><img src="images/in-icon.png"></a></li>
                                    <li><a href="#"><img src="images/instagram-icon.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_section">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="full map_section">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
                 <h1 class="newsletter_text">Newsletter</h1>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="ENTER YOUR MAIL"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">SUBSCRIBE</span>
                    </div>
                </div> -->
</div>
</div>
</div>
<div class="copyright_section">
    <p class="copyright_text">Copyright 2019 All Right Reserved By.<a href="https://html.design"> Free html
            Templates</p>
</div>
</div>
</div>
<!--footer section end -->

<!-- Javascript files-->
<script src="<?= base_url("assets/js/jquery.min.js") ?>"></script>
<script src="<?= base_url("assets/js/popper.min.js") ?>"></script>
<script src="<?= base_url("assets/js/bootstrap.bundle.min.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery-3.0.0.min.js") ?>"></script>
<script src="<?= base_url("assets/js/plugin.js") ?>"></script>
<!-- sidebar -->
<script src="<?= base_url("assets/js/jquery.mCustomScrollbar.concat.min.js") ?>"></script>
<script src="<?= base_url("assets/js/custom.js") ?>"></script>
<!-- javascript -->
<script src="<?= base_url("assets/js/owl.carousel.js") ?>"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>


<script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {
                lat: 40.645037,
                lng: -73.880224
            },
        });
    };

    var image = 'images/location_point.png';
    var beachMarker = new google.maps.Marker({
        position: {
            lat: 40.645037,
            lng: -73.880224
        },
        map: map,
        icon: image
    });
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
</script>
<!-- end google map js -->
</body>

</html>
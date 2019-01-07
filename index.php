<?php

session_start();
include 'part/top.php';
include 'autoload.php';

$model = new Model();
$landing = $model->landing();
// print_r($landing);
// die();
?>
<!-- ****** New Arrivals Area Start ****** -->
<section class="new_arrivals_area section_padding_100_0 clearfix shop">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>The Movies</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row karl-new-arrivals">

            <?php while ($item = $landing->fetch_assoc()): ?>
            <!-- Single gallery Item Start -->
            <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.2s">
                <!-- Product Image -->
                <div class="product-img">
                    <img style="width:255px;height:368px;" src="<?= $item['image'] ?>" alt="">
                </div>
                <!-- Product Description -->
                <div class="product-description">
                    <h4 class="product-price"><?= $item['price']?></h4>
                    <p><?= $item['title']?></p>
                    <!-- Add to Cart -->
                    <form class="" action="/checkout" method="post">
                        <input type="text" name="productId" value="<?= $item['id']?>" hidden>
                        <input type="submit" name="submitBnt" value="ADD TO CART" class="btn btn-primary add-to-cart-btn btn-checkout">
                    </form>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>
</section>
<!-- ****** New Arrivals Area End ****** -->

<!-- ****** Popular Brands Area Start ****** -->
<section class="karl-testimonials-area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Testimonials</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="karl-testimonials-slides owl-carousel">

                    <!-- Single Testimonial Area -->
                    <div class="single-testimonial-area text-center">
                        <span class="quote">"</span>
                        <h6>Nice.. Payment is easy</h6>
                        <div class="testimonial-info d-flex align-items-center justify-content-center">
                            <div class="tes-thumbnail">
                                <img src="/assets/img/bg-img/tes-1.jpg" alt="">
                            </div>
                            <div class="testi-data">
                                <p>Michelle Williams</p>
                                <span>Client, Los Angeles</span>
                            </div>
                        </div>
                    </div>

                    <!-- Single Testimonial Area -->
                    <div class="single-testimonial-area text-center">
                        <span class="quote">"</span>
                        <h6>Good inovation. We don't need to wait long in the cinema.</h6>
                        <div class="testimonial-info d-flex align-items-center justify-content-center">
                            <div class="tes-thumbnail">
                                <img src="/assets/img/bg-img/bg-2.jpg" alt="">
                            </div>
                            <div class="testi-data">
                                <p>Marilyn C. Sargent</p>
                                <span>Client, Canada</span>
                            </div>
                        </div>
                    </div>

                    <!-- Single Testimonial Area -->
                    <div class="single-testimonial-area text-center">
                        <span class="quote">"</span>
                        <h6>Ticket prices are cheaper than in theaters</h6>
                        <div class="testimonial-info d-flex align-items-center justify-content-center">
                            <div class="tes-thumbnail">
                                <img src="/assets/img/bg-img/bg-3.jpg" alt="">
                            </div>
                            <div class="testi-data">
                                <p>Patricia C. Anna</p>
                                <span>Client, Sidney</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'part/bottom.php'; ?>

@extends('maindesign')

@section('testimonial')
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Customer Reviews
                </h2>
            </div>
        </div>

        <div class="container px-0">
            <div id="customCarousel2" class="carousel carousel-fade" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5>Sarah Ahmed</h5>
                                    <h6>Verified Buyer</h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                Absolutely loved the quality of the hoodie I ordered.
                                The fabric feels premium and delivery was super fast.
                                Definitely ordering again from this store!
                            </p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5>Tanvir Hasan</h5>
                                    <h6>Regular Customer</h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                Great shopping experience from start to finish.
                                Product matched the photos perfectly and the fit was excellent.
                                Highly recommended for trendy streetwear.
                            </p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5>Nusrat Jahan</h5>
                                    <h6>Fashion Enthusiast</h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                One of the best online clothing stores I’ve tried recently.
                                Stylish designs, affordable pricing, and customer support was very helpful.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
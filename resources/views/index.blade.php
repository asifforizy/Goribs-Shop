@extends('maindesign')

@section('index')
    {{-- HERO SLIDER --}}
    <section class="hero-slider">

        <div class="slide active"
            style="background-image:url('https://images.unsplash.com/photo-1523381210434-271e8be1f52b');">
            <div class="overlay">
                <div class="content">
                    <h1>Modern Streetwear</h1>
                    <p>Upgrade your style with premium minimal fashion collections.</p>
                    <a href="{{ route('viewallproducts') }}" class="btn">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1496747611176-843222e1e57c');">
            <div class="overlay">
                <div class="content">
                    <h1>Luxury Collection</h1>
                    <p>Elegant pieces designed for confidence and comfort.</p>
                    <a href="{{ route('viewallproducts') }}" class="btn">Explore</a>
                </div>
            </div>
        </div>

        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1515886657613-9f3515b0c78f');">
            <div class="overlay">
                <div class="content">
                    <h1>Fresh New Arrivals</h1>
                    <p>Discover trending outfits crafted for modern lifestyle.</p>
                    <a href="{{ route('viewallproducts') }}" class="btn">View More</a>
                </div>
            </div>
        </div>

        <div class="arrow prev">&#10094;</div>
        <div class="arrow next">&#10095;</div>

        <div class="dots"></div>

    </section>


    {{-- All Products Section --}}
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ route('product_details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('products/' . $product->product_image) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6>{{ $product->product_title }}</h6>
                                    <h6>
                                        Price <span>$ {{ $product->product_price }}</span>
                                    </h6>
                                </div>
                            </a>
                            <div class="cart-btn-container">
                                <a href="{{ route('add_to_cart', $product->id) }}">
                                    <button type="submit" class="add-cart-btn">🛒 Add to Cart</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="btn-box">
                <a class="latest-btn" href="{{ route('viewallproducts') }}">View All Products</a>
            </div>
        </div>
    </section>


    {{-- Contact Section --}}
    <section class="contact_section layout_padding">
        <div class="container px-0">
            <div class="heading_container">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://maps.google.com/maps?q=Daffodil%20International%20University%20Dhaka&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                width="600" height="300" frameborder="0" style="border: 0; width:100%; height:100%"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="#">
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email" />
                        <input type="text" placeholder="Phone" />
                        <input type="text" class="message-box" placeholder="Message" />
                        <button>SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    {{-- SLIDER CSS --}}
    <style>
        /* ===================== HERO SLIDER ===================== */
        .hero-slider {
            position: relative;
            width: 90%;
            /* responsive width */
            max-width: 1200px;
            /* optional max width */
            height: 65vh;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 25px;
            /* rounded corners */
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            border-radius: 25px;
        }

        .slide.active {
            opacity: 1;
            z-index: 1;
        }

        .overlay {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
            display: flex;
            align-items: center;
            padding: 0 5%;
            /* responsive padding */
        }

        .content {
            color: white;
            max-width: 600px;
            animation: fadeUp 1s ease;
        }

        .content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1rem;
            margin-bottom: 30px;
        }

        .btn {
            padding: 14px 30px;
            background: white;
            color: black;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            color: white;
            background: rgba(255, 255, 255, 0.15);
            padding: 15px;
            cursor: pointer;
            z-index: 2;
            border-radius: 50%;
        }

        .prev {
            left: 20px;
        }

        .next {
            right: 20px;
        }

        .dots {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            z-index: 2;
        }

        .dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            margin: 0 5px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }

        .dot.active {
            background: white;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===================== RESPONSIVE STYLING ===================== */
        @media (max-width: 992px) {
            .hero-slider {
                height: 55vh;
            }

            .content h1 {
                font-size: 2.5rem;
            }

            .content p {
                font-size: 0.95rem;
            }

            .arrow {
                font-size: 28px;
                padding: 12px;
            }
        }

        @media (max-width: 768px) {
            .hero-slider {
                height: 50vh;
            }

            .overlay {
                justify-content: center;
                /* center content on smaller screens */
            }

            .content {
                max-width: 90%;
                text-align: center;
            }

            .content h1 {
                font-size: 2rem;
            }

            .content p {
                font-size: 0.9rem;
            }

            .arrow {
                font-size: 24px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .hero-slider {
                height: 40vh;
            }

            .content h1 {
                font-size: 1.5rem;
            }

            .content p {
                font-size: 0.8rem;
            }
        }
    </style>


    {{-- SLIDER JS --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelectorAll('.slide');
            const dotsContainer = document.querySelector('.dots');
            let currentSlide = 0;

            slides.forEach((_, index) => {
                const dot = document.createElement('span');
                dot.classList.add('dot');
                if (index === 0) dot.classList.add('active');

                dot.addEventListener('click', () => showSlide(index));
                dotsContainer.appendChild(dot);
            });

            const dots = document.querySelectorAll('.dot');

            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));

                slides[index].classList.add('active');
                dots[index].classList.add('active');

                currentSlide = index;
            }

            document.querySelector('.next').addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            });

            document.querySelector('.prev').addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            });

            setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }, 5000);
        });
    </script>
@endsection

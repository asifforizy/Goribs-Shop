@extends('maindesign')

@section('contact')
    <section class="contact_section layout_padding">
        <div class="container px-0">
            <div class="heading_container">
                <h2 class="">Contact Us</h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://maps.google.com/maps?q=Daffodil%20International%20University%20Dhaka&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                width="600" height="300" frameborder="0" style="border: 0; width: 100%; height: 100%"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="#">
                        <div>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex">
                            <button class="add-cart-btn">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

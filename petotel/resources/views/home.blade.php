<!DOCTYPE html>
<html data-bs-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:title" content="Petotel"/>
    <meta property="og:description" content="PETOTEL: Pet care services for your pet's needs and well-being."/>
    <meta property="og:image" content="/favicon.png"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <title>PETOTEL - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .join-now-button {
            background-color: #17A2B8; /* Teal color */
            color: white; /* White text color */
            border: none;
            border-radius: 20px; /* Rounded corners */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Font size */
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-family: Arial, sans-serif; /* Font family */
        }

        .join-now-button:hover {
            background-color: #138496; /* Darker teal color on hover */
        }
    </style>
</head>
<body><!-- Start: Navbar Centered Brand -->
@include('layout.header')
<div class="container"
     style="padding: 0px;background: url(&quot;img/home/clipboard-image-14.png&quot;) repeat;width: 100%;">
    <h1 style="margin: 25px;padding: 100px 0px 25px 0px;color: var(--bs-body-bg);font-size: 50px;">Every pet
        deserves<br><strong>Celebrity care</strong></h1>
    <p style="color: var(--bs-body-bg);margin: 25px;padding: 0px 0px 25px 0px;">We understand the needs of your furry
        companions, <br>your budget, and your peace of mind.</p></div>
<div class="container">
    <div class="row">
        <div class="col-xl-6">
            <div class="container text-start" style="width: 90%;"><h1 style="font-size: 26px;">About Us</h1>
                <h1>Providing Reliable Pet Care Solutions</h1>
                <p>Welcome to Petotel, your online platform dedicated to helping pet owners who face common challenges,
                    such as a lack of caregivers during travel or busy periods at work. At Petotel, we connect you to a
                    network of trusted caregivers who offer personalized services to meet your pet's individual
                    needs.</p>
                <h1>Tailored Solutions for Your Furry Friends</h1>
                <p>At PETOTEL, we understand that every pet is unique, which is why we offer a comprehensive range of
                    expert pet care solutions tailored to your needs. Our dedicated members is committed to ensuring the
                    well-being and happiness of your furry companions 24/7.</p></div>
        </div>
        <div class="col-xl-5"><img src="img/home/clipboard-image-15.png"
                                   style="width: 100%;height: 100%;" width="261" height="519"></div>
    </div>
</div><!-- Start: Projects Grid -->
<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto"><h2>How to Hire</h2></div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div>
                <div class="py-4"><img class="rounded img-fluid d-block w-100 fit-cover"
                                       src="img/home/clipboard-image-16.png"
                                       width="356" height="268" style="height: 71px;padding: 0px 40%;"><h4
                        class="text-center" style="margin: 15px 0px 0px;">Catalog Search</h4>
                    <p class="text-center">Identify the provider and the type of service you are looking for.</p></div>
            </div>
        </div>
        <div class="col">
            <div>
                <div class="py-4"><img class="rounded img-fluid d-block w-100 fit-cover"
                                       style="height: 71px;padding: 0px 40%;"
                                       src="img/home/clipboard-image-17.png"><h4
                        class="text-center" style="margin: 15px 0px 0px;">Make the Reservation</h4>
                    <p class="text-center">Select the provider that suits you best</p></div>
            </div>
        </div>
        <div class="col">
            <div>
                <div class="py-4"><img class="rounded img-fluid d-block w-100 fit-cover"
                                       style="height: 71px;padding: 0px 40%;"
                                       src="img/home/clipboard-image-18.png"><h4
                        class="text-center" style="margin: 15px 0px 0px;">Waiting for Confirmation</h4>
                    <p class="text-center">The Provider will validate the availability.</p></div>
            </div>
        </div>
        <div class="col-xl-4" style="margin: 24px 0px 0px 16.9%;">
            <div>
                <div class="py-4"><img class="rounded img-fluid d-block w-100 fit-cover"
                                       style="height: 71px;padding: 0px 40%;"
                                       src="img/home/clipboard-image-19.png"><h4
                        class="text-center" style="margin: 15px 0px 0px;">Make the Payment</h4>
                    <p class="text-center">You will receive a link in the email to make the payment.</p></div>
            </div>
        </div>
        <div class="col-xl-4">
            <div>
                <div class="py-4"><img class="rounded img-fluid d-block w-100 fit-cover"
                                       style="height: 71px;padding: 0px 40%;"
                                       src="img/home/clipboard-image-20.png"><h4
                        class="text-center" style="margin: 15px 0px 0px;"> Use the service</h4>
                    <p class="text-center">The Provider takes care of your puppy for the period you have selected.</p>
                </div>
            </div>
        </div>
    </div>
</div><!-- End: Projects Grid -->
<div class="container"><h1 style="text-align: center;">Services</h1>
    <p style="text-align: center;">At Petotel, your pet's well-being is a priority and to achieve that<br>we provide as
        many services as we can to make sure all the needs are met.<br>Therefore, we provide a wide variety of those
        services.<br>You can check out the whole list on the&nbsp;<a href="/services">Services Page</a>.</p></div>
<div class="container" style="text-align: center"><h1 style="text-align: center;">Become a Provider</h1>
    <p style="text-align: center;">At Petotel, your pet's safety, well-being and happiness are our number <br>one
        priority. Join us and discover how we can make pet owners' lives <br>easier and more peaceful.</p>
    <a href="/provider">
        <button class="join-now-button">Join Now</button>
    </a>
</div>
<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('status') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
<script src="js/home.js"></script>
<script>
    @if (session('status'))
        var myModal = new bootstrap.Modal(document.getElementById('statusModal'), {});
        myModal.show();
    @endif
</script>
</body>
</html>

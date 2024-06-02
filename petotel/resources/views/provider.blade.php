<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:title" content="Petotel - Provider"/>
    <meta property="og:description" content="PETOTEL: Pet care services for your pet's needs and well-being."/>
    <meta property="og:image" content="/favicon.png"/>
    <link rel="icon" href="/favicon.png" type="image/png">
    <title>PETOTEL - Provider</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/provider.css') }}">
    <style>
        .custom-container {
            background-color: #20cdbb; /* Cor de fundo do container */
            color: black;
            padding: 20px;
            text-align: center;
            /*max-width: 600px;*/
            border-radius: 8px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
@include('layout.header')
<div class="container py-4 py-xl-5">
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col-xxl-5">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;padding-right: 0px;margin-right: 1px;"
                                   src="img/provider/clipboard-image.png"></div>
        </div>
        <div class="col-xxl-6">
            <p><br><span style="color: rgb(140, 140, 140);">At PETOTEL, we aren't just establishing a community for fervent and devoted caretakers, we're forming a family.</span><br><br>
            </p>
        </div>
    </div>
</div>
<div class="container py-4 py-xl-5">
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col-xxl-5">
            <p><br><br><span style="color: rgb(140, 140, 140);">As a service provider on our platform, you'll get the opportunity to showcase your aptitude and enthusiasm to tutors in search of excellent services.</span>
            </p>
        </div>
        <div class="col-xxl-6">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;padding-right: 0px;margin-right: 1px;"
                                   src="img/provider/clipboard-image-1.png" width="527" height="200"></div>
        </div>
    </div>
</div>
<div class="container py-4 py-xl-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="custom-container">
                <p>We're not merely an online platform; we're a supportive family committed to assisting you at every
                    stage, providing access to robust training, tools, and resources. Our pledge to professionalism and
                    quality ensures tutors receive unwavering support and confidence.</p>
                <p>Come join us in our mission to transform the pet services industry and become part of our dynamic
                    community.</p>
            </div>
        </div>
    </div>
</div>
<div class="container py-5 py-xl-5">
    <div class="row justify-content-center">
        <div class="col">
            <h3>How it works?</h3>
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 250px;padding-right: 0px;margin-right: 1px;"
                                   src="img/provider/howitworks.png" width="527" height="200"></div>
        </div>
    </div>
</div>
<div class="container py-4 py-xl-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="custom-container">
                <h1 style="text-align: center;">Interested in working with us?</h1>
                <span style="color: rgb(104, 101, 101);">Contact the team via email at</span>
                <a class="mail" href="mailto:worktogether@trustedhousesitters.com" rel="noopener"><span class="mail">worktogether@petotel.com</span></a>
                <span style="color: rgb(104, 101, 101);">- we're here to assist you every step of the way.<span>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

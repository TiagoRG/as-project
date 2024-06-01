<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:title" content="Petotel - Services"/>
    <meta property="og:description" content="PETOTEL: Pet care services for your pet's needs and well-being."/>
    <meta property="og:image" content="/favicon.png"/>
    <link rel="icon" href="/favicon.png" type="image/png">
    <title>PETOTEL - Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
</head>

<body>
@include('layout.header')
<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Services</h2>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;"
                                   src="img/services/clipboard-image.png" width="414" height="200">
                <h4>Hire a pet sitter</h4>
                <div class="card-body p-4" style="margin-bottom: 68px;padding-bottom: 0px;margin-left: 0px;">
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                                             src="img/services/clipboard-image-1.png">
                        <div>
                            <p class="fw-bold mb-0">John Doe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;padding-bottom: 0px;margin-bottom: 22px;"
                                   src="img/services/clipboard-image-2.png">
                <h4>Dog walking</h4>
                <div class="card-body p-4" style="margin-bottom: 71px;">
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                                             src="img/services/clipboard-image-3.png">
                        <div>
                            <p class="fw-bold mb-0">John Smith</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;margin-bottom: 25px;" src="img/services/clipboard-image-4.png">
                <h4>Dog grooming</h4>
                <div class="card-body p-4" style="margin-bottom: 66px;">
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                                             src="img/services/clipboard-image-5.png">
                        <div>
                            <p class="fw-bold mb-0">John Wick</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;"
                                   src="img/services/clipboard-image-6.png" width="414" height="200">
                <h4>Dog grooming</h4>
                <div class="card-body p-4" style="margin-bottom: 68px;padding-bottom: 0px;margin-left: 0px;">
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                                             src="img/services/clipboard-image-7.png">
                        <div>
                            <p class="fw-bold mb-0">Joel Smith</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;padding-bottom: 0px;margin-bottom: 22px;"
                                   src="img/services/clipboard-image-10.png">
                <h4>Pet walking</h4>
                <div class="card-body p-4" style="margin-bottom: 71px;">
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                                             src="img/services/clipboard-image-11.png">
                        <div>
                            <p class="fw-bold mb-0">Joseph</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"><img class="card-img-top w-100 d-block fit-cover"
                                   style="height: 200px;margin-bottom: 25px;" src="img/services/clipboard-image-8.png">
                <h4>Pet sitter</h4>
                <div class="card-body p-4" style="margin-bottom: 66px;">
                    <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                                             src="img/services/clipboard-image-9.png">
                        <div>
                            <p class="fw-bold mb-0">Leo Wick</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/services.js"></script>
</body>
</html>

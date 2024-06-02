<!DOCTYPE html>
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
            <div class="card">
                <button class="btn btn-light" type="button" data-bs-toggle="modal"
                        data-bs-target="#serviceModal" data-service-id="1" data-service-name="Pet sitting"
                        data-service-provider="John Doe"
                        data-service-description="Hire John Doe to take care of your pet while you are away.">
                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;" src="img/services/clipboard-image.png" width="414" height="200">
                    <h4>Pet sitting</h4>
                    <div class="card-body p-4" style="margin-bottom: 0px;padding-bottom: 0px;margin-left: 0px;">
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="img/services/clipboard-image-1.png">
                            <div>
                                <p class="fw-bold mb-0">John Doe</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <button class="btn btn-light" type="button" data-bs-toggle="modal"
                        data-bs-target="#serviceModal" data-service-id="1" data-service-name="Dog walking"
                        data-service-provider="John Smith"
                        data-service-description="Hire John Smith to walk your dog while you're at work.">
                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;" src="img/services/clipboard-image-2.png" width="414" height="200">
                    <h4>Dog walking</h4>
                    <div class="card-body p-4" style="margin-bottom: 0px;padding-bottom: 0px;margin-left: 0px;">
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="img/services/clipboard-image-3.png">
                            <div>
                                <p class="fw-bold mb-0">John Smith</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <button class="btn btn-light" type="button" data-bs-toggle="modal"
                        data-bs-target="#serviceModal" data-service-id="1" data-service-name="Dog grooming"
                        data-service-provider="John Wick"
                        data-service-description="Hire John Wick to groom your dog.">
                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;" src="img/services/clipboard-image-4.png" width="414" height="200">
                    <h4>Dog grooming</h4>
                    <div class="card-body p-4" style="margin-bottom: 0px;padding-bottom: 0px;margin-left: 0px;">
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="img/services/clipboard-image-5.png">
                            <div>
                                <p class="fw-bold mb-0">John Wick</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card">
                <button class="btn btn-light" type="button" data-bs-toggle="modal"
                        data-bs-target="#serviceModal" data-service-id="1" data-service-name="Pet grooming"
                        data-service-provider="Joel Smith"
                        data-service-description="Hire Joel Smith to groom your pets.">
                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;" src="img/services/clipboard-image-6.png" width="414" height="200">
                    <h4>Pet grooming</h4>
                    <div class="card-body p-4" style="margin-bottom: 0px;padding-bottom: 0px;margin-left: 0px;">
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="img/services/clipboard-image-7.png">
                            <div>
                                <p class="fw-bold mb-0">Joel Smith</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <button class="btn btn-light" type="button" data-bs-toggle="modal"
                        data-bs-target="#serviceModal" data-service-id="1" data-service-name="Pet walking"
                        data-service-provider="Joseph"
                        data-service-description="Hire Joseph to walk your pets.">
                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;" src="img/services/clipboard-image-10.png" width="414" height="200">
                    <h4>Pet walking</h4>
                    <div class="card-body p-4" style="margin-bottom: 0px;padding-bottom: 0px;margin-left: 0px;">
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="img/services/clipboard-image-11.png">
                            <div>
                                <p class="fw-bold mb-0">Joseph</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <button class="btn btn-light" type="button" data-bs-toggle="modal"
                        data-bs-target="#serviceModal" data-service-id="1" data-service-name="Pet walking"
                        data-service-provider="Leo Wick"
                        data-service-description="Hire Leo Wick to walk your pets.">
                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;padding-bottom: 0px;padding-right: 0px;margin-bottom: 26px;" src="img/services/clipboard-image-8.png" width="414" height="200">
                    <h4>Pet walking</h4>
                    <div class="card-body p-4" style="margin-bottom: 0px;padding-bottom: 0px;margin-left: 0px;">
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="img/services/clipboard-image-9.png">
                            <div>
                                <p class="fw-bold mb-0">Leo Wick</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('book-service') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="serviceModalLabel">Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="serviceModalName" name="service" class="styled-input name-input" readonly/>
                    <input id="serviceModalProvider" name="provider" class="styled-input" readonly/>
                    <input id="serviceModalDescription" name="description" class="styled-input" readonly/>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Book</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('error') }}
                @if(session('error') == 'You have already booked that service!')
                    <br>You can see your booking in the <a href="/requests">My Requests</a> page.
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/services.js"></script>
<script>
@if (session('error'))
    var myModal = new bootstrap.Modal(document.getElementById('errorModal'), {});
    myModal.show();
@endif
@if (session('status'))
    var myModal = new bootstrap.Modal(document.getElementById('statusModal'), {});
    myModal.show();
@endif
</script>
</body>
</html>

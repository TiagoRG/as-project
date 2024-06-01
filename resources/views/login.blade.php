<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:title" content="Petotel - Login"/>
    <meta property="og:description" content="PETOTEL: Pet care services for your pet's needs and well-being."/>
    <meta property="og:image" content="/favicon.png"/>
    <link rel="icon" href="/favicon.png" type="image/png">
    <title>PETOTEL - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xxl-5">
            <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            <h2><span style="color: rgb(11, 94, 215);">Login</span></h2>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-xl-4 col-xxl-10">
                            <div class="card mb-5">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"></path>
                                        </svg>
                                    </div>
                                    <form class="text-center" method="post" action="{{ route('login.submit') }}">
                                        @csrf
                                        <div class="mb-3"><input class="form-control" type="email" name="email"
                                                                 placeholder="Email"></div>
                                        <div class="mb-3"><input class="form-control" type="password" name="password"
                                                                 placeholder="Password"></div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-block w-100" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <picture><img src="img/login/clipboard-image.png" id="mainpicture"></picture>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('mainpicture').style.width = `${window.innerWidth / 2}`;
    document.getElementById('mainpicture').style.height = `${window.innerHeight}`;
    document.body.style.overflow = 'hidden';
</script>
</body>

</html>

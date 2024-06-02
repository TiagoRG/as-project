<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:title" content="Petotel - SignUp"/>
    <meta property="og:description" content="PETOTEL: Pet care services for your pet's needs and well-being."/>
    <meta property="og:image" content="/favicon.png"/>
    <link rel="icon" href="/favicon.png" type="image/png">
    <title>PETOTEL - SignUp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>

<body style="background: url(&quot;img/login/clipboard-image.png&quot;)">
<div class="container" style="margin-top:50px">
    <div class="row d-flex justify-content-center" style="margin-top: 15%">
        <div class="col-md-6 col-xl-4 col-xxl-4">
            <div class="card mb-5">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                             fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"></path>
                        </svg>
                    </div>
                    <div class="row w-100">
                        <form class="text-center" method="post" action="{{ route('signup.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="text" name="username" placeholder="Name" id="signup-name" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="email" placeholder="Email" id="signup-email" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" required>
                            </div>
                            <small>
                                <input type="checkbox" required/>
                                <span style="color: rgb(0, 0, 0);">&nbsp;I accept the </span>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions.</a>
                            </small>
                            <div class="mb-3"></div>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-primary d-block w-100" type="submit">Register</button>
                                </div>
                                <div class="col">
                                    <a href="/" style="text-decoration: none">
                                        <button class="btn btn-secondary d-block w-100" type="button">Home</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <script>
                            @if(session('name'))
                                document.getElementById('signup-name').value = "{{ session('name') }}";
                            @endif
                            @if(session('email'))
                                document.getElementById('signup-email').value = "{{ session('email') }}";
                            @endif
                        </script>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-xxl-15">
                            <h6><span style="color: rgb(55, 100, 146);">Already have an account?&nbsp; &nbsp;</span><a href="/login"><span style="color: rgb(11, 94, 215);">Sign in</span></a></h6>
                        </div>
                    </div>
                    @if(session('inputError'))
                        <div class="alert alert-danger" role="alert" style="margin-top:20px">
                            {{ session('inputError') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.terms')
<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('error') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.body.style.overflow = 'hidden';
    @if (session('error'))
        var myModal = new bootstrap.Modal(document.getElementById('errorModal'), {});
        myModal.show();
    @endif
</script>
</body>
</html>

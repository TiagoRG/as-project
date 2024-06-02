<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
@include('layout.header')
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Requests</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pet Sitter</h4>
                        <strong>Service provider: Leo Wick</strong>
                        <p>Status: In Progress</p>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Dog Walking</h4>
                        <strong>Service provider: John Smith</strong>
                        <p>Status: Completed</p>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Dog Grooming</h4>
                        <strong>Service provider: John Wick</strong>
                        <p>Status: Completed</p>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Dog Walking</h4>
                        <strong>Service provider: John Doe</strong>
                        <p>Status: Completed</p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layout.footer')
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

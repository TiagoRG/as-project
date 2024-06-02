<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Petotel - My Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
@include('layout.header')
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>My Requests</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if(count($requests) == 0)
                        <div class="card-body">
                            <h4 class="card-title">No requests found</h4>
                            <p class="card-text">You have not made any requests yet.</p>
                        </div>
                    @else
                        @foreach($requests as $request)
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="card-body">
                                        @if($request[4] == 'Active')
                                        <form id="cancelServiceForm" method="POST" action="{{ route('requests.cancel') }}">
                                        @else
                                        <form id="dismissServiceForm" method="POST" action="{{ route('requests.dismiss') }}">
                                        @endif
                                            @csrf
                                            <input type="hidden" name="requestId" value="{{ $request[5] }}">
                                        </form>
                                        <h4 class="card-title">{{ $request[0] }}</h4>
                                        <strong>Service provider: {{ $request[1] }}</strong>
                                        <p>Service description: {{ $request[2] }}</p>
                                        <p>Status: {{ $request[4] }}</p>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                                <div class="col-md-2" style="display: flex; align-items: center">
                                    @if($request[4] == 'Active')
                                    <a class="btn btn-danger" href="#" onclick="document.getElementById('cancelServiceForm').submit()">Cancel service</a>
                                    @elseif($request[4] == 'Cancelled')
                                    <a class="btn btn-secondary" href="#" onclick="document.getElementById('dismissServiceForm').submit()">Dismiss service</a>
                                    @endif
                                </div>
                            </div>
                            @if(count($requests) > 1 && !$loop->last)
                                <hr style="padding: 0; margin:0">
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    @if (session('status'))
    var myModal = new bootstrap.Modal(document.getElementById('statusModal'), {});
    myModal.show();
    @endif
</script>
</body>
</html>

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
            <h2>User Profile</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" style="padding-left: 20px"
                                     fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body" style="padding-top: 50px">
                                <h4 class="card-title">User Information</h4>
                                <p class="card-text">Name: {{ $_COOKIE['username'] }}</p>
                                <p class="card-text">Email: {{ $_COOKIE['email'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 50px"></div>
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>My Requests</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 10px 25px 0 20px">
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
                                <div class="col-md-2" style="display: block; align-items: center; text-align: center">
                                    @if($request[4] == 'Active')
                                    <div style="height: 20%"></div>
                                    <a class="btn btn-primary" href="#" id="messagingBtn-{{ $request[1] }}" style="width: 165px">Message provider</a>
                                    <div style="height: 15px"></div>
                                    <a class="btn btn-danger" href="#" onclick="document.getElementById('cancelServiceForm').submit()" style="width: 165px">Cancel service</a>
                                    @elseif($request[4] == 'Cancelled')
                                    <div style="height: 35%"></div>
                                    <a class="btn btn-secondary" href="#" onclick="document.getElementById('dismissServiceForm').submit()" style="width: 165px">Dismiss service</a>
                                    @endif
                                </div>
                            </div>
                            @if(count($requests) > 1 && !$loop->last)
                                <hr style="padding: 0 0 10px 0; margin:0">
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
<!-- Chat Modal -->
@foreach($requests as $request)
    <div class="modal fade" id="chatModal-{{ $request[1] }}" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel-{{ $request[1] }}"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 10px">
                        Note: This is a demo chat. Messages will not be saved between sessions.
                    </div>
                    <div id="chatMessages-{{ $request[1] }}" style="height: 400px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                        <!-- Messages will be appended here -->
                    </div>
                    <input type="text" id="chatInput-{{ $request[1] }}" class="form-control" placeholder="Type your message here...">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendMessageButton-{{ $request[1] }}">Send Message</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
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
    document.querySelectorAll('[id^="messagingBtn"]').forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default action (navigation) of the click
            let providerName = item.id.split('-')[1];
            let chatModal = new bootstrap.Modal(document.getElementById('chatModal-' + providerName), {});
            document.getElementById('chatModalLabel-' + providerName).innerHTML = 'Chat with ' + providerName;
            chatModal.show();

            let chatMessages = document.getElementById('chatMessages-' + providerName);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    });

    function sendMessage(providerName) {
        let chatInput = document.getElementById('chatInput-' + providerName);
        let chatMessages = document.getElementById('chatMessages-' + providerName);

        if (chatInput.value.trim() !== '') {
            var newMessage = document.createElement('p');
            newMessage.textContent = '{{ $_COOKIE['username'] }}: ' + chatInput.value;
            chatMessages.appendChild(newMessage);

            // Clear the input field
            chatInput.value = '';

            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    }

    document.querySelectorAll('[id^="sendMessageButton"]').forEach(item => {
        let providerName = item.id.split('-')[1];
        item.addEventListener('click', function() {
            sendMessage(providerName);
        });
    });

    document.querySelectorAll('[id^="chatInput"]').forEach(item => {
        let providerName = item.id.split('-')[1];
        item.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                sendMessage(providerName);
            }
        });
    });

    @if (session('status'))
    let myModal = new bootstrap.Modal(document.getElementById('statusModal'), {});
    myModal.show();
    @endif
</script>
</body>
</html>

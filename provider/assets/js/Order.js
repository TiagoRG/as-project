import { openDb, DB_STORE_NAME, DB_STORE_NAME_2, DB_STORE_NAME_3, DB_STORE_NAME_4} from './dataBase.js';

var db;
var orderId;

// Function to display messages in the chat
function showMessage() {
    // Create a read-only transaction
    let transaction = db.transaction([DB_STORE_NAME_4], "readonly");
    let messageStore = transaction.objectStore(DB_STORE_NAME_4);
    let indexOrder_id = messageStore.index("order_id");
    const cursorRequest = indexOrder_id.openCursor(orderId);
    let chatContent = "";

    cursorRequest.onsuccess = e => {
        const cursor = e.target.result;
        if (cursor) {
            var message = cursor.value;
            chatContent += ' <div class="comment mt-4 text-justify"> <h4 class="fs-5 fw-semibold text-dark" style="margin-bottom: -1px;">' + message.name + '</h4>' +
                            '<div><p class="text-body" style="margin-bottom: -1px;background: var(--bs-card-border-color);">' + message.messageContent +
                            '</p><span class="fw-light align-self-start" style="padding-left: 0px;padding-bottom: 0px;margin-bottom: -3px;font-size: 12px;padding-top: 0px;margin-top: 4px;">-' + message.timestamp + '</span>'+
                            '</div><hr style="padding-bottom: 0px;margin-top: 4px;" /></div>';
            cursor.continue();
        }
        document.getElementById("chatContent").innerHTML = chatContent; // Update the chat content on the page
    };
}
//Function to handle the change event of a <select> element.
//sel - The <select> element triggering the function.
function selectChange(sel) {
    let newStatus = sel.value;
    let orderIdSel = parseInt(sel.getAttribute('select-orderid'));

    let transaction = db.transaction([DB_STORE_NAME_3], 'readwrite');
    let  objectStore = transaction.objectStore(DB_STORE_NAME_3);

    // Get the order with the specified ID from the object store
    let  request = objectStore.get(orderIdSel);

    request.onsuccess = function(event) {
        // Update the <select> element with the new status options
        let order = event.target.result;
        order.status = newStatus;
        let  updateRequest = objectStore.put(order);

        updateRequest.onsuccess = function(event) {
            var selectElement = document.getElementById('statusSelect-' + orderIdSel);
            selectElement.innerHTML ='';
            selectElement.innerHTML = getStatusOptions(newStatus, order.paymentStatus);
        };
        updateRequest.onerror = function(event) {console.error("Error updating order status:", event.target.error);};
    };

    request.onerror = function(event) {console.error("Error getting order details:", event.target.error);};
}

// Generates HTML option elements based on the current status and payment status.
// currentStatus - The current status of the order.
// paymentStatus - The payment status of the order.
//  returns      - HTML string representing the option elements.
function getStatusOptions(currentStatus, paymentStatus) {
    switch (currentStatus) {
        case 'Pending':
            return '<option value="Pending"selected hidden>Pending</option><option value="Accept">Accept</option><option value="Reject">Reject</option>';
        case 'Accept':
            if (paymentStatus === 'Paid') {
                return '<option value="Accept" selected hidden>Accept</option><option value="Processing">Processing</option>';
            } else if (paymentStatus === 'UnPaid') {
                return '<option value="Accept" selected hidden>Accept</option><option value="Reject">Reject</option>';
            }
            break;
        case 'Processing':
            return '<option value="Processing" selected hidden>Processing</option><option value="Done">Done</option>';
        case 'Done':
            return '<option value="Done" selected hidden>Done</option>'
        default:
            return '<option value="Reject" selected hidden>Reject</option>';
    }
}

// To search and filter items
// Loop through all table rows, hide those who don't match the search 
function search() {
  var input, filter, table, tr, td, i, txtValue;
    
  // Extract data
  input = document.getElementById("searchId"); 
  filter = input.value.toUpperCase();
  table = document.getElementById("tableOrders");
  tr = table.getElementsByTagName("tr");

   
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2]; // Get the third cell (Services) of the current row
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) { // Check if it contains the filter text
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

//an event listener that triggers when the page finishes loading (fill data in the table)
document.addEventListener('DOMContentLoaded', function() {

    // If there is no active session, redirects to the login page
    var sessionId = sessionStorage.getItem('sessionId');
    if (!sessionId) {window.location.href = '/login.html';}

    openDb().then(database => {
    db = database; 
    // Create a read-only transaction
    let transaction = db.transaction([DB_STORE_NAME_3], 'readonly');
    let orderStore = transaction.objectStore(DB_STORE_NAME_3);
    let tableBody = document.querySelector('.table tbody');
    
    // Cleans the table before adding new data
    tableBody.innerHTML = '';
    if (tableBody.innerHTML.trim() === '') {
         // Create a header in the table
        tableBody.innerHTML = '<tr>' +
            '<th>Order ID</th>' +
            '<th>Client Name</th>' +
            '<th>Service</th>' +
            '<th>Date</th>' +
            '<th>Payment Status</th>' +
            '<th class="order-status">Status</th>' +
            '<th>Action</th>' +
            '</tr>';}

    // Opens a cursor to iterate over data in the object store
    let index = orderStore.index("emailProvider");
    index.openCursor(sessionId).onsuccess = function(event) {
    var cursor = event.target.result;

        if (cursor) { 
            // Cursor data
            var orderId = cursor.value.id;
            var clientName = cursor.value.nameCustomer;
            var serviceName = cursor.value.nameService;
            var date = cursor.value.startDate;
            var paymentStatus = cursor.value.paymentStatus;
            var status = cursor.value.status;

            // Create a new row in the table
            var newRow = document.createElement('tr');
            newRow.setAttribute('data-order-id', orderId);
            newRow.innerHTML = '<td>' + orderId + '</td>' +
                '<td>' + clientName + '</td>' +
                '<td>' + serviceName + '</td>' +
                '<td>' + date + '</td>' +
                '<td>' + paymentStatus + '</td>' +
                '<td id="orderStatus-' + orderId + '"></td>' +
                '<a class="btn btn-flat primary semicircle" role="button" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" data-order-id="' + orderId + '"><i class="far fa-eye"></i></a>'+
                '<a class="btn btn-flat success semicircle" role="button"  data-bs-toggle="modal" data-bs-target="#chatModal" data-order-id="' + orderId + '"><i class="far fa-comment"></i></a>';
            tableBody.appendChild(newRow);

            // Create and fill the select with status options
           // Create and fill the select with status options
           var selectElement = document.createElement('select');
           selectElement.classList.add('form-select');
           selectElement.id = 'statusSelect-' + orderId;
           selectElement.setAttribute('select-orderid', orderId);
         //  selectElement.setAttribute('onchange', 'Func(this)');
           selectElement.innerHTML = getStatusOptions(status, cursor.value.paymentStatus); // Function to fill in the options
           document.getElementById('orderStatus-' + orderId).appendChild(selectElement);
           //to next record
           cursor.continue();

           //the event listener for the <select> change
            var selectElements = document.querySelectorAll('.form-select');
            selectElements.forEach(function(selectElement) {
                selectElement.addEventListener('change', function(e) {
                   // console.log("change Select");
                    selectChange(e.target);
        });
    });
        }
    };
}).catch(error => {console.error("Error opening database:", error);});

});


// Get the order details
document.getElementById('orderDetailsModal').addEventListener('show.bs.modal', function(event) {

    // Create a read-only transaction
    let transaction = db.transaction([DB_STORE_NAME_3], 'readonly');
    let orderStore = transaction.objectStore(DB_STORE_NAME_3);
    let orderId = event.relatedTarget.getAttribute('data-order-id'); // Get the orderId from the data-order-id attribute of the modal trigger button
    let request = orderStore.get(parseInt(orderId));

    request.onsuccess = function(event) {
        var order = event.target.result;

        if (order) {
            document.getElementById('clientNameModal').value = order.nameCustomer;
            document.getElementById('clientEmailModal').value = order.emailCustomer;
            document.getElementById('clientNumberModal').value = order.numberCustomer;
            document.getElementById('serviceNameModal').value = order.nameService;
            document.getElementById('startDateModal').value = order.startDate;
            document.getElementById('endDateModal').value = order.endDate;
            document.getElementById('expectedPriceModal').value = order.expectedPrice;
            document.getElementById('descriptionModal').value = order.description;
        } else {console.error("Pedido não encontrado com o ID:", orderId);}};

});


// Get the message content
document.getElementById('chatModal').addEventListener('show.bs.modal', function(event) 
{
    orderId = parseInt(event.relatedTarget.getAttribute('data-order-id'));
    showMessage();
});

// Add the new message
document.getElementById("sendButton").addEventListener("click", function() {

    var messageInput = document.getElementById("messageInput").value;
    var currentDate = new Date().toDateString();

    if (messageInput.trim() === "") {alert("Please enter a message.");return;}

    // Create a read-only transaction
    let transaction = db.transaction(DB_STORE_NAME, 'readonly');
    let objectStore = transaction.objectStore(DB_STORE_NAME);

    // Get provider name from the database using the email address
    var email = sessionStorage.getItem('sessionId');
    let request = objectStore.get(email);

    request.onsuccess = function(e) {
        //console.log(e.target.result.first_name);

        let providerName = [e.target.result.first_name, e.target.result.last_name].join(" ");

        var newMessage = {
            nameProvider: providerName,
            name: providerName,
            order_id: orderId,
            messageContent: messageInput,
            timestamp: currentDate};

        // Create a read-write transaction
        let transaction = db.transaction([DB_STORE_NAME_4], "readwrite");
        let messageStore = transaction.objectStore(DB_STORE_NAME_4);

        let req = messageStore.add(newMessage);

        req.onsuccess = function(event) {
            console.log("Message added to database.");
            showMessage(); // Update the chat to display the newly added message
        };

        req.onerror = function(event) {console.error("Error adding message to database:", event.target.error);};
        document.getElementById("messageInput").value = "";};
        });

// Add click event listener for a search bar
document.getElementById('searchId').addEventListener('keyup', search);
// Handle log out button click
document.getElementById('logOut').addEventListener('click', function(event) {
    event.preventDefault();  
    sessionStorage.removeItem("sessionId");
    window.location.href = '/login.html';
});

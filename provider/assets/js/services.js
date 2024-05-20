import { openDb, DB_STORE_NAME, DB_STORE_NAME_2, DB_STORE_NAME_3, DB_STORE_NAME_4, DB_STORE_NAME_5,DB_STORE_NAME_6,DB_STORE_NAME_7} from './dataBase.js';
var serviceId;
var db;
var serviceIdDel;



// Function to fill data in the table
document.addEventListener('DOMContentLoaded',function() {
    // If there is no active session, redirects to the login page
    var sessionId = sessionStorage.getItem('sessionId');
    if (!sessionId) {window.location.href = '/login.html';}

    openDb().then(database => {
        db = database; // Perform operations using the db object
         serviceDisplay();
    }).catch(error => {console.error("Error opening database:", error);});
});


// Function to get the image file from an input field
function getFileFromInput() {
    const input = document.getElementById('serviceImage');
    const file = input.files[0];
    console.log('obtained successfully:', file);
    return file;
}

// Function to add a new service
function addService() {
  
    let serviceName = document.getElementById('serviceName').value;
    let serviceDetails = document.getElementById('serviceDetails').value;
    let servicePrice = document.getElementById('servicePrice').value;
    let serviceCategory = document.getElementById('serviceCategory').value;
    let serviceType = document.getElementById('serviceType').value;

    // Check if all mandatory fields have been filled in
    if (!serviceName || !serviceDetails || !serviceCategory || !serviceType) {
        alert("Please fill in all required fields.");
        return;}

    // Get the image
    let file = getFileFromInput();
    // Create a readwrite transaction
    let transaction = db.transaction([DB_STORE_NAME_2], 'readwrite');
    let serviceStore = transaction.objectStore(DB_STORE_NAME_2);

    var newService = {
        provider: sessionStorage.getItem('sessionId'),
        serviceName: serviceName,
        serviceDetails: serviceDetails,
        servicePrice: servicePrice,
        serviceCategory: serviceCategory,
        serviceType: serviceType,
        image: file
    };

    var request = serviceStore.add(newService);

    request.onsuccess = function(event) {
        console.log('service added to the database');

        // Clear form input fields after adding the service 
        document.getElementById('serviceName').value = '';
        document.getElementById('serviceDetails').value = '';
        document.getElementById('servicePrice').value = '';
        document.getElementById('serviceCategory').value = '';
        document.getElementById('serviceType').value = '';
        document.getElementById('serviceImage').value = '';
        serviceDisplay();
    };

    request.onerror = function(event) {
        console.error('Error adding new service:', event.target.error);
        alert('Failed to add the service due to a server error. Please try again later.');
    };
}


// Function to display services on the page
function serviceDisplay(){

    
    if (!db) {console.error("Database is not initialized.");return;}
    // Create a read-only transaction
    let transaction = db.transaction([DB_STORE_NAME_2], 'readonly');
    let serviceStore = transaction.objectStore(DB_STORE_NAME_2);

    var serviceContainer = document.getElementById("ServiceContainer");
    serviceContainer.innerHTML = '';

    // Opens a cursor to iterate over data in the object store
    let index = serviceStore.index("provider");
    let sessionId = sessionStorage.getItem('sessionId');
    index.openCursor(sessionId).onsuccess = function(event) {
        var cursor = event.target.result;

        if (cursor) { 
 
            var divCol = document.createElement('div');
            divCol.classList.add('col-lg-4', 'mb-4');

            var card = document.createElement('div');
            card.classList.add('card');
            

            const imageBuffer = cursor.value.image;
            const imageBlog = new Blob([imageBuffer]);
            
            var img = document.createElement('img');
            img.classList.add('card-img-top');
            img.alt = cursor.value.serviceName;
            img.src = URL.createObjectURL(imageBlog);      
            card.appendChild(img);

            var cardBody = document.createElement('div');
            cardBody.classList.add('card-body');

            var title = document.createElement('h5');
            title.classList.add('card-title');
            title.textContent = cursor.value.serviceName;
            cardBody.appendChild(title);

            var hr = document.createElement('hr');
            cardBody.appendChild(hr);

            var description = document.createElement('p');
            description.classList.add('card-text');
            description.textContent = cursor.value.serviceDetails;
            cardBody.appendChild(description);

            var buttonContainer = document.createElement('div');
            buttonContainer.classList.add('container', 'd-flex', 'justify-content-center', 'align-items-center', 'align-content-center', 'align-items-sm-center');
            buttonContainer.style.padding = '0';
            buttonContainer.style.marginRight = '-1px';
            buttonContainer.style.paddingBottom = '0';
            buttonContainer.style.gap = '55px';
            var updateButton = document.createElement('button');
            updateButton.classList.add('btn', 'btn-outline-success', 'btn-sm');
            updateButton.type = 'button';
            updateButton.textContent = 'Read More';
            updateButton.setAttribute('data-bs-toggle', 'modal');
            updateButton.setAttribute('data-bs-target', '#ServiceDetailsModal');
            updateButton.setAttribute('service-id', cursor.value.id);
            
            var deleteButton = document.createElement('button');
            deleteButton.classList.add('btn', 'btn-outline-danger', 'btn-sm');
            deleteButton.type = 'button';
            deleteButton.textContent = 'DELETE';
            deleteButton.setAttribute('data-bs-toggle', 'modal');
            deleteButton.setAttribute('data-bs-target', '#confirmationModal');
            deleteButton.setAttribute('service-id', cursor.value.id);

            buttonContainer.appendChild(updateButton);
            buttonContainer.appendChild(deleteButton);

            cardBody.appendChild(buttonContainer);
            card.appendChild(cardBody);
            divCol.appendChild(card);
            serviceContainer.appendChild(divCol);

            cursor.continue();
        }
    };}

// Function to enable editing of form fields
function change() {

    document.getElementById('saveChange').removeAttribute('hidden');
    document.getElementById('editChange').setAttribute('hidden', true);

    document.getElementById('serviceTypeModal').removeAttribute('disabled');
    document.getElementById('serviceCategoryModal').removeAttribute('disabled');
    document.getElementById('changeImage').setAttribute('style', 'display: block;');

    var formControls = document.querySelectorAll('.form-control');
    formControls.forEach(function(element) {
        element.removeAttribute('readonly');});
}
// Function to disable editing of form fields
function changeSave() {
    document.getElementById('editChange').removeAttribute('hidden');
    document.getElementById('saveChange').setAttribute('hidden', 'true');

    document.getElementById('serviceTypeModal').setAttribute('disabled', 'true');
    document.getElementById('serviceCategoryModal').setAttribute('disabled', 'true'); 
    document.getElementById('changeImage').setAttribute('style', 'display: none');

    var formControls = document.querySelectorAll('.form-control');
    formControls.forEach(function(element) {
        element.setAttribute('readonly', 'true');
    });
}


// Add click event listener for the button 'save service'
document.getElementById('SaveService').addEventListener('click', addService);

// display service details in the modal
document.getElementById('ServiceDetailsModal').addEventListener('show.bs.modal', function(event) {
    // Get the orderId from the data-order-id attribute of the modal trigger button
     serviceId = event.relatedTarget.getAttribute('service-id');
    //console.log(event.relatedTarget.getAttribute('service-id'));
 
        let transaction = db.transaction([DB_STORE_NAME_2], 'readwrite');
        let serviceStore = transaction.objectStore(DB_STORE_NAME_2);
    
        let request = serviceStore.get(parseInt(serviceId));

        request.onsuccess = function(event) {
            let service = event.target.result;

            if (service) {
                document.getElementById('serviceNameModal').value = service.serviceName;
                document.getElementById('servicePriceModal').value = service.servicePrice;
                document.getElementById('serviceCategoryModal').value = service.serviceCategory;
                document.getElementById('serviceTypeModal').value = service.serviceType;
                document.getElementById('serviceDetailsModal').value = service.serviceDetails;     
            } else {
                console.error("Service não encontrado com o ID:", orderId);
            }
        };
});

// Function to save the details of the service in the modal
document.getElementById('saveChange').addEventListener('click',function(event) {


    let transaction = db.transaction([DB_STORE_NAME_2], 'readwrite');
    let serviceStore = transaction.objectStore(DB_STORE_NAME_2);
    let request = serviceStore.get(parseInt(serviceId));

    request.onsuccess = function(event) {
        let service = event.target.result;

        if (service) {
            // Retrieve the file input
            var changeImg = document.getElementById('serviceImageModal');

            // Check if a new file is selected
            if (changeImg && changeImg.files.length > 0) {var file = changeImg.files[0]; service.image = file;}

            // Update service properties
            service.serviceName = document.getElementById('serviceNameModal').value;
            service.servicePrice = document.getElementById('servicePriceModal').value;
            service.serviceCategory = document.getElementById('serviceCategoryModal').value;
            service.serviceType = document.getElementById('serviceTypeModal').value;
            service.serviceDetails = document.getElementById('serviceDetailsModal').value;

            // Check if all mandatory fields have been filled in
            if (!service.serviceName || !service.serviceDetails || !service.serviceCategory || !service.serviceType) {
                alert("Please fill in all required fields.");
                return;}

            var updateRequest = serviceStore.put(service);
            updateRequest.onsuccess = function(event) {
                console.log('Service updated successfully');
                changeSave();
                // Refresh the display
               // serviceDisplay();
            };

            updateRequest.onerror = function(event) {console.error('Error updating service:', event.target.error);alert("Error updating service");};
        } else {console.error("Service not found with ID:", serviceId);}};

    request.onerror = function(event) {console.error('Error getting service:', event.target.error);};
});
document.getElementById('editChange').addEventListener('click',change);

// Function to save Service_id
document.getElementById('confirmationModal').addEventListener('show.bs.modal', function(event) {
    
     serviceIdDel = event.relatedTarget.getAttribute('service-id');
    //console.log(serviceId);

   });
// Function to delete the service
document.getElementById('DeleteService').addEventListener('click', function(event){

    let transaction = db.transaction([DB_STORE_NAME_2], 'readwrite');
    let serviceStore = transaction.objectStore(DB_STORE_NAME_2);
    let request = serviceStore.delete(parseInt(serviceIdDel));
    request.onsuccess = function(event){serviceDisplay();};});

// Handle log out button click
document.getElementById('logOut').addEventListener('click', function(event) {
    event.preventDefault();  
    sessionStorage.removeItem("sessionId");
    window.location.href = '/login.html';
});

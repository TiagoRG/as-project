import { openDb, DB_STORE_NAME, DB_STORE_NAME_2, DB_STORE_NAME_3, DB_STORE_NAME_4, DB_STORE_NAME_5,DB_STORE_NAME_6,DB_STORE_NAME_7} from './dataBase.js';
var db;

document.addEventListener('DOMContentLoaded', function() {
    
    // If there is no active session, redirects to the login page
    var sessionId = sessionStorage.getItem('sessionId');
    if (!sessionId) {window.location.href = '/login.html';}


     // Establish IndexedDB connection
    openDb().then(database => {
        db = database;
    }).catch(error => { console.error("Error opening database:", error);});

});

// Access form
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Extract form data
    var name = document.getElementById('name-1').value;
    var email = document.getElementById('email-1').value;
    var message = document.getElementById('message-1').value;

    var transaction = db.transaction(['contactUs'], 'readwrite'); 
    var store = transaction.objectStore('contactUs');

    var data = {
        name: name,
        email: email,
        message: message};

    var addRequest = store.add(data);
    addRequest.onsuccess = function(event){console.log('Data added successfully to IndexedDB'); showAlert(); document.getElementById("contactForm").reset();};
    addRequest.onerror = function(event) {console.error('Error adding data to IndexedDB:', event.target.error);};});


// Function to display a success alert (implementation details may change)
function showAlert(){alert("Your message has been successfully sent.");}

// Handle log out button click
document.getElementById('logOut').addEventListener('click', function(event) {
    event.preventDefault();  
    sessionStorage.removeItem("sessionId");
    window.location.href = '/login.html';});

// Add an event listener for beforeunload to close the database connection
window.addEventListener('beforeunload', function() {
    if (db) {
        db.close();
        console.log("Database connection closed.");
    }
});
import { openDb, DB_STORE_NAME, DB_STORE_NAME_2, DB_STORE_NAME_3, DB_STORE_NAME_4, DB_STORE_NAME_5,DB_STORE_NAME_6,DB_STORE_NAME_7} from './dataBase.js';
var db;

// Function to execute when the page content is loaded
document.addEventListener('DOMContentLoaded', function() {

    // If there is no active session, redirects to the login page
    var sessionId = sessionStorage.getItem('sessionId');
    if (!sessionId) {window.location.href = '/login.html';}

    openDb().then(database => {
        db = database;
    }).catch(error => {console.error("Error opening database:", error);});

});

// Function to enable editing of form fields for image
function changeImg (){
    document.getElementById('saveChangeImg').removeAttribute('hidden');
    document.getElementById('changeImg').setAttribute('hidden', true);

    document.getElementById('changeImgBlock').setAttribute('style', 'display: block;');
    document.getElementById('photoAccount').setAttribute('style', 'display: none');
}
// Function to disable editing of form fields for image
function saveImg(){
    document.getElementById('changeImg').removeAttribute('hidden');
    document.getElementById('saveChangeImg').setAttribute('hidden', true);

    document.getElementById('photoAccount').setAttribute('style', 'display: block;');
    document.getElementById('changeImgBlock').setAttribute('style', 'display: none');
}

// Function to enable editing of form fields for Contact setting
function changeContact() {

    document.getElementById('contactSave').removeAttribute('hidden');
    document.getElementById('contactChange').setAttribute('hidden', true);

    var contactControls = document.querySelectorAll('.contact');
    contactControls.forEach(function(element) {
        element.removeAttribute('readonly');
    });
}
// Function to disable editing of form fields for Contact setting
function saveContact() {
    document.getElementById('contactChange').removeAttribute('hidden');
    document.getElementById('contactSave').setAttribute('hidden', 'true');

    var contactControls = document.querySelectorAll('.contact');
    contactControls.forEach(function(element) {
        element.setAttribute('readonly', 'true');
    });
}

// Function to enable editing of form fields for User setting
function changeUser() {

    document.getElementById('userSave').removeAttribute('hidden');
    document.getElementById('userChange').setAttribute('hidden', true);

    var contactControls = document.querySelectorAll('.user');
    contactControls.forEach(function(element) {
        element.removeAttribute('readonly');
    });
}
// Function to disable editing of form fields for User setting
function saveUser() {
    document.getElementById('userChange').removeAttribute('hidden');
    document.getElementById('userSave').setAttribute('hidden', 'true');

    var contactControls = document.querySelectorAll('.user');
    contactControls.forEach(function(element) {
        element.setAttribute('readonly', 'true');
    });
}

// Add click event listener for the button 'change image'
document.getElementById('changeImg').addEventListener('click', changeImg);
// Add click event listener for the button 'save image'
document.getElementById('saveChangeImg').addEventListener('click', saveImg);
// Add click event listener for the button 'change contacr'
document.getElementById('contactChange').addEventListener('click', changeContact);
// Add click event listener for the button 'save Contact'
document.getElementById('contactSave').addEventListener('click', saveContact);
// Add click event listener for the button 'change user'
document.getElementById('userChange').addEventListener('click', changeUser);
// Add click event listener for the button 'save user'
document.getElementById('userSave').addEventListener('click', saveUser);


// Handle log out button click
document.getElementById('logOut').addEventListener('click', function(event) {
    event.preventDefault();  
    sessionStorage.removeItem("sessionId");
    window.location.href = '/login.html';
});
// Add an event listener for beforeunload to close the database connection
window.addEventListener('beforeunload', function() {
    if (db) {
        db.close();
        console.log("Database connection closed.");
    }
});
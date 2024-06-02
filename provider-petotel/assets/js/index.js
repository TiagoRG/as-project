import { openDb, DB_STORE_NAME, DB_STORE_NAME_2, DB_STORE_NAME_3, DB_STORE_NAME_4, DB_STORE_NAME_5,DB_STORE_NAME_6,DB_STORE_NAME_7} from './dataBase.js';
var db;
// an event listener that triggers when the page finishes loading
document.addEventListener('DOMContentLoaded', function() {
	
	// If there is no active session, redirects to the login page
	var sessionId = sessionStorage.getItem('sessionId');
	if (!sessionId) {window.location.href = '/login.html';}

	openDb().then(database => {db = database;});
});
// Handle log out button click
document.getElementById('logOut').addEventListener('click', function(event) {
		event.preventDefault();
		sessionStorage.removeItem("sessionId");
		window.location.href = '/login.html';
});
// Add an event listener for beforeunload to close the database connection
window.addEventListener('beforeunload', function() {
    if (db) {db.close();console.log("Database connection closed.");}
});
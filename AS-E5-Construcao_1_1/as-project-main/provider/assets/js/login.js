import { openDb, DB_STORE_NAME, DB_STORE_NAME_2, DB_STORE_NAME_3, DB_STORE_NAME_4, DB_STORE_NAME_5,DB_STORE_NAME_6,DB_STORE_NAME_7} from './dataBase.js';
let db;

document.getElementById('submit').addEventListener('click', function(event) {
    event.preventDefault();  // Prevent default form submission behavior

    // Open the database connection using the imported function
    openDb().then(database => {db = database;
    // Create a read-only transaction
    var transaction = db.transaction(DB_STORE_NAME, 'readonly');
    var objectStore = transaction.objectStore(DB_STORE_NAME);

    // Get user data from the database using the email address
    var email = document.getElementById('InputEmail').value;
    var request = objectStore.get(email);

    request.onsuccess = function(event)
    {
        // Check if the email and password match
        var provider = request.result;
        var password = document.getElementById('InputPassword').value;

        if (provider && (provider.password === password)) {
            sessionStorage.setItem('sessionId', email);
            window.location.href = '/index.html';
        } else {alert('Invalid credentials =( Try again ...');}
    };
    request.onerror = function(event) {console.log('Erro:', event.target.errorCode);};})
    .catch(error => {console.error("Error opening database:", error);});

 
});
// Add an event listener for beforeunload to close the database connection
window.addEventListener('beforeunload', function() {
    if (db) {
        db.close();
        console.log("Database connection closed.");
    }
});


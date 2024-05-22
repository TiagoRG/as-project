// Constants defining database name, version, and object store names
const DB_NAME = 'petotel_db';
const DB_VERSION = 1;

const DB_STORE_NAME = 'provider';
const DB_STORE_NAME_2 = 'service';
const DB_STORE_NAME_3 = 'order';
const DB_STORE_NAME_4 = 'message';
const DB_STORE_NAME_5 = 'user';
const DB_STORE_NAME_6 = 'wishlist';
const DB_STORE_NAME_7 = 'contactUs';

// Function to open the indexedDB with the specified name and version
function openDb() {
    return new Promise((resolve, reject) => {

        console.log("openDb ..."); // debug

        const req = indexedDB.open(DB_NAME, DB_VERSION);

        // Handle successful database opening
        req.onsuccess = function (evt) {
            const db = evt.target.result;
            console.log("openDb DONE =)");
            resolve(db);};

        // Handle errors during database opening
        req.onerror = function (evt) {
            console.error("openDb:", evt.target.errorCode);
            reject(evt.target.error);};

        // Handle database upgrades (schema changes)
        req.onupgradeneeded = function (evt) {
            console.log("openDb -> onupgradeneeded"); //debug

            const db = evt.target.result;

            // Create object stores if they don't already exist

            if (!db.objectStoreNames.contains(DB_STORE_NAME)) {
                const providerStore = db.createObjectStore(DB_STORE_NAME, {keyPath : 'email',}); // Use email as key path
                providerStore.createIndex('first_name', 'first_name', { unique: false }); // Index for efficient name search
                const providerData = [ // data for user stories
                    {
                        first_name: "Ana",
                        last_name: "Smith",
                        desription: "I have over the years cared for many pets, my own and friends. I understand how each have their own needs, likes and preferences. Just like us they have a complex range of emotions and need to feel safe.",
                        email:"anaSmith879@gmail.com",
                        address:  "....",
                        city: "Aveiro",
                        country: "Portugal",
                        number: "+923456789",
                        imgProvider: "",
                        password: "39MN6U@7!"

                    },
                    {
                        first_name: "Miguel",
                        last_name: "Ferreira",
                        desription: "From my uni-years onwards, I have been taking care of dogs and cats of friends while they were travelling or living abroad.",
                        email:"miguelFerreira1@gmail.com",
                        address:  "Rua de Miragaia 106, 4050-387",
                        city: "Porto",
                        country: "Portugal",
                        number: "+923456789",
                        imgProvider: "",
                        password: "123456"

                    },
                    {
                        first_name: "Joan ",
                        last_name: "Santos",
                        desription: "I have looked after many pets and homes and their owners have always been full of praise and satisfaction when returning to a neat clean and tidy abode and happy healthy beasties. ",
                        email:"joanSantos@gmail.com",
                        address:  "Rua Dom Francisco Manuel de Melo, 15 1070-085 ",
                        city: "Lisbon",
                        country: "Portugal",
                        number: "+923456789",
                        imgProvider: "",
                        password: "123456"

                    }];

                const transaction = evt.target.transaction;
                const providerObjectStore = transaction.objectStore(DB_STORE_NAME);
                providerData.forEach((provider) => {
                    providerObjectStore.add(provider);
                });
            }

            if (!db.objectStoreNames.contains(DB_STORE_NAME_2)) {
                const serviceStore = db.createObjectStore(DB_STORE_NAME_2, { keyPath: 'id', autoIncrement: true });
                serviceStore.createIndex('provider', 'provider', { unique: false });
            /* Example:
            Service = {
            provider: email,
            serviceName: serviceName,
            serviceDetails: serviceDetails,
            servicePrice: servicePrice,
            serviceCategory: serviceCategory,
            serviceType: serviceType,
            image: file};*/}

            if (!db.objectStoreNames.contains(DB_STORE_NAME_3)) {
                const orderStore = db.createObjectStore(DB_STORE_NAME_3, { keyPath: 'id', autoIncrement: true });
                orderStore.createIndex('service_id', 'service_id', { unique: false });
                orderStore.createIndex('emailProvider', 'emailProvider', { unique: false });
                const orderData = [{
                        emailProvider: "anaSmith879@gmail.com",
                        nameCustomer: "John Doe",
                        numberCustomer: "+1234567890",
                        emailCustomer: "john.doe@gmail.com",
                        serviceId: 2,
                        nameService: "Dog Walking",
                        startDate: "2024-07-01",
                        endDate: "2024-07-01",
                        expectedPrice: "$50.00",
                        description: "Walk my dog twice a day for a week.",
                        paymentStatus: "UnPaid",
                        status: "Pending",
                    },
                    {
                        emailProvider: "anaSmith879@gmail.com",
                        nameCustomer: "Alice Smith",
                        numberCustomer: "+1122334455",
                        emailCustomer: "alice.smith@gmail.com",
                        serviceId: 2,
                        nameService: "Dog Walking",
                        startDate: "2024-06-15",
                        endDate: "2024-06-22",
                        expectedPrice: "$80.00",
                        description: "Provide two daily walks for my dog throughout the week.",
                        paymentStatus: "Paid",
                        status: "Accept",
                    },
                    {
                        emailProvider: "anaSmith879@gmail.com",
                        nameCustomer: "Bob Johnson",
                        numberCustomer: "+9988776655",
                        emailCustomer: "bob.johnson@gmail.com",
                        serviceId: 3,
                        nameService: "Cat Sitting",
                        startDate: "2024-04-05",
                        endDate: "2024-04-07",
                        expectedPrice: "$60.00",
                        description: "Take care of the my cats while away.",
                        paymentStatus: "Paid",
                        status: "Done",
                    },
                    {
                        emailProvider: "anaSmith879@gmail.com",
                        nameCustomer: "Eva Green",
                        numberCustomer: "+5544332211",
                        emailCustomer: "eva.green@gmail.com",
                        serviceId: 1,
                        nameService: "Dog sitting",
                        startDate: "2024-07-20",
                        endDate: "2024-07-26",
                        expectedPrice: "$100.00",
                        description: "Take care of the pets while away.",
                        paymentStatus: "UnPaid",
                        status: "Pending",
                    },
                    {
                        emailProvider: "anaSmith879@gmail.com",
                        nameCustomer: "Sophie Clark",
                        numberCustomer: "+9134567890",
                        emailCustomer: "sophie34490@gmail.com",
                        serviceId: 3,
                        nameService: "Cat sitting",
                        startDate: "2024-07-12",
                        endDate: "2024-07-07",
                        expectedPrice: "$50.00",
                        description: "Sitting with my cat",
                        paymentStatus: "UnPaid",
                        status: "Processing",
                    }];

                const transaction = evt.target.transaction;
                const orderObjectStore = transaction.objectStore(DB_STORE_NAME_3);
                orderData.forEach((order) => {
                orderObjectStore.add(order);});}


                if (!db.objectStoreNames.contains(DB_STORE_NAME_4)) { const messageStore = db.createObjectStore(DB_STORE_NAME_4, { keyPath: 'id', autoIncrement: true });
                messageStore.createIndex('nameProvider', 'nameProvider', { unique: false });
                messageStore.createIndex('nameCustomer', 'nameCustomer', { unique: false });
                messageStore.createIndex('order_id', 'order_id', { unique: false });
            
                const messageData = [
                    {
                        nameProvider: "Ana Smith",
                        name: "John Doe",
                        order_id: 1,
                        messageContent: "Hi, I have a question about my order.",
                        timestamp: new Date().toDateString()
                    },
                    
                    {
                        nameProvider: "Ana Smith",
                        name: "Ana Smith",
                        order_id: 1,
                        messageContent: "Hello, how can I help you?",
                        timestamp: new Date().toDateString()
                    },
                    {
                        nameProvider: "Ana Smith",
                        name: "Sophie Clark",
                        order_id: 2,
                        messageContent: "Hello, I have questions",
                        timestamp: new Date().toDateString()
                    }];

                const transaction = evt.target.transaction;
                const messageObjectStore = transaction.objectStore(DB_STORE_NAME_4);
                messageData.forEach((message) => {
                    messageObjectStore.add(message);
                });}
    
                if (!db.objectStoreNames.contains(DB_STORE_NAME_5)) {const userStore = db.createObjectStore('user', { keyPath: 'id', autoIncrement: true });
                userStore.createIndex('email', 'email', { unique: false });
                userStore.createIndex('name', 'name', { unique: false }); //para fazer...
            }
    
                if (!db.objectStoreNames.contains(DB_STORE_NAME_6)) {const wishlistStore = db.createObjectStore('wishlist', { keyPath: 'id', autoIncrement: true });
                wishlistStore.createIndex('email', 'email', { unique: false });
                wishlistStore.createIndex('name', 'name', { unique: false }); //para fazer...
            }

                if (!db.objectStoreNames.contains(DB_STORE_NAME_7)) {const wishlistStore = db.createObjectStore('contactUs', { keyPath: 'id', autoIncrement: true });
                wishlistStore.createIndex('email', 'email', { unique: false });
                wishlistStore.createIndex('name', 'name', { unique: false });
                    /* Example :
                    data = {
                    name: name,
                    email: email,
                    message: message}*/}
        };
    });
}


export { openDb, DB_STORE_NAME, DB_STORE_NAME_2, DB_STORE_NAME_3, DB_STORE_NAME_4, DB_STORE_NAME_5,DB_STORE_NAME_6,DB_STORE_NAME_7};
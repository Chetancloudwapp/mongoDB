<?php

/*

IMPORTANT COMMANDS IN MONGODB DATABASE :- 

=> show dbs
=> show collections
=> createCollection/dropCollection
=> insertOne/insertMany
=> updateOne/updateMany
=> DeleteOne/DeleteMany
=> fineOne/find
=> createIndex
=> mongodump/mongorestore 

NOTE:- These all are basic commands in mongodb database now the problem is koi bhi iss command ko run krke humare database ko delete krskta hai yaa modify krskta hai to isse bachne ke liye hume authentication ki jarurat hoti hai, isme hum user ki har request ko authenticate krte hai and agar vo ek valid user hai tabhi use process krne dete hai
=> Authentication karwane ke liye hum username and password ka use krte hai and agar credentials sahi hai tabhi request mongodb server pr jaati hai otherwise nahi

// --------------- USER MANAGEMENT COMMANDS -------------------- //

1). db.createUser() => Iss command ki help se hum username and password create krskte hai and use ek role bhi assignn krskte hai
2). db.updateUser() => If we want to update user information
3). db.dropUser() => Particular kisi user ko delete krskte hai
4). db.dropAllUser() => Sabhi user ko delete krne ke liye iska use hota hai
5). db.grantRolesToUser() => Agar user ko koi naya role dena hai 
6). db.revokeRolesFromUser() => Agar user se koi role lena hai 
7). db.getUser() => Particular user ki information chahiye
8). db.getUsers() => sabhi users ki information dekhne ke liye
9). db.auth() => Login krne ke liye iss command ka use krte hai
10). db.changeUserPassword() => Kisi existing user ka password change krne ke liye iska use krte hai


// ************************ SYNTAX OF THE COMMANDS *********************** //

// CREATE USER
db.createUser({
    user:"admin",
    pwd:"admin123",
    roles:[{role:"readWrite", db:"school"}] // here readWrite is inBuilt role
})

// NOW LOGIN KRNE KE LIYE HUME AUTH COMMAND KA USE KRNA PADEGA

db.auth("admin", "admin123")

// --------------------- BUILT-IN ROLES -------------------------- //

** DATABASE-SPECIFIC ROLES

1). read => Allows the user to read data from the database
2). readWrite => Allows the user to read and write data to the database
3). dbAdmin => Allows the user to perform administrative tasks (e.g indexing, schema operations) on the database
4). userAdmin => Allows the user to manage users and roles within the database
5). dbOwner => Combines, readWrite, dbAdmin, and userAdmin roles for the database that means iske pass sare access hai

** BACKUP & RESTORATION ROLES USES AT COMPANY LEVEL

1). backup => Allows the user to back up the database
2). restore => Allows the user to restore data from backups

** USER ADMINISTRATION ROLES

Note:- Inkee pass sari previleges hoti hahi

1). userAdminAnyDatabase => Allows the user to manage users on any database
2). dbAdminAnyDatabase => Provides dbAdmin privileges for all database (kisi bhi database ke sare operations perform krskta hai)

** SUPERUSER ROLES

Note :- Yhh role hum kisi bhi user ko assign krskte hai jise hume poora access dena ho

1). root => Full administrative access to all database, users and operations (Superuser role)

** READ-ONLY ROLES

1). readAnyDatabase => Allows read-only access to all database

// *************** CLUSTER ONLY ROLES *************** //

NOTE:- ISS tarah ke roles mai hum jis bhi server pr humara database rakha hota hai use control krskte hai
=> Iss tarah ke roles ki need developers ko nahi hoti hai server ke administration ko hoti hai

1). clusterAdmin => Provides full control over the cluster (sharding, replication etc)
2). clusterManager => Allows monitoring and managing the cluster, but without full admin privileges
3). clusterMonitor => Provides read-only access to cluster status and metrics
4). hostManager => Allows managing server instances and monitoring processes.

// ----------------------- HOW TO ENABLE AUTHORIZATION IN MONGODB -------------------------- //

NOTE:- Upar jitne bhi roles humne define kiye hai unhe use krne ke liye hume phle authorizaton ko enable krna padta hai tabhi hum unka use krskte hai

FOR WINDOWS :- Go to this path and open configuration file

STEP-1 => C:\Program Files\MongoDB\Server\<version>\bin\mongod.cfg

STEP-2 => 

security:
    authorization:enabled

STEP-3 => Restart MongoDb services

// ------------------ ASSIGN ROLE TO THE USER -------------------- //

// Ek new user assign kiya hai jise root ka access hai
db.createUser({
    user:"admin",
    pwd:"admin123",
    roles: [{ role:"root", db:"admin"}]
})

// only read access
db.createUser({
    user:"developer",
    pwd:"dev123",
    roles: [{ role:"root", db:"school"}]
})


// Role assign krne ke baad bhi direct access nahi milega hume use login krna compulsory hai and login krne ke liye hume auth command ka use krna pdta hai
LOGIN COMMAND
db.auth("admin", "admin123"); // here admin is the user name

// ---------  IF I WANT TO UPDATE THE ROLE ----------- //
db.updateUser("developer", {
        roles:[{ role:"readWrite", db:"school"}]
    }
)

// ---------- IF USER WANTS TO CHANGE THEIR PASSWORD ---------- // 
db.changeUserPassword("developer", "pass123") // here developer is our user name and in second parameter we pass our updated password

// --------- IF WE WANT TO DELETE THE USER ------------------ //

db.dropUser("developer") // yhh command only admin user hi chala payga
db.dropAllUsers("developer") // yhh command se sare users remove hojaate hai
db.dropAllUsers({ w:"majority", wtimeout: 5000}) // jab tak user delete honge tab tak koi bhi write operation perform nahi hoga 5 millisec tak because iski priority majority per hai


// ----------- Agar kisi particular user ko hume or bhi role assign krna hai to uske liye humare pass ek method aata hai grantRolesToUser iski help se hum user ko multiple role bhi assign krskte hai -------------------- //

db.grantRolesToUser("developer", [
    { role: "dbOwner", db:"school"},
    { role: "readWrite", db:"school"}
])

// ------------ IF WE WANT TO REVOKE A ROLE TO THE USER ------------------- //

db.revokeRolesFromUser("developer", [
    { role: "read", db:"school"}
])

*/

?>




<?php
/*

Index :- why it is used, it is used for fast searching operation

// --------- SYNTAX OF CREATING THE INDEX ----------- //

**** This type of scan is Known as IXSCAN (index scan)
db.students.createIndex(
    {Name:1}
)

// here 1 = Ascending Order
       -1 = Descending Order


*************** TYPES OF INDEXES IN MONGODB ******************

1). Single field index => specific field pr indexing krna hoto
2). Compound Indexes => 2 ya 2 se jyada field pr indexing krne ke liye
3). Unique Index => unique value pr indexing krne ke liye
4). Text Index => Agar paragraph pr searching krni hai to text index ka use krskte hai
5). Wildcard Index => collection ki sari field pr indexing krskte hai iska disadvantage yhh bhi hai ki yhh memory jyada consume krti hai
6). Geospatial Index => jaha geolocation ka data show karana ho vaha iska use krte hai
7). Hashed Index => it is an advance kind of indexing and it is used with shrading

// IMPORTANT COMMANDS :- 

// db.users.find().explain() // agar hum dekhna chahte hai ki find kis tarah work krta hai
db.users.find().explain('executionStats') // executionStats detials mai explain krta hai
db.collection_name + 2 time tab button to show all of the mongodb commands
db.users.find({name:"Kartik Aryan"}).explain("executionStats")

// HOW TO CREATE INDEX
db.users.createIndex({name:-1})
db.users.createIndex({class:1, age:-1}) // if we want to apply grouping index
db.students.getIndexes() // to show the index list
db.users.dropIndex("name_-1") // if we want to drop index
db.users.createIndex({email:1},{unique:true}) // unique email se indexing


*************** TEST INDEXING *******************
db.students.createIndex({name:"text"})

db.users.find({ $text: { $search: "Khan"}}) // text ke behalf pr search karega

************** WILDCARD INDEXING *****************

 => Iski help se hum sabhi col pr indexing krskte hai

Syntax :-

db.users.createIndex({"$**":1}) // users collections mai sabhi column pr indexing hojaye

Disadvantage :- Iss tarah ki indexing humari ram mai kaafi space acquire krti hai jisse speed bhi kaafi slow hoskti hai 

*/

// db.users.insertMany([
//     { _id:1, name:"Akshay Kumar", age:23, class:"BCA", email:"akshay@gmail.com"},
//     { _id:2, name:"Salman Khan",  age:24, class:"Btech", email:"salman@gmail.com"},
//     { _id:3, name:"John Abraham", age:30, class:"BSC", email:"john@gmail.com"},
//     { _id:4, name:"Shahid Kapoor", age:35, class:"BCom", email:"shahid@gmail.com"},
//     { _id:5, name:"Kartik Aryan", age:20, class:"BCA", email:"kartik@gmail.com"},
// ])



?>
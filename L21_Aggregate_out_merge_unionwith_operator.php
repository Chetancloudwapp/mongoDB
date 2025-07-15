<?php
/*

// --------------- Aggregate Out Operator ---------------- //

NOte:- Agar kisi bhi existing operator ke andar se hume ek new collection banana hai to uske liye hum "OUT OPERATOR" ka use krte hai

************** SYNTAX OF THE OUT OPERATOR *******************

db.students.aggregate([
    { $match" {"Class": "Btech"}},
    { $out: "Student_new"} 
]);

// --------------- Examples of the out operator ------------ //

db.students.aggregate([
    { $match : { "age" : { $gt: 20}}},
    { $out : "Valid_students"} 
])

db.students.aggregate([
    { $group : { _id: "$class", students: { $push: "$name"}}}, // class wise grouping karenge phle frr students name ke ek array mai name ko push krdenge
    { $out : "class_data"} 
])


// *************************************** Merge Operator ************************************* //

Note :- Jab bhi ek collection ke data ko dusre collection se merge krna chahte hai to uske liye hum merge operator ka use krte haii but isme condition yhh hai ki humare pass ek field aise honi chahiye jo same ho just like id.
=> Isme agar hum collection ko merge nahi krna chahte hai to replace bhi krskte hai

Student Collection :- Field name ( id , Name , Class)
Personal Collection :- Field name ( id , City , Phone)

Output Collections :- (id, Name, Class, City, Phone)


// SYNTAX OF THE MERGE OPERATOR :-

db.personal.aggregate([
   {
      $merge : {
        into: "students", // uss collection ka name aayga jisme sath hum merge krna chahte hai
        on: "id", // uss field ka name dete hai jo dono mai common ho
        whenMatched: "merge", // jab match hojaye tab merge krna hai isme hum or bhi chije perform krskte hai (Replace, keepExisting, fail)
        whenNotMatched: "insert" // (We can pass Discard, fail also)
      }
   } 
])

// Examples 

db.personall.aggregate([
   { $merge : {
       into: "students",
       on:"_id",
       whenMatched: "merge",
       whenNotMatched: "insert"
   }}
])


// -------------------- UNIONWITH OPERATOR -------------------- //

NOTE:- Jab bhi hum kisi 2 collection ko join krke dekhna chahte hai to uske liye hum unionwith operator ka use krskte hai
=> Yhh operator kisi bhi existing collection mai changes nahi krta hai or new collection bhi create nahi krta hai yhh bss show krne ke kaam krta hai.

Customers Collection (First Collection)

id     Name           City
1).    Akshay Kumar   Goa
2).    Salman Khan    Mumbar

Suppliers Collection (Second Collection)

id     Name           City
1).    Amar Khan      Agra
2).    Shahid Kapoor  Delhi

// ------------ With the help of UnionWith Operator ----------------- //

id     Name            City
1).    Akshay Kumar    Goa
2).    Salman Khan     Mumbar
3).    Amar Khan       Agra
4).    Shahid Kapoor   Delhi


// Syntax of the unionwith operator

db.customers.aggregate([
    { $unionWith : {
        coll: "suppliers // coll ke andar hume dusri collection ka name dena hota hai
    }}
])

// Examples 

db.students1.aggregate([
   { $unionWith: {
       coll : "students2"
   }}
])

*/





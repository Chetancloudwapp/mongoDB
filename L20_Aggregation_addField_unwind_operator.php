<?php

/*

Note :- Similarly work as project operator (isme hume jis bhi field ko shown krna hai use show krskte hai and jise hide krna hai use hide bhi krskte hai) but still there is a difference in that. Isme hum custom field add krskte hai let suppose agar humare pass firstname Ajay hai and lastname is kumar then our custom field will be Ajay Kumar that is the main purpose of Add field operator and old fields bhi show hogi but project operator mai aisa nahi hota usme hume jis bhi field ko dikhana hota hai uske liye hum 1 pass krdete hai and jise nahi dikhana hota uske liye 0 . Add field operator bhi hume facility deta hai ki hum humare old field ko remove skte hai

// ------------------ ADD FIELDS OPERATOR ------------------ //

case scenario :- 

{
    _id:1,
    firstName:'Akshay',
    lastName:'Kumar',
    marks:[10,20,30]
}

// Now with the help of Add field operator our output will be :-

{
    _id:1,
    fullName:'Akshay kumar',
    TotalMarks:60,
    firstName:'Akshay',   // old field is still show but don't worry we can remove it also
    lastName:'Kumar',
    marks:[10,20,30]
}

// ------------ SYNTAX OF THE AGGREGATE ADD FIELD OPERATOR --------------- //

db.students.aggregate([
    $addFields:{
        fullName: {$concat: ["$firstName", "", "$lastName"]},
        TotalMarks: {$sum:"$marks"},
        firstName: "$$REMOVE", // ISS TARAH SE HUM OLD FIELDS KO REMOVE BHI KRSKTE HAI
        lastName: "$$REMOVE"
    }
])

// ------------- Agar existing field name ki key mai change krna hoto -------------

db.students.aggregate([
    {
       $addFields: {
          _id: { $concat: ["$firstName", " ", "$lastName"]} // id mai fullName overrite hojayga
       }
    }
])

// --------------- IF WE DID NOT WANT TO SHOW NULL VALUES THEN WE CAN WRITE LIKE THIS --------//

db.students.aggregate([
    {
       $addFields: {
          fullName: { $concat: ["$firstName", " ", "$lastName"]},
          firstName:"$$REMOVE",
          lastName:"$$REMOVE",
          city: {
            $ifNull : ["$city", "$$REMOVE"] // JAHA pr bhi city ki value null aaygi use remove krdega
          }
       }
    }
]);

// --------------- Agar hume conditions bhi lagani hai humre add field operator pr to iss tarah se likh skte haii

db.students.aggregate([
    {
       $addFields: {
          fullName: { $concat: ["$firstName", " ", "$lastName"]},
          firstName:"$$REMOVE",
          lastName:"$$REMOVE",
          city: {
            $cond : {
                if:{ $eq: ["$city", "Delhi"]},
                then: "$$REMOVE",
                else:"$city"
            }
          }
       }
    }
]);

// -------------- If we want to see only id=1 ka data then we use match operator ------------ //

db.students.aggregate([
    { $match : { _id:ObjectId('6870a646763b1093916b140c') }},
    {
       $addFields: {
          fullName: { $concat: ["$firstName", " ", "$lastName"]},
          firstName:"$$REMOVE",
          lastName:"$$REMOVE",
       }
    }
]);

// --------------- We can add custom field also like profile -------------

db.students.aggregate([
    { $match : { _id:ObjectId('6870a646763b1093916b140c') }},
    {
       $addFields: {
          fullName: { $concat: ["$firstName", " ", "$lastName"]},
          firstName:"$$REMOVE",
          lastName:"$$REMOVE",
          "profile.age":30
       }
    }
]);

// -------------- MARKS ARRAY MAI OR NEW MARKS ADD KRNE HAI TO ------------- //

db.students.aggregate([
    { $match : { _id:ObjectId('6870a646763b1093916b140c') }},
    {
       $addFields: {
          fullName: { $concat: ["$firstName", " ", "$lastName"]},
          firstName:"$$REMOVE",
          lastName:"$$REMOVE",
          marks: { $concatArrays: ["$marks", [33,92]]}
       }
    }
]);

// --------------- IF We want to show total marks -------------- //

db.students.aggregate([
    { $match : { _id:ObjectId('6870a646763b1093916b140c') }},
    {
       $addFields: {
          fullName: { $concat: ["$firstName", " ", "$lastName"]},
          firstName:"$$REMOVE",
          lastName:"$$REMOVE",
          TotalMarks: { $sum: "$marks"},
          AvgMarks : { $avg: "$marks"}
       }
    }
]);

// -------------------------------------- UNWIND OPERATOR --------------------------------- //

CASE SCENARIO :- Agar hum sizes ki har value ke liye specific product ko dekhna chahte hai to uske liye unwind operator ka use krte hai. i.e array ki har value ke liye document ko todke new document bana dega

NOTE:- Yhh sirf dekhne k liye hi hota hai isse humare actual database pr kuch bhi frk nahi padta hai

{
   _id:1,
   product:'Black T-shirt',
   sizes: ['S','M','L']
}

// ---------- With the help of unwind operator our output will be like this ------------//

{ _id:1, product:"Black T-shirt, sizes:'S'}
{ _id:1, product:"Black T-shirt, sizes:'M'}
{ _id:1, product:"Black T-shirt, sizes:'L'}

// ---------- SYNTAX OF UNWIND OPERATOR -------------------//

db.collection_name.aggregate([ {$unwind: "$sizes"}])


db.inventory.aggregate([
    {
        $unwind: "$sizes"
    }
])

*/











<?php
/*

// ----------------- LOOKUP OPERATOR ----------------- //

LoopUp Operator :- It is working same as joins in mysql, isme bhi hum two collection ko join krke data nikal skte hai. Now let suppose we have two tables students and library

students collections contains :- id, name , class
library collections contains :- id, book , student_id

=> Now hum yhh janna chahte hai ki kis student ne konsi book li hai to uske liye hum mongodb mai lookup operator ka use krenge


******************* SYNTAX OF LOOKUP OPERATOR ***********************

db.library.aggregate([
    {
        $lookup: {
            from: "student", // jiss dusri collections se library collection ko join krna chahte hai uska name aayga
            localField: "student_id", // library ke andar aisi konsi local field hai jise hum student ki collection ke sath join karenge
            foreignField: "_id", // student collection ki foreign id
            as: "book_details" // output array field jo bhi hum data nikalenge use iss array mai daal denge iss arr ka name hum kuch bhi rakh skte hai
        }
    },
    { $unwind : "$Student"} 
])

Note:- Unwind operator ka use hum array ko remove krne k liye krte hai iska use hum kahi bhi krskte hai.

example :

Before unwind => Student: [ { _id: 6, name: 'Sanjay Dutt', age: 21, class: 'BSC' } ]
After unwind => Student: { _id: 6, name: 'Sanjay Dutt', age: 21, class: 'BSC' }


// ----------------- REPLACEBOOT OPERATOR ----------------- //

NOTE:- jab bhi hum lookup operator ke data ko dekhte hai output mai to use samjhna kaafi complex hojaata hai agar number of record bahut jyada hai to ise ko easy way mai dikhane k liye replaceboot operator ka use hota hai.

Example :- Before Replace Boot operator

{
    _id:1,
    book:"Atomic Habits",
    student_id: 1,
    Student: [
        {
            _id: 1,
            name: "Sanjay Dutt",
            age: 21,
            class: "BSC"
        }
    ]
}

=> After Replace Boot Operator our output will be like this -;

{
    _id:1,
    name: "Sanjay Dutt",
    class: "BSC",
    book:"Atomic Habits",
    student_id: 1,
}

WORKING OF REPLACEBOOT OPERATOR :- Yhh 3 steps mai work krta hai sbse phle hume foreign table ka data nikalna padta hai and then after that hum local table ka data nikalte hai and then dono ko merge krte hai.

our foreign data in this case :- 

Student: [
    {
        _id: 1,
        name: "Sanjay Dutt",
        age: 21,
        class: "BSC"
    }
]

1). $replaceRoot: { // after that hum ise replace krte hai with the help of replaceRoot
    newRoot: {  // and then hum uska new Root create krlete hai
        $mergeObjects: [ // mergeObj dono data ko merge krdeta hai
            { $arrayElemAt: ["$Student", 0] }, // yha par humne student ki collection ka data daal diya hai at zero index
            "$$ROOT" // yha par humne library ki collection ka data daal diya
        ]
    }
}

******************** LOOKUP WITH REPLACEBOOT OPERATOR ***********************

db.library.aggregate([
    {
        $lookup :{
            from : "students",
            localField:"student_id",
            foreignField:"_id",
            as:"Student" // library or student ka data join ho kr iss array mai aayega
        }
    },
    {
        $replaceRoot: {
            newRoot: {
                $mergeObjects: [
                    { $arrayElemAt: ["$Student", 0] },
                    "$$ROOT"
                ]
            }
        }
    },
    {
        $project:{ Student:0} // agar hum as:"Student" ko nahi dekhna chahte hai to hum ise 0 krke hata skte hai with the help of project operator
    }
])



*/



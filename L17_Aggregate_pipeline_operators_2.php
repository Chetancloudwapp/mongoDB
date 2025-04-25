<?php
/*

************* Aggregate Pipeline Operators Part-2 ****************

$group Operator = Advance Operator (data ko group wise show karane k liye kam aata hai i.e delhi city ke logo ka ek group, goa ke city ke logo ka ek group, etc)

***********  Examples of the Group Aggregate Method ***********

SYNTAX :- 

db.collection_name.aggregate([
    {
        $group : {
            _id : "$field_name", // field_name jis field se group krna hai
            <field1> : { $accumulator1: <expression1> }
            <field2> : { $accumulator2: <expression2> }
        }
    }
])


// ************************ Accumulator Operator list ***************** //

1). $sum
2). $avg
3). $median
4). $max
5). $min
6). $count
7). $push
8). $addToset(just like push)
9). first
10). $last
11). $top
12). $topN
13). $bottom
14). $bottomN

// group wise data get krne k liye 
db.students.aggregate([{
    $group : {
        _id : "$class" // id parameter compulsory hai, isme uss parameter ka name aayga jisse hum grouping krna chahte hai 
    }}
])

//------ kiss group mai kitna data hai agar use janna hai to iss tarah se krskte hai --------//

db.students.aggregate([
    {
        $group:{
            _id:"$class",
            count:{$sum:1}
        }
    }
])

// only unhi students ka data show ho jinki age 20 se jyada ho
db.students.aggregate([
    { $match : {age: {$gt:20}}},
    {
        $group:{
            _id:"$class",
            count: {$sum:1}  // kis class k kitne count hai agar usee dekhna hai to $sum operator ka use krke dekh skte hai 
        }
    }
])

// -------- count method ----------- //

db.students.aggregate([
    { $match : {age: {$gt:20}}},
    {
        $group:{
            _id:"$class",
            count: { $count : {} }  // jisse bhi group kiya hai uske number of records ka count dega
        }
    }
])

// --------- Descending $sort method ----------- // 

db.students.aggregate([
    {
        $group:{
            _id:"$class",
            count:{$count:{ }}
        }
    },
    { $sort: { count: -1}} // descending order mai sort krne k liye -1 use hota hai
    { $sort: { count: 1}} // ascending order mai sort krne k liye 1 use hota hai
])

// --------- $push Operator ----------- //

// Agar hum number of records nahi dekhna chahte hai and uske jagah hum students ki detail dekhna chahte hai ki bsc mai kitne students aaye hai to hum $push operator ka use krte hai
// $push operator se hum kisi bhi field ki detail dekh sakte hai

db.students.aggregate([
    {
        $group:{
            _id:"$class", // grouping with class
            _id:"$age", // grouping with age
            students:{$push:"$name"} // iss field mai humne name ko push kiya hai ie hum sirf name ki detail dekhna chahte hai
        }
    }
])

Note => Agar hum poore record ko push karana chahte hai students var mai too $$ROOT method ka use krke krskte hai

db.students.aggregate([
    {
        $group: {
            _id:"$age",
            students:{$push : "$$ROOT"} // sara data push hojayga students mai
    
        }
    }
]);

// ----------------------- addToSet Operator ------------------- //

=> Yhh bhi bilkul $push operator ki tarah hi kaam krta hai 

db.students.aggregate([
    {
        $group: {
           _id:"$age",
           students:{$addToSet : "$name"}
        }
    }
])

db.students.aggregate([
    {
        $group: {
           _id:"$age",
           students:{$addToSet : "$$ROOT"} // it returns all collections data
        }
    }
])

// -------------------------- MIN and MAX Operator ---------------------- //


// max operator
db.students.aggregate([
    {
       $group :{
          _id: "$class",
          Maximum_student_age : { $max : "$age"}
       }
    }
])

// max operator
db.students.aggregate([
    {
       $group :{
          _id: "$class",
          Minimum_student_age : { $min : "$age"}
       }
    }
])

// ------------------------ AVG Operator --------------------------- //

db.students.aggregate([
    {
       $group :{
          _id: "$class",
          Average_student_age : { $avg : "$age"}
       }
    }
])

NOTE :- Agar hume group wise average age nahi nikalna hai overall collection mai se avg nikalna hai to hum _id param ko null krdenge


db.students.aggregate([
    {
       $group:{
          _id:null,
          Average_student_age: { $avg: "$age" }
       }
    }
])

************ Agar hum median age nikalna chahte hai to median operator ka use krte hai ************

=> It takes 2 parameters input and methods

Input :- iss field mai uss param ka naam dena hota hai jiske behalf per hum median value nikalna chahte hai
Methods :- jo bhi median nikal rahe hai uski method konsi hai iska value by default 'approximate' hi hoti hai

db.students.aggregate([
     {
        $group : {
           _id: null, // 
           _id: "$class",
           Median_age : { $median : {
               input : "$age",
               method: "approximate"
           }}
        }
     }
]);


// ------------------------- FIRST AND LAST OPERATOR --------------------------- //

=> AGAR hum group wise ka only first data dekhna chahte hai to first operator ka use krke dekh skte hai

db.students.aggregate([
    {
       $group :{
            _id : null, // show first record from all the collections
           _id : "$class", // first record with groupBy
           First_students : { $first: "$name"}
       }
    }
])

db.students.aggregate([
    {
       $group :{
            _id : null, //
           _id : "$class",
           Last_students : { $last: "$name"}
           Last_students : { $last: "$$ROOT"} // show all the records
       }
    }
])


// ------------------------- TOP AND BOTTOM OPERATOR --------------------------- //

=> Top :- work similar as first operator but isme hume 2 fields bhi leni padti hai output and sortBy . Iske andar hume yhh facility hoti hai ki hum phle sorting krskte hai frr data show krte hai

Working Principle :-

Step-1 :- grouping with class
Step-2 :- sorting by age or any other col
Step-3 :- after sorting records are retrieved

db.students.aggregate([
    {
       $group :{
           _id : "$class", 
           Top_students : { $top : {
                output : ["$name", "$class", "$age"],
                sortBy : {"age" : 1}
    
           }}
       }
    }
])

Note :- Here topN refers to (total number of records) hum top se kitne record dekhna chahte hai use hum third parameter se define krte hai let say if n=3 then only 3 record show karega top se

db.students.aggregate([
    {
       $group :{
           _id : "$class", 
           Top_students : { $topN : {
                output : ["$name", "$class", "$age"],
                sortBy : {"age" : 1},
                n : 3
    
           }}
       }
    }
])


=> Bottom :- working similar as last operator


db.students.aggregate([
    {
       $group :{
           _id : "$class", 
           Bottom_students : { $bottom : {
                output : ["$name", "$class", "$age"],
                sortBy : {"age" : 1}
    
           }}
       }
    }
])

Note :- Here bottomN refers to (total number of records) hum bottm se kitne record dekhna chahte hai use hum third parameter se define krte hai let say if n=3 then only 3 record show karega bottom se

db.students.aggregate([
    {
       $group :{
           _id : "$class", 
           Bottom_students : { $bottomN : {
                output : ["$name", "$class", "$age"],
                sortBy : {"age" : 1},
                n : 3
           }}
       }
    }
])


*/

?>
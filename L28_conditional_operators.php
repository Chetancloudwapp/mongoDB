<?php

/*

LIST OF CONDITIONAL OPERATORS IN MONGODB :-

1). $cond
2). $ifNull
3). $switch

// ----------- Syntax of the conditional Operators ---------------- //

Note :- Used in case of single conditions

{
   $cond :{
      if: <condition>,
      then:<true-case>,
      else:<false-case>
   }
}

// COND OPERATOR
db.products.aggregate([
    {
        $project: {
            name:1,
            price:1,
            priceCategory:{
                $cond:{
                    if:{ $gt: ["$price", 1000]},
                    then: "Expensive",
                    else: "Affordable"
                }
            }
        }
    }
])

db.products.aggregate([
    {
        $project: {
            name:1,
            OriginalPrice: "$price",
            finalPrice:{
                $cond:{
                    if:"$discounted",
                    then: { $multiply: [ "$price", 0.9]},
                    else: "$price"
                }
            }
        }
    }
])

//  ------------------ IFNULL OPERATOR ----------------- //
db.users.aggregate([
    {
       $project: {
           name:1,
           email:{ $ifNull: ["$email", "No Email"]} // jaha pr email ho vaha email ki value dikha do or jaha pr nahi hai vha no email show krdo
       }
    }
])

// ----------------- SWITCH OPERATOR --------------------- //

Note :- Used for multiple conditions

db.students.aggregate([
    {
        $project:{
            name:1,
            percentage:1,
            grade: {
                $switch: {
                    branches : [
                        { case: { $gte : ["$percentage", 80]}, then: "Merit"}
                        { case: { $gte : ["$percentage", 60]}, then: "Ist Division"}
                        { case: { $gte : ["$percentage", 45]}, then: "IInd Division"}
                        { case: { $gte : ["$percentage", 33]}, then: "IIIrd Division"}
                    ],
                    default: "Fail"
                }
            }
        }
    }
])

*/


// db.users.insertMany([
//     { _id:1, name:"Akshay Kumar", email:"akshay@gmail.com"},
//     { _id:2, name:"Salman Khan"},
//     { _id:3, name:"John Abraham", email:null},
// ])

?>
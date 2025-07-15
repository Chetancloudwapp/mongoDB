<?php

/*

List of Arithmetic operators :-

1). $add => used for addition for 2 numeric values
2). $subtract => used for substraction
3). $multiply => used for multiply
4). $divide   => used for divide
5). $mod  => Modulus operator it returns remainder value
6). $pow  => power operator (4)^3 = 4*4*4 = 64
7). $round => return round value
8). $sqrt  => used for square root
9). $abs  => Absolute value i.e exact value return krta hai without sign ke
10). $ceil => show ceil value i.e return higher value
11). $floor => show floor value i.e return lower value
12). $trunc => fraction value ko hatake base value return krta hai like in 4.8 or 4.3 it return 4 which is base value


// ---------------- Examples of the Arithmetic Operators --------------------- //

// ADD OPERATOR 
db.sales.aggregate([
    { 
        $project: { 
            product:1, price:1, quantity:1, // if we want to show all of the fields
            sum: { $add: ["$price", "$quantity"]}
        }
    }
])

// SUBSTRACT OPERATOR 
db.sales.aggregate([
    { 
        $project: { 
            product:1, price:1, quantity:1,
            subtract: { $subtract: ["$price", "$quantity"]}
        }
    }
])

// Multiply OPERATOR 
db.sales.aggregate([
    { 
        $project: { 
            product:1, price:1, quantity:1,
            multiply: { $multiply: ["$price", "$quantity"]}
        }
    }
])

// DIVIDE OPERATOR
db.sales.aggregate([
    {
       $project: {
          result: { $divide: [7,2]}
       }
    }
])

// Modulus OPERATOR
db.sales.aggregate([
    {
       $project: {
          result: { $mod: [7,2]}
       }
    }
])

// POWER OPERATOR
db.sales.aggregate([
    {
       $project: {
          result: { $pow: [7,2]}
       }
    }
])

// SQRT OPERATOR
db.sales.aggregate([
    {
       $project: {
          result: { $sqrt: 256}
       }
    }
])

// ABS OPERATOR
db.sales.aggregate([
    {
       $project: {
          result: { $abs: -9.2}
       }
    }
])

// Trunc OPERATOR
db.sales.aggregate([
    {
       $project: {
          result: { $trunc: -9.2}
       }
    }
])


*/

?>
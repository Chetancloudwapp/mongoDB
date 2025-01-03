<?php
/*

************* Aggregate Operators Part-2 ****************

$group Operator = Advance Operator 

Accumulator Operator list :-

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

***********  Examples of the Group Aggregate Method ***********

db.students.aggregate([{
    $group : {
        _id : "$class" // id parameter compulsory hai isme uss parameter ka name aayga jisse hum grouping krna chahte hai 
    }}
])

//------ kiss group mai kitna data hai agar use janna hai to iss tarah se krskte hai --------//

db.students.aggregate([
    { $match : {age: {$gt:20}}},
    {
        $group:{
            _id:"$class",
            count: {$sum:1}  // kis class k kitne count hai agar usee dekhna hai to $sum operator ka use krke dekh skte hai 
        }
    }
])
*/

?>
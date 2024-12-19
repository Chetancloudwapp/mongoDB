<?php
/*

Logical Operators in MongoDB :-
1). $and = Returns documents where both queries match i.e jab dono result true return kare

SYNTAX :- { $and:[condition1, condition2]}

example : db.students.find({$and :[
                {"age": {$gt: 20}},
                {"age": {$lt: 23}}
            ]})

WITH PROJECTION :-

db.students.find({$and :[
    {"age": {$gt: 20}},
    {"age": {$lt: 23}}
]}, {name:1, age:1, class:1, _id:0})

db.students.find({$and :[
    {"age": {$gt: 20}},
    {"class": {$eq: "Btech"}}
]}, {name:1, age:1, class:1, _id:0})

2). $or = Returns documents where either query matches i.e dono mai se ek true ho

SYNTAX :- { $or:[condition1,condition2]}

db.students.find({$or :[
    {"age": {$lt: 26}},
    {"name": {$eq: "Chetan"}}
]}, {name:1, age:1, class:1, _id:0})

3). $nor = Returns documents where both queries fail to match i.e jab dono condition false return kare

SYNTAX :- { $nor:[condition1,condition2]}

db.students.find({$nor :[
    {"age": {$lt: 26}},
    {"name": {$eq: "Chetan"}}
]}, {name:1, age:1, class:1, _id:0})

4). $not :- Returns documents where the query does not match, not operator same nor ki tarah ki kaam karta hai but isme only single condition ki likhte hai and nor mai multiple

SYNTAX :- { $not:[condition1]}

db.students.find({"age": {$not: {$gt:30}}}, {name:1,age:1,_id:0})

******************* EXAMPLES OF LOGICAL OPERATOR *************

db.students.deleteMany({ $and : [
{ age: {$gt : 20}},
{ class : {$eq : "Nursing"}}
]})

*/




?>
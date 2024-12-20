<?php
/*

************** EVALUATION QUERY OPERATOR ***************

There are 4 types of evaluation query operator :-

1). $regex = Regualar expression iska use mostly string values k sath krte hai, isme hum kisi particular pattern ko find krte hai. They are case sensitive

{field:{$regex:/pattern/<option>}}

Examples :- db.students.find({name: {$regex: "Khan"}})
            db.students.find({name: {$regex: /khan/i}}) // here i is optional field which is case insensitive
            db.students.find({name: {$regex: "Ch"}}) // poore document mai se jaha pr bhi ch ho use find krke dede
            db.students.find({name: {$regex: "^A"}}) // only vahi name show ho jinka name A se start hota hai 
            db.students.find({name: {$regex: "or$"}}) // only vahi data show hoga jinke last mai 'or' aata hai 

2). $expr = Allows field comparisons within documents

{$expr :{ <expression> }} // expression mai comparison operator ya phir math operator ka use krskte hai 

db.monthlyBudget.find({
    $expr : { $lt: ["$spend","$budget"]}
})

3). $mod = Means Modulas iska main use division k time pr hota hai jaha pr hum remainder ko check krna chahte hai

{field: {$mod : [divisor, remainder]}} // divisor ko divide krte hai field ki value se and agar uska remainder array k remainder se match krta hai to vo saara data aajata hai 

Example :- { age: {$mod:[2,0] }} // 2 ko divide karenge age se and jaha pr bhi 0 aayga i.e even age vale vo sara data aajayga 

4). $jsonSchema = Iska use document ko validate krne k liye hota hai against the Json Schema

*/

?>

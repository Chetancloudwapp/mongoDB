<?php
/*

PIPELINE AGGREGATION SEARCH :- Let suppose humare document mai hume searching krke refining krni hai and after the search result, hum uspr or refinement lagate hai i.e searching result pr bhi or search lagani hai, isi ko hum kahte hai pipeline aggregation that means data ko stage wise filter krte jana . 

Our Document
    |
    |
Stage 1 Refining
    |
    |
Stage 2 Refining
    |
    |
Stage 2 Refining
    |
    |
Desired Outcome

****** Special aggregation operators **********

1). $match = kisi ko match krne k liye 
2). $count = count find krne k liye
3). $sort = sorting krne k liye
4). $sortByCount = count se sorting krne k liye
5). $project == projection implement krskte hai
6). $limit = Limit lagane k liye
7). $skip = skip krne k liye
8). $sample == Random records return krta hai

SYNTAX OF THE AGGREGATE OPERATORS :- Aggregate pipeline (Stage wise filtering)

db.collection_name.aggregate([
    {$match: {age: {$gt:20}}}, ---> Stage-1
    {$sort :{age:1}},   -----> Stage-2
    {$project: {name:1, class:1, _id:0}} ---> Stage-3
])

// ----------------------- Examples of the aggregate pipelines -------------------- //

db.students.aggregate([
    {$match: {age: {$gt :35}}}
])

***** with logical operator ********

db.students.aggregate([
   { $match: { $and : [
       { age : { $gt:20}},  // stage-1 => age 20 se jyada ho 
       { class : "BSC"}   // stage-2 => class bsc ho
   ]}}
])

db.students.aggregate([
    {$match:{age:{$gt:20}}}, // jinki age 20 se jyada ho
    { $count: "names"}  // uska count nikal kr dede
])

db.students.aggregate([
    {$match: {age:{$gt:20}}}, // jinki age 20 se jyada ho
    { $sort: {age:1}}  // sorting with age
])

db.students.aggregate([
    {$match: {age:{$gt:20}}}, // jinki age 20 se jyada ho
    { $sort: {age:1, name:1}}  // sorting with age and if age is same then sort with name 
])

********** Aggregate Pipeline *********

db.students.aggregate([
    { $match : {age :{$gt:20}}}, // stage-1 => jinki age 20 se jyada ho
    { $sort : {age:1, name:1}}, // stage-2 => usee sort krde age and name se 
    { $project : {name:1, class:1, _id:0}} // stage-3 => And after sorting only name and class field show ho
])

NOTE :- Hum projection mai custom variable names bhi de skte hai

db.students.aggregate([
    {$sort : {age:1, name:1}},
    { $project : {name:1, class:1, _id:0,
        isValidAge : { $gt: ["$age", 25]}  // jaha pr bhi age 25 se jyada hai vaha custom variable name isValidAge mai true aajaye and jaha nahi hai vaha false
    }}
])

NOTE :- Agar hum class ka grouping wise data dekhna chahte hai to sortByCount ka use krte hai. ie class BSC k kitne students hai and Msc k kitne hai

db.students.aggregate([
   {$sortByCount : "$class"}
])

******** Skip operator humesha limit se phle hi lagega ******

db.students.aggregate([
    { $match: {age : {$gt:20}}},
    { $sort: {age:1, name:1}},
    { $project: {name:1, class:1, _id:0}},
    { $skip:2}, // starting k 2 record skip krde and 3 and 4 dikhaye . 
    { $limit:2}  // only 2 record show ho
])

********** Sample Operator ***********
db.students.aggregate([
    { $sample: {size:2}} // sample operator random number of records nikal kr deta hai
])
*/



?>
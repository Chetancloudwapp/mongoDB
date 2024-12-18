<?php

/*
***************** MONGODB FIND COMMAND SYNTAX ***********   

There are two types of method for find the documents :-
1). findOne
2). find

db.collection_name.find({ field1:"Value"}) // agar value field mai milti hai to find hojaye. here value refers to kyaa dhund rahe hai and field refers to kisme dhund rahe hai 

db.collection_name.find({}) // sabhi record ko dekhne k liye iska use hota hai 

//--------------- How To Find the particular Value ---------- //

db.collection_name.findOne({ field1 : "Value"})

examples :-

db.students.find({class:"BSC"}) // poore collectiom mai jaha bhi class BSC ho vo data aajaye 
db.students.findOne({city:"Mandsaur"}) //  in general iss method ka use tabhi hota hai jab hum id se search kr rahe hote hai 

// **************************** FIND METHOD WITH PROJECTION *********************

Note:- Projection mai id byDefault show hogi agar hum use likhe yaa na likhe but agar hum id bhi remove krna chahte hai to use 0 mention krke show krna hoga

db.collection_name.find(
    {field:"Value"}, // Query as first param i.e hume kya search krna hai 
    {field1:1, field2:1, field3:0}  // projection param i.e hume sara data nahi dikhana hai only specific data dikhana hai here 1 shows jo parameters dikhana hai and 0 shows jo parameters nahi dikhana hai 
)

// ---------- WE can use specific projection method as well ---------//

db.collection_name.find({class:"BCA"}).projection({field1:1, field2:1 , field3:0})
db.collection_name.find().projection({field1:1, field2:1 , field3:0}) // sare students ka data show karega bus parameters only projections mai defined kiye hue show honge


************************** MONGODB FIND WITH COUND RECORDS *************************

1). Find with Count method

    db.collection_name.find().count()

2). Find with Sorting order

    field = Means kis col se sort krna chahte hai 
    1 = Ascending order sort
    -1 = Descending order sort

    db.collection_name.find().sort({ field2:1})

    db.students.find({}, {name:1, class:1, _id:0}).sort({name:1}) // sorting with projection

3). Find with Limit Records

    db.collection_name.find().limit(3); // only three record show 

    db.collection_name.find().limit(3).skip(3)  

    if skip value is 3 then data would show for the next three record = 4,5,6
    if skip value is 6 then data would show for the next three record = 7,8,9

*/


?>
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
*/


?>
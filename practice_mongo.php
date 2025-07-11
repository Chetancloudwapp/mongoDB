<?php
/*
*********** HOW TO UPDATE DOCUMENT IN MONGODB ***********
1). updateOne
2). updateMany

------------ SYNTAX OF THE UDPATE COMMAND SYNTAX ----------

db.collection_name.updateOne(
   {field:"Value"}, // first param mai field as a filter work karega i.e kise update krna hai and second param mai update 
   {$set: {updated_field:"new_value"}} // here set is a update operator which contains value jo bhi hum update karna chahte hai . Uss field ka name and uski new value 
)

examples :-

db.students.updateOne(
   {name:"chetan"}, // chetan ko find karega collections mai or use update karega
   { $set: {age:25, name:"Chetan Semariya"}} // $set is update operator which helps to update the value 
);


// ------- UPDATE MANY --------- //

db.students.updateMany(
    { class: "BSC"}, // jaha kahi bhi collections mai bsc mai vahi BCA update hojayga
    { $set : {class:"BCA"}}
)

db.students.updateMany(
    { class: "BSC"},
    {$set: {class: "BCA"}}
)


db.students.updateMany(
    { class: "BSC"},
    { $set: {age:45, name:"cehtan semariya"}}
)



************************** UPDATE OPERATORS IN MONGODB ****************

1). $set = document ko update krne k liyee
2). $unset = Remove the field from the document
3). $rename = Rename the field
4). $inc = Increment the field value
5). $mul = Multiplies the field value
6). $currentDate = Sets the field value to the current date 
7). $min = find the minimun value and update it 
8). $max = find the maximum value and update it 

examples :- 

A). Increment the integer value ($inc) :-

db.students.updateMany(
    {name: "Ajay"},
    { $inc: {age:2}}
)


B). Multiply the integer value ($inc) :-

db.students.updateMany(
    {name: "Ajay"},
    { $mul: {age:2}}
)


C). UNSET Operator

db.students.updateOne(
   {name:"Arun Rathore"},
   { $unset : {age:""}}
)

d). Rename Operator

db.students.updateOne(
   {name:"Arun Rathore"},
   { $rename : {"skills":"coding_skills"}}
)
  

db.students.updateMany(
   {},  // sare collection mai name change krne k liye filter param ko khali bhi chod skte hai
   { $rename : {"skills":"coding_skills"}}
)

db.students.updateMany(
   {},
   {$currentDate:{"lastModified":true}} // jis col mai current date nahi hai usme create krdega and jisme hai usme update krdega
)

// ------------------ MIN AND MAX OPERATORS --------------- //


db.students.updateOne(
    {name:"Arun rathore"},
    { $min: {"age":25}}
)

db.students.updateOne(
   {name: 'Arun Rathore'}, // students collection mai Arun rathore ko find karega and agar vaha age 20 se jyada hai to 20 update hojayga and other 20 se kam hai collection mai to update nahi hoga 
   { $min: {"age":20}}
)

db.students.updateOne(
  {name: 'Arun Rathore'},
  {$max : {"age":25}} // agar existing value se badi value hogi tabhi update hoga 
)

************************ UDPATE ARRAY OPERATORS IN MONGODB *************

{skills:["html","python","javascript"]}

1). $push = Add an element to an array
2). $addToSet = Add distinct elements to an array
3). $pop = Remove the first or last element of an array
4). $pull = Removes elements from an array that match the query i.e specific valuee ko delete krne k liye iska use hota hai
5). $pullAll = Ek sath multiple value ko delete krne k liye iska use hota hai 

examples :-

db.students.updateOne(
   { _id: ObjectId('675be4487e980df780e94974')},
   { $push : {"coding_skills" : "Node"}} // iss id pr coding_skills name k param mai Node ko append krdo
)


db.students.updateOne(
   { _id: ObjectId('675be4487e980df780e94974')},
   { $addToSet : {"coding_skills" : "Node"}} // agar Node phle se hi hai to update hojayga and agar nahi hai to add hojayga
)

db.students.updateOne(
    { _id : ObjectId('4937970954723057')},
    { $pop : {"coding_skills" : 1}}
)

db.students.updateOne(
   { _id : ObjectId('09870987887696')},
   { $pull : {"coding_skills": "php"}}
)



db.students.updateOne(
   { _id: ObjectId('675be4487e980df780e94974')},
   { $pop: {"coding_skills": 1}} // first value ko yaa phir last value ko hi delete krta hai agar 1 pass karenge to last value and agar -1 pass karenge to first value delete hogi
)

db.students.updateOne(
   { _id: ObjectId('675be4487e980df780e94974')},
   { $pull : {"coding_skills" : "Php"}} // pull method bhi data ko remove krta hai bus isme hume param ka name dena padta hai jise hatana hai i.e kisi specific value ko remove krne k liye iska use kiya jaata hai 
)

db.students.updateOne(
   { _id: ObjectId('675be4487e980df780e94974')},
   { $pullAll: {"coding_skills" : ['Javascript, Ruby']}} // ek sath multiple value ko delete krne k liye
)

****************************** MONGODB REPLACE COMMAND SYNTAX ***********************

Note:- Existing record ko change krke new record replace krdega

db.collection_name.replaceOne(
   { field:"Value"},        // filter 
   { $set : { "new_field": "new_value"}} // set command 
)

db.students.replaceOne( 
   { _id: ObjectId('675be4487e980df780e94975')},
   { name:"Sarita Dohre", age:29, class:"BCA", coding_skills:["Angular","Swift","Go"]}
)



db.students.replaceOne(
    { _id : ObjectId('347809547235754098')},
    { name:"Sarita Dohre", age:29, class:"BCA"}
)

db.students.replaceOne(
     { _id : ObjectId('4790784902573')},
     { name: "sarita dohre", age:29, class:"BCA"}
)


*/
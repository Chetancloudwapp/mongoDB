<?php
/*

//------------------------------- FIND ONE AND UDPATE MEHTOD ------------------//

*********** OLD METHOD FOR UPDATE **********
db.collection_name.updateOne({
    {field:"Value"},  // search field 
    {$set: {updated_field: "new_value"}} // kya update krna hai 
})

The above method return this kind of stuff :-

{
   acknowledged:true,
   insertedId:null,
   matchedCount:1,
   modifiedCount:1,
   updatedCount:0,
}

********* NEW METHOD FOR UPDATE **********

db.collection_name.findOneAndUpdate({
    {field:"Value"}, // search field
    {$set:{updated_field: "new_value"}}, // updated field
    {Options}   // optional field
})

//----------- Options has 4 types ---------//

1). projection
2). returnDocument == it contains two values after/before 

after = update hone k baad jo new document aayga vo return hoga 
before = update hone k phle jo document hai vo return hoga 

3). sort == Sorting kene k liye.it contains two types of values

1 = ascending sort
-1 = descending sort

4). upsert = find mai agar value nahi milti hai to use add krdeta hai . It also contains two types of values

true = agar record nahi milta hai to new record add krdega
false = agar humne value false pass kari hai and record nahi milta hai to new record add nahi karega 

The above method return this kind of stuff ie our whole document returns :-

{
   field1 : "Value",
   field2 : "Value",
   field3 : "Value",
}

// --------------------------------- EXAMPLES OF THE ABOVE MEHTOD ---------------------//

db.students.findOneAndUpdate(
    {name : "Atul"}, // search query
    { $set:{age:30}}    // set operator
)

Note ;- Isme jo bhi document return hoga uski value updated show nahi hogi old value hi show hogi i.e atul ki age 30 hochuki hai but hume return document mai atul ki old age hi return hogi and agar hum chahte hai ki update document return ho to uske liye hume 3rd parameter bhi dena padega


************ updated document return karega ************

db.students.findOneAndUpdate(
   {name:"Atul"},
   {$set : {age:49}},
   {returnDocument:"after"} // options parameter
)

*********** With Projection Method ***************

db.students.findOneAndUpdate(
   {name:"Atul"},
   {$set : {age:49}},
   {
     returnDocument:"after"   // options parameter
     projection : {name:1, age:1} // only two parameter show honge
     upsert:true   // agar record nahi milega to new add hojayga
   } 
)

*********** With Sort Method **********

db.students.findOneAndUpdate(
    {name:"Salman Khan"},
    {$set :{class:"BIT"}},
    {
        sort : {age:1}   // sorting in ascending order 
    }
)

//------------------------------- FIND ONE AND REPLACE MEHTOD ------------------------------//

NOTE :- Data ko find krke replace krdeta hai.

db.students.findOneAndReplace(
    {name:"Chetan"},   // chetan ko find krke new record replace krdega
    {name:"Sanjay Dutt", age:35, class:"Bcom", city:"Nasik"},
    {
        returnDocument : "after"
    }
)

//------------------------------- FIND ONE AND DELETE MEHTOD ------------------------------//

*********** OLD METHOD *************
db.collection_name.deleteOne({field1: "Value"})

return this kind of Stuff :- {acknowledged:true, deletedCount:1}

********** NEW METHOD **************

Note:- Agar record nahi milta hai to null return krta hai and deleteOne method mai iss tarah se output aata hai 

{ acknowledged: false, deletedCount: 0 }

db.collection_name.findOneAndDelete(
    {field1:"Value"},
    {Options}     // options should be Projection and Sort
)

return this kind of Stuff :- i.e whole document return krta hai 

{
   field1 : "Value",
   field2 : "Value",
   field3 : "Value",
}

db.students.findOneAndDelete(
    {name: "Sanjay Dutt"}
    {projection:{name:1}}
)

*/




?>
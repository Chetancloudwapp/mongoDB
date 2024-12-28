<?php
/*

//------------------------ FIND ONE AND UDPATE MEHTOD ------------------//

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
false = agar record nahi milta hai to new record add nahi karega 

The above method return this kind of stuff ie our whole document returns :-

{
   field1 : "Value",
   field2 : "Value",
   field3 : "Value",
}




*/


?>
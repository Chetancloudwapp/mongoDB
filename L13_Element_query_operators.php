<?php
/*

db.collection_name.find({field:"Value"}) // find method ki help se hum kisi particular field mai value ko search krte hai but agar hume field ko hi search krna hai to hume mongoDb mai humare pass element query operators ki help se krskte hai. 

1). $exists : check krta hai documents mai field hai yaa nahi

{field: {$exists : true}} // only unhi record ko dikhaye jaha pr yhh field exist krti hai
{field: {$exists : false}} // only unhi record ko dikhaye jaha pr yhh field exist nahi krti hai

2). $type : Field ki data type se use search krte hai 

{field: {$type: dataType}}

example : db.students.find({ age: {$type:"string"}})
          db.students.find({ age: {$type:"double"}}) // type mai double ki jagah pr uska number bhi pass krskte hai 
          db.students.find({ age: {$type:["double","int"]}}) // ek sath multitype datatype search krne k liye 
*/

?>

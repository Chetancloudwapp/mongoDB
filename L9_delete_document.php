<?php
/*
**************** DELETE DOCUMENTS IN MONGODB ************* 

Note;- We can delete documents via two methods ;-\
1). deleteOne() => delete single record
2). deleteMany() => delete multiple record 

db.collection_name.deleteOne({ field1 : "Value" }) // Agar field k andar value match hoti hai to delete hojaye
db.collection_name.deleteMany({ field1 : "Value" }) // Agar field k andar multiple values match hoti hai to multiple data delete hojaye
db.collection_name.deleteMany({}) // poore collection ko delete krne k liye 

example :-

db.students.deleteOne({ _id: ObjectId('675be4487e980df780e94973')}) // jaha bhi yhh data mile vo delete hojaye 
db.students.deleteOne({ class:"BCA"}) // agar bca class k andar multiple data hai to only first vala hi delete hoga 


*/



?>
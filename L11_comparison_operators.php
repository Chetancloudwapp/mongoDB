<?php
/*

Note:- Jab bhi hume data ko find, update or delete krna padta hai to hume data mai searching krni padti hai with the help of {field:value} but inhi searching ko advance krne k liye humare pass or bhi advance operators aate hai (comparison operator) jiski help se hum searching and other task easily perform krskte hai i.e complex search bhi krskte hai.

MONGODB Comparison Operators :-

1). $eq = Means equal to {"age":{$eq:20}} // where age is equal to 20 
2). $ne = Means value are not equal to  {"age":{$ne:20}}
3). $gt = Value is greater than another value {"age":{$gt:20}}
4). $gte = Value is greater than or equal to another value {"age":{$gte:20}}
5). $gte = Value is greater than or equal to another value {"age":{$gte:20}}
6). $lt = Value is less than another value {"age":{$lt:20}}
7). $lte = Value is less than or equal to another value {"age":{$lte:20}}
8). $in = Value is matched within an array, we can also pass string value as well
     
    {"age": {$in:[20,38,26]}} // age yaa to 20 ho 38 ho yaa phir 26 ho
    db.students.find({"class": {$in:["MSC","Btech"]}}) // here we can pass class as an string also 

9). nin = Value is not matched within an array, it is a reverse of $in operator

    {"age": {$nin:[20,24]}}  // age na to 20 ho or na hi 24


*/

?>
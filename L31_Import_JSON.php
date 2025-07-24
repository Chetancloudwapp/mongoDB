<?php
/*

HOW TO IMPORT JSON FILE IN MONGODB DATABASE :-  We can use mongoimport tool for import the json file.

syntax :-

mongoimport "D:\students.json" -d school -c testing --jsonArray

=> here school is the database name and -d refers to database which is mandatory field
=> here testing is the collection name (which is optional field) where -c refers to collections in which we want to import the data and agar hum collection ka name nahi bhi dete hai to jis name ki file hai usi name ka collection create hojayga
=> jsonArray is also a optional field agar humare json file array of object ke form mai hai tabhi hum ise pass karenge


*/

?>
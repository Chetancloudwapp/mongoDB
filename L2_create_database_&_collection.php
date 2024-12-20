<?php

/*
How to create Database ?
=> use database_name // database create krne k liye 

ex: use school (use command is used for both the cases a). Create new database b). Use Existing database

HOW TO CREATE COLLECTION ?

db.createCollection("collection_name"); // here db is the database and work as object and createColletion is the method name. Collection name mai space nahi deskte hai. Ek database k andar hum multiple collection bana skte hai

******************* COMMANDS IN MONGODB ***************** :-

1). show dbs = sare database show karane k liye 
10. use database_name = Ek database se dusre database mai switch krne k liye use and uss dataabase ka name likh kr bhi 
9).db.dropDatabase() = Database ko drop krne k liye
2). db = To check the current database

************* COLLECTION COMMANDS *************
3). db.createCollection("students") = To create a new collection
4). show collections = To show all the collections
5). db.students.renameCollection("student") = collection ko rename krne k liye. here student is the new name which we want after rename
=> db.old_name.renameCollection("New Name")
=> db.collection_name.drop()
6). db.help() = To show all the mongodb commands
7). db.collection_name.help() = Display all the commands which we can work on these collections
8). db.library.drop() = To drop the collection
11). db.collection_name.find() = collection k andar ka sara data dekhne k liye 
*/


?>
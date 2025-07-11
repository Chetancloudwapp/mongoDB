<?php
/*

Introduction of the MongoDB :- MOngoDB is a NoSQL (non-relational) database. It stores data in a type of json format called BSON.

What is Database ?
=> A Database is a collection of data stored in a format that can easily be accessed.

Types of Database => it has Two types SQL database and NoSQL Database

************************** SQL DATABASE ***************************
=> SQL Database : Data is stored in the form of tables i.e in a relational format for example: Oracle, MySql, PostgreSQL, MS SQL Server
=> Sql database mai tables mai aapas mai relations hote hai and use retrieve krne k liye hum STRUCTURED QUERY LANGUAGE (SQL) ka use krte hai

Disadvantage of SQL Database : 
=> Schema is fixed ie ek table mai col fix rahenge now let suppose hume kisi particular user k liye koi col badana hai to use kisi particular k liye nahi bada skte poore schema i.e table mai change krna padega but yahi kaam hum non-relational database mai bahut easily se krskte hai 

************************ NOSQL DATABASE ********************************
=> NoSQL Database : They are new database, the data is stored in the form of Bson format as a key value pair similarly like as json like below

{
    name:"Ram Kumar"
    age:21           // document one
    gender:"Male"
}
{
    name:"Shyam Kumar"
    age:28              // document two
    gender:"Male"
}

=> Data jis file k andar save hota hai uss poori file ko hum collection kahte hai and in the above case one collection contains two documents
=> Schema is flexible of non-relational database i.e kisi bhi particular documents mai hum data bada yaa kam bhi krskte hai 

************* WHAT IS THE DIFFERENCE BETWEEN JSON AND BSON ************

The primary difference between both of the two is data Types :-

1). JSON support following datatypes :-
a). String
b). Number
c). Boolean
d). Array
d). Object
d). Null 

=> Format : Text-based (Human readable format)
=> Size : Large due to text overhead
=> Speed : Slower to parse and write
=> Usage : Web API's and data exchange

{ 
    "name":"Chetan", // string
    "age":24,   // number
    "married":true, // boolean
    "kids":,           // null
    "hobbies":["music","sports",]  // array
    "vehicle":{
        {"type":"car","vname":"swift"},  // object
        {"type":"bike", "vname":"pulsar}
    }
}

2). BSON(Binary Json) support following datatypes :-

Benifit : Jyada alag-alag tarah ka data save kara skte hai 
FORMAT => Binary format mai save hota hai i.e NON HUMAN READABLE 
SIZE => More Compact and less file size
SPEED => Faster to parse and write because of its binary format
USAGE => MongoDB and database storage with a rich set of data types.

a). String
b). Double
c). 32 Bit integer
d). 64 Bit integer
e). Boolean
f). Array  
g). Object  
h). Null  
i). Regular Expression  
j). TimeStamp  
k). Date  
l). ObjectId  

************************ BENIFIT OF MONGODB DATABASE **************

=> FLEXIBLE schema design
=> Horizontal Scalability through Sharding
Shrading = let suppose humare pass 2 server hai and 1 server mai data full aagaya hai to jo extra data hoga use hum dusre mai server store kara skte hai similarly aise hi hum multiple server connect krskte hai jise hum shrading kahte hai 
=> High performance of read and write operations because of its binary Json format.
=> Powerful Query language, MongoDB ki query lang in comparison to sql bahut short hoti hai 
=> Built-in-replication for high availability (i.e hum ek hi sever k alag-alag clone banake rakh skte hai jisse humare pass backup always rahta hai )
=> GeoSpatial data support
=> Real time analytics capability ex- Stock market har second mai data change hota rahta hai 
=> Easy integration with Big Data tools
=> Open source and community Driven

************* Requirements to install MONGODB on Windows ************

1). Windows 10/11 (64 Bit)
2). MongoDB Community server
3). MongoDB Shell (mongosh) // mongodb ki sari query isi k andar perform karenge

NOTE:- EK hi database k andar humare pass multiple collection hote hai and har collection k pass apna actual data hota hai, and yhh data multiple bhi hoskte hai jinhe hum document kahte hai i.e collection is the collection of documents . 

*/
?>
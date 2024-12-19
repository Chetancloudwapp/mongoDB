<?php

/*
**************** MONGODB DATATYPES ******************

1). String
2). Double
3). 32-bit Integer == uses 32 Bits (4 Bytes) of memory to store the integer Value
4). 64-bit Integer == Uses 64 Bits (8 Bytes) of memory to store the integer Value
5). Boolean
6). Array
7). Object
8). Null
9). Regular Expression
10). TimeStamp => Same as date but it is non-readable format
11). Date  example => ISODate("2000-10-15T08:00:00Z") // where isodate is a mondoDB function and T stands for time and Z stands for UTC (Universal time coordinated)

NOTE:- 
{dob:ISODate("2024-10-18T18:30:00Z")} // here Z is the utc timezone
{dob:ISODate("2024-10-18T18:30:00+02:00")} // +02:00 stands for central eurupean time
{dob:ISODate("2024-10-18T18:30:00-05:00")} // eastern standard time
{dob:ISODate("2024-10-18T18:30:00")} // Local time zone

// OTHER WAY TO CREATE DATE AND TIME with new Date function

{dob:new Date("2024-10-18T18:30:00Z")}
{dob:new Date()} // for saving current DAte and time 

12). ObjectId example => _id:ObjectId("675b9acdba61b29eb686b01f")

*/

?>
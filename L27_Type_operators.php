<?php

/*

LIST OF TYPE OPERATORS IN MONGODB :- Primary purpose is to change the datatype and it return null value if operation not performed successfully.

1). $toString => string data type mai convert krdeta hai
2). $toInt => value ko integer mai convert krdeta hai
3). $toLong => kisi bhi value ko long integer mai convert krdeta hai (64 bit)
4). $toDouble => value ko double format mai convert krdeta hai i.e float type but in 64 bit
5). $toDecimal => value ko fraction form mai convert krdeta hai i.e points mai but in 128 bit format
6). $toBool => for converting the boolean values
7). $toDate => kisi bhi date ke format ko mongoDB ke ISO format mai convert krdeta hai
8). $toObjectId => Normal id ko mongoDb ki objectId mai convert krne ke liye iska use hota hai
9). $convert => sare operators ka kaam krdeta hai
10). $type => to find the datatype 
11). $isNumber => to check the value if it is numeric or not it return true or false


// ------- SYNTAX OF TYPE OPERATORS ----------- //

db.students.aggregate([
    {
        $project: {
           intValue: { $toInt: "$Age"} // age ko integer datatype mai convert krdo
        }
    }
])

// toString Operator
db.students.aggregate([
    {
        $project: {
           stringValue: { $toString: "$name"}
           stringValue: { $toString: "$dob"}
        }
    }
])

// toInt Operator
db.students.aggregate([
    {
        $project: {
            intValue: { $toInt : "$age"}
        }
    }
])

// toLong Operator
db.students.aggregate([
    {
        $project: {
            intValue: { $toLong : "$marks"}
            intValue: { $toLong : "$pass"}
        }
    }
])

// double Operator
db.students.aggregate([
    {
        $project: {
            doubleValue: { $toDouble : "$age"}
        }
    }
])

// Decimal Operator
db.students.aggregate([
    {
        $project: {
            decimalValue: { $toDecimal : "$marks"}
            decimalValue: { $toDecimal : "$age"}
            decimalValue: { $toDecimal : "$dob"} // convert date into milliseconds
        }
    }
])

// Bool Operator
db.students.aggregate([
    {
        $project: {
            boolValue: { $toBool : "$marks"}
        }
    }
])

// ObjectID Operator
db.students.aggregate([
    {
        $project: {
            objectValue: { $toObjectId : "65wfre9789780954372505"}
        }
    }
])

// CONVERT OPERATOR
db.students.aggregate([
    {
        $project: {
            ConvertedValue: { 
                $convert : {
                    input : "$age", // age ko integer mai convert krdo
                    to : "int"
                }
            }
        }
    }
])

// TYPE OPERATOR (it return the datatype)
db.students.aggregate([
    {
        $project: {
            fieldValue: { $type: "$marks"}
            fieldValue: { $type: "$age"}
        }
    }
])

// IsNumber Operator (check that if the given col datatype is number or not)
db.students.aggregate([
    {
        $project: {
            fieldValue: { $isNumber: "$marks"}
        }
    }
])


*/



?>
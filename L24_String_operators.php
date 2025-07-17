<?php
/*

List of String Operators in MongoDB :-

1). $toString => convert numeric value into string
2). $toUpper  => convert into uppercase
3). $toLower => convert into lowercase
4). $strLenBytes => string ki length ko bytes mai count krke dete hai
5). $strLenCP => similarly string ki length ko count krke deta hai but in characters
6). $strcasecmp => iske help se 2 alag-alag string ko compare krskte hai
7). $substr => deprecated
8). $substrBytes => Iski help se hum kisi bhi string ko bich mai se cut krskte hai
9). $substrCP => Iski help se hum kisi bhi string ko bich mai se cut krskte hai
10). $replaceOne => kuch bhi replace krne ke liye iska use hota hai
11). $replaceAll => 
12). $concat => 2 string to merge krskte hai
13). $split  => string ko parts mai divide krskte hai
14). $ltrim  => extra spaces ko remove krte hai
15). $rtrim
16). $trim
17). $dateFromString => Agar mongoDb ke andar string format mai date save kari hai to ISO format mai date nikalne ke liye iska use hota haii
18). $dateToString => yhh dateFromString se bilkul opposite work krta hai
19). $indexOfBytes => To find the index number of the particular word or string
20). $indexOfCP
21). $regexFind
22). $regexFindAll
23). $regexMatch

******** ------------- EXAMPLES OF THE STRING OPERATORS ----------------- ***************

// toUpper Operator
db.students.aggregate([
   {
      $project: {
        upperCase: {$toUpper: "$name"} 
      }
   }
])

// toLower Operator
db.students.aggregate([
   {
      $project: {
        lowerCase: {$toLower: "$name"} 
      }
   }
])

// strLenBytes Operator
db.students.aggregate([
   {
      $project: {
        name:1,
        lengthInBytes: {$strLenBytes: "$name"} 
      }
   }
])

// strLenCP Operator (where CP is the code points)
db.students.aggregate([
   {
      $project: {
        name:1,
        lengthInBytes: {$strLenCP: "$name"} 
      }
   }
])

// strcasecmp Operator :- 
=> Jab hum string ke andar string ko find krte hai and agar mil jata hai to 0 return krta hai and nahi milta hai to -1 return krta hai and agar output mai 1 aata hai to humara string greater hai
=> This is case insensitive function


db.students.aggregate([
    {
        $project: {
           name:1,
           comparison: { $strcasecmp: ["$name", "Akshay kumar"]}
        }
    }
])

// SUBSTR OPERATOR
db.students.aggregate([
    {
        $project: {
           substring: { $substrBytes: ["$name", 0, 5]} // only 5 characters ko hi uthayega
        }
    }
])

// SUBSTRCP (code points) OPERATOR
db.students.aggregate([
    {
        $project: {
           substring: { $substrCP: ["$name", 0, 5]} // characters ko count karega
        }
    }
])

// REPLACE OPERATOR
db.students.aggregate([
    {
        $project: {
           updatedString: { $replaceOne: {
               input: "$name", // name column mai jaha bhi khan mile use replace krdo kapoor se and replace one mai only first word mai hi changes honge next mai nahi
               find:"Khan",
               replacement: "Kapoor"
           }}
        }
    }
])

// REPLACE ALL OPERATOR
db.students.aggregate([
    {
        $project: {
           updatedString: { $replaceAll: {
               input: "My name is Khan and his name is Khan",
               find:"Khan",
               replacement: "Kapoor"
           }}
        }
    }
])

// SPLIT OPERATOR
db.students.aggregate([
    {
        $project: {
           words: { $split: ["$name", " "]}
        }
    }
])

// CONCAT OPERATOR
db.students2.aggregate([
    {
        $project: {
           fullName: { $concat: ["$firstName", " ", "$lastName"]}
        }
    }
])

// toString OPERATOR
db.students2.aggregate([
    {
        $project: {
           stringField: { $toString: "$age"}
        }
    }
])

// TRIM OPERATOR
db.students.aggregate([
    {
        $project: {
           trimmed: { $ltrim: { input: "$name", chars: " "}}
           trimmed: { $rtrim: { input: "$name", chars: " "}}
           trimmed: { $trim:  { input: "$name", chars: " "}}
        }
    }
])

// DateFrom OPERATOR
db.students.aggregate([
    {
       $project: {
          date: { $dateFromString: {dateString: "$dob"}} // date nikal kr deta hai string mai se
       }
    }
])

// DateTO OPERATOR
db.students.aggregate([
    {
       $project: {
          name:1,
          date: { $dateToString: {format: "%Y-%m-%d", date:"$dob"}}
       }
    }
])

// INDEX OPERATORS (index return krta hai)
db.students.aggregate([
   {
      $project: {
         name:1,
        //  index: { $indexOfBytes: ["$name", "K"]}
        //  index: { $indexOfBytes: ["$name", "K", 5]} // 5th index se starting kare or capital 'K' ko find kare
        //  index: { $indexOfBytes: ["$name", "K", 5, 16]} // 5th index se starting kare or capital 'K' ko find kare 16th index tak
      }
   }
])

// REGEX OPERATORS (It return true or false)
db.students.aggregate([
    {
       $project: {
          name:1,
          isMatch: { $regexMatch: { input: "$name", regex: "^Kat"}} // aise string ko search krna hai jo Kat se start ho rahi ho
          isMatch: { $regexMatch: { input: "$name", regex: "or$"}} // aise string ko search krna hai jiske last mai or aaraha ho
       }
    }
])

// REGEX FIND OPERATORS (It return index number jo bhi phle data mil jayga uska )
db.students.aggregate([
    {
       $project: {
          name:1,
          isMatch: { $regexFind: { input: "$name", regex: "Khan"}} 
          
       }
    }
])

// REGEXFINDAll OPERATORS
db.students.aggregate([
    {
       $project: {
          name:1,
          isMatch: { $regexFindAll: { input: "$name", regex: "^Sa"}}  // jaha pr bhi sa mile unn sabhi ka index number return kare
          
       }
    }
])

*/



?>
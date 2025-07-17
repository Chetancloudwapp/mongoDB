<?php
/*

LIST OF ARRAY OPERATORS IN MONGODB :- 

1). $arrayElemAt => Hum iske andar index number pass krte hai or yhh uske andar kya value hai vo return krta hai.
2). $firstN => Agar hum array mai se first value yaa number of first value ko dekhna chahte hai to iska use krte hai here N represent number of values
3). $lastN => Agar hum array mai se last value yaa number of last value ko dekhna chahte hai to iska use krte hai here N represent number of values
4). $maxN => To find the maximum value of an arr this operator is run only on integer values here N represent number of values
5). $minN => To find the minimum value of an arr this operator is run only on integer values here N represent number of values
6). $slice => array mai se kisi particular value ko nikalne ke liye iska use hota hai
7). $sortArray => Array ko sort order mai krdeta hai
8). $reverseArray => To show array in reverse order
9). $size => To return the size of an array
10). $in => Searching krne ke liye iska use hota hai it return true or false
11). $indexOfArray => purpose is searching but yhh uska index number return krta hai
12). $isArray => Isme hum column ka name pass krte hai jisse yhh uski datatype check krke batata hai ki yhh array hai yaa nahi
13). $map => It is used as an loop
14). $filter => working same as map but yhh conditions check krta hai loop mai
15). $reduce => sari array ki values ko combine krke ek single array mai convert krdeta hai
16). $range => To determine the range
17). $concatArrays => if we have two or more than two array then sabhi array ko combine krne ke liye iska use hota hai
18). $zip => Yhh bhi 2 array ka combination banake deta hai but the difference is that yhh ek subarray bhi banata hai dono array ki indx value ko join krke
19). $arrayToObject => convert array into object
20). $objectToArray => convert object into array

************************* ARRAY OPERATORS SYNTAX ******************************** 

// ArrayElemAT OPERATORS
db.students.aggregate([
   {
      $project: {
          selectedHobby: { $arrayElemAt: ["$Hobbies", 1]} // here hobbies is the col name and hum iske andar 1 index ki value ko dekhna chahte hai
      }
   }
])

// FIRSTN OPERATORS
db.students.aggregate([
   {
      $project: {
        firstName:1,
        firstHobbies: { 
            $firstN: { input : "$hobbies", n:2} // hobbies name ke col mai first 2 value return krdo
        }
      }
   }
])

// LASTN OPERATORS
db.students.aggregate([
   {
      $project: {
        firstName:1,
        lastHobbies: { 
            $lastN: { input : "$hobbies", n:2}
        }
      }
   }
])

// MAXN OPERATORS
db.students2.aggregate([
   {
      $project: {
        name:1,
        topMarks: { 
            $maxN: { input : "$marks", n:1} // top 1 marks dekhna chahte hai marks name ke col mai se 
        }
      }
   }
])

// MinN OPERATORS
db.students2.aggregate([
   {
      $project: {
        name:1,
        topMarks: { 
            $minN: { input : "$marks", n:2}  // lowest 2 marks dekhna chahte hai marks name ke col mai se 
        }
      }
   }
])

// SLICE OPERATORS
db.students.aggregate([
   {
      $project: {
        firstName:1,
        selectedHobbies: { 
            $slice: [ "$hobbies", 2] // hobbies name ke arr ke andar se hume first 2 value nikal kr dega
            $slice: [ "$hobbies", 1, 4] // hobbies name ke arr ke andar se index number 1 se 4 tak sabhi value nikal kr dega
            $slice: [ "$hobbies", -2] // hobbies name ke arr ke andar se last 2 values show karega
            $slice: [ "$hobbies", -2, 1] // last values se start karega or 1 hi value ko show karega
        }
      }
   }
])

// SORT OPERATORS
db.students.aggregate([
   {
      $project: {
        firstName:1,
        sortedHobbies: { 
            $sortArray: { input : "$hobbies", sortBy: 1}  // here sorting is in ascending order
            $sortArray: { input : "$hobbies", sortBy:-1}  // here sorting is in descending order
        }
      }
   }
])

// REVERSE ARRAY OPERATORS
db.students.aggregate([
   {
      $project: {
        firstName:1,
        reversedHobbies: { 
            $reverseArray: "$hobbies"
        }
      }
   }
])

// SIZE OPERATORS (Array ke andar kitni value hai use count krne ke liye)
db.students.aggregate([
   {
      $project: {
        firstName:1,
        HobbiesCount: { 
            $size: "$hobbies"
        }
      }
   }
])

// IN OPERATORS (Used for searching)
db.students.aggregate([
   {
      $project: {
        firstName:1,
        searchResults: { 
            $in: ["music", "$hobbies"] // music ko hobbies array mai search karega agar milta hai to true return krega
        }
      }
   }
])

// INDEXOF OPERATORS (Used for searching and return its index also)
db.students.aggregate([
   {
      $project: {
        firstName:1,
        searchResults: { 
            $indexOfArray: ["$hobbies", "music"] // poore array mai se search karega
            $indexOfArray: ["$hobbies", "music", 1, 3] // only 1 se 3 tak ke index mai hi search karega
        }
      }
   }
])

// IsArray OPERATOR
db.students.aggregate([
   {
      $project: {
        firstName:1,
        isArray: { 
            $isArray: "$hobbies" // check karega hobbies name ka col array hai yaa nahi
        }
      }
   }
])

// Map OPERATOR
db.students.aggregate([
    {
        $project:{
            upperCaseHobbies: {
               $map : {
                  input: "$hobbies",
                  as : "hobbies",
                  in : { $toUpper: "$$hobbies"}
               }
            }
        }
    }
])

db.students2.aggregate([
    {
        $project:{
            newMarks: {
               $map : {
                  input: "$marks",
                  as : "marks",
                  in : { $add: ["$$marks", 2]} // har marks mai 2 ka addition hojayga
               }
            }
        }
    }
])

// FILTER OPERATOR (condition base loop chalana hoto iska use hota hai)
db.students2.aggregate([
    {
        $project:{
            AboveMarks: {
               $filter : {
                  input: "$marks",
                  as : "marks",
                  cond : { $gte: ["$$marks", 60]} // only vahi marks show honge jo 60 se greater ho
                  limit:1 // only ek hi record dekhna hoto
               }
            }
        }
    }
])

// REDUCE OPERATOR
db.students2.aggregate([
    {
        $project:{
            totalMarks: {
               $reduce : {
                  input: "$marks",
                  initialValue:0,
                  in : { $add: ["$$value", "$$this"]}, // here initial value is 0 and jab hi loop chalega tab vo value this mai aajaygi or add hojaygi
                  
               }
            }
        }
    }
])

db.students.aggregate([
    {
        $project:{
            combineHobbies: {
               $reduce : {
                  input: "$hobbies",
                  initialValue:"",
                  in : { $concat: ["$$value", "$$this"]},
                  
               }
            }
        }
    }
])

// RANGE OPERATOR
db.students.aggregate([
    {
        $project:{
            numbers: {
               $range : [1,6,2] // 1 se 6 tak ki range mai 2 step chodke show hoga
            }
        }
    }
])

// CONCAT ARRAY OPERATOR
db.students3.aggregate([
    {
        $project:{
            name:1,
            allSubjects: {
               $concatArrays : ["$subjects", "$extraSubject"] // dono columns combine hojaygene
            }
        }
    }
])

// ZIP OPERATOR
db.students4.aggregate([
    {
        $project:{
            name:1,
            data: {
               $zip : { inputs: ["$subjects", "$marks"]} // dono ke index ko leke ek subarray bana dega LIKE subject => marks
            }
        }
    }
])

// ARRAY TO OBJECT OPERATOR
db.students5.aggregate([
    {
        $project:{
            name:1,
            SubjectInfo: {
               $arrayToObject : "$subjects"
            }
        }
    }
])

// OBJECT To ARRAY OPERATOR
db.students5.aggregate([
    {
        $project:{
            name:1,
            SubjectInfo: {
               $objectToArray : "$studentInfo"
            }
        }
    }
])


*/
?>
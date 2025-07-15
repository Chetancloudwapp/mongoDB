<?php
/*

Note:- Let's understand the case now humare pass student collection ka data hai and hum ispe query lagake yhh find krna chahte hai ki.... 
=> uske hightest marks kitne hai
=> yaa frr students ka count nikalna chahte hai by class name 

to iske liye hume aggregate operator ka 2 baar use krna padega which is not the better way to iss problem ke solution ke liye humare pass mongoDB mai ek operator aata hai facet. Iski help se hum ek hi query mai multiple conditions lagake humara required data nikal skte haii.

// ----------- STUDENT COLLECTION ------------- //

id     Name           Class    Marks
1).    Akshay Kumar   BCA      65
2).    Salman Khan    BTech    56
2).    Harsh Namdeo   BCA      72
2).    Sanjay Dutt    BTech    96

// -------- SYNTAX OF FACET OPERATOR ----------- //

Benifit :- Iske help se hume server pr baar baar request nahi bhejna pdti hai because ek hi query mai kaam hojaata hai

db.students.aggregate([
   {
        $facet: {
            topMarks: [  // here topMarks is our custom field name isme hum sabhi aggregate function ka use krke humara desired output nikal skte hai or isi tarah multiple custom field bhi bana skte hai
               { $project : { topMarks : { $max: "$Marks"}}}
            ],
            totalStudents: [
               { $group: { _id: "$Class", count: { $sum:1}}},
               { $sort: {$count: -1}}
            ]
        }
   }
])

// examples :- with multiple conditions

Case-1 :- Show total sales with sum
=> with sorting order
=> Only want to show top 3 results

db.sales.aggregate([
   { $group: { _id: "$product", totalSales: { $sum : { $multiply: ["$price", "$quantity"]}}}},
   { $sort : { totalSales: -1}},
   { $limit: 3}
])

Case-2 :- 

=> Top 3 products with the highest sales
=> Total revenue
=> The count of sales grouped by region

db.sales.aggregate([
   {
      $facet: {
         topProducts: [
            { $group : { _id: "$product", totalSales: {$sum: { $multiply: ["$price", "$quantity"]}}}},
            { $sort: { totalSales: -1 }} ,
            { $limit: 3} 
         ],
         totalRevenue : [
            { $group : { _id: null, totalRevenue: { $sum : { $multiply: ["$price", "$quantity"]}}}}
         ],
         salesByRegion : [
            { $group : { _id:"$region", count: { $sum:1 }}},
            { $sort: { count: -1 }} ,
         ]
      }
   }
])


******************************* AGGREGATE FILL OPERATOR **************************************** 

Note:- Now as we see in our collection salman and sanjay dutt ke marks blank hai and agar hum chahte hai ki jab bhi data ko retrieve kare to isme blank space ki jagah kuch na kuch value jarur aaye to uske liye hum fill operator ka use krte hai. And value ko fill krne ke liye hum apne tarah se operator ka use krskte hai.

STUDENTS COLLECTION :-

Case-1 :- 

id       Name         Marks
1).    Akshay Kumar   65
2).    Salman Khan    0   // show zero instead of null values
3).    John Abraham   59
4).    Sanjay Dutt    0 
5).    Akshay Kumar   65

Case-2 :- 

id       Name         Marks
1).    Akshay Kumar   65
2).    Salman Khan    55.2   // show avg of akshay and john
3).    John Abraham   59
4).    Sanjay Dutt    68.9   // show avg of john and akshay 
5).    Akshay Kumar   65

// SYNTAX OF FILL OPERATOR :- 

db.students.aggregate([
   {
      $fill: {
         partitionBy: { "class" : "$class"}, // optional field
         sortBy : { _id:1 }, optional field
         output : {
            "marks" : {
               method:"value" 
               method:"linear" // linear piche vali or next vali document ki value ka center nikal deta hai
               method:"locf" // previous record ki value ko present record mai set krdeta hai
               value:0 // jis bhi document mai marks ki value set nahi hogi vaha 0 set hojayga. Note agar method ki value "value" nahi li hai to niche vale param mai value ka use nahi krskte hai
            }
         }
      }
   }
])

// EXAMPLES 
db.students.aggregate([
   {
      $fill: {
         output: {
            "per": {value:0} // JAHA bhi percentage ki value nahi hai vaha 0 set hojayga
         }
      }
   }
])

****** ------ LOCF METHOD ------- ******
db.students.aggregate([
   {
      $fill: {
         output: {
            "per": {method:"locf"} // JAHA bhi percentage ki value nahi hai vaha uske previous vali value show hogi
         }
      }
   }
])

****** ------ LINEAR METHOD ------- ******
db.students.aggregate([
   {
      $fill: {
         sortBy: { _id: -1},
         partitionBy: { "class" : "$class"},
         output: {
            "per": {method:"linear"} // JAHA bhi percentage ki value nahi hai vaha uske previous vali or next vali ka center show hoga
         }
      }
   }
])

*/
?>

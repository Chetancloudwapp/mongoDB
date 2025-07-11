<?php
/*

// ----------------- BUCKET and Bucket AUTO OPERATOR ----------------- //

=> Note :- working same as group operator but the difference is that isme hum jo grouping krte hai vo numeric field ki value pr hi krte hai

let suppose we have this kind of data in our collections :-

{ _id:1, name:"Sanjay Dutt", percentage: 90 }
{ _id:2, name:"Shyam Dutt", percentage: 80 }
{ _id:3, name:"Ram Dutt", percentage: 70 }
{ _id:4, name:"Ajay Dutt", percentage: 60 }
{ _id:5, name:"Amit Dutt", percentage: 50 }
{ _id:6, name:"Raj Dutt", percentage: 40 }

Now ab hum ye chahte hai ki jo bhi student ki percentage 90 se jyada hai unhe ek group mai daal do, jo 80 se jyada hai unhe dusre group mai daal do, jo 70 se jyada hai unhe dusre group mai daal do and so on i.e ek range ke hisab se count nikalte hai ise ko hum bucket kehte hai

************** syntax of Aggregate bucket operator ***************

db.collectionName.aggregate([
  {
    $bucket: {
      groupBy: "$percentage", // field name kis field pr grouping karni hai, isme usi field ka name dena hai jo numeric ho bcz range number pr hi hoti hai
      boundaries: [30,50,70,100], // array of boundaries i.e range dena hai (30 se 50, 50 se 70, 70 se 100)
      default: "other", // jo bhi value range mai nahi aati hai vo default mai chali jayegi other name ke group mai
      output: { // output mai kya chahiye
        count: { $sum: 1 }, // count of records in each group
      }
    }
  }
])


// example of bucket operator :- BeDefault yhh operator count ko hi return karta hai to agar hum output nahi bhi define krte hai to bhi chalega

db.students.aggregate([
    {   $match : { gender : "male"}}, // isme hum search filter bhi laga skte hai
    {
        $bucket:{
            groupBy: "$percentage",
            boundaries: [33,45,60,80,100],
            default:"Fail Students",
            output:{
                count:{ $sum:1}
            }
        }
    }
])

************** syntax of Aggregate bucketAuto operator ***************

Note:- Ismse hume range dene ki zarurat nahi hoti hai, ye khud hi range bana leta hai like as if we pass buckets = 3 to ye 3 buckets bana dega

db.students.aggregate([
    {
        $bucketAuto:{
            groupBy: "$percentage",
            buckets:3,
        }
    }
])

=> If we want to retrieve count as well as average percentage then we can write like this

db.students.aggregate([
    {
        $bucketAuto:{
            groupBy: "$percentage",
            buckets:3,
            output:{
                count:{ $sum:1},
                Average_percentage:{ $avg:"$percentage" }
                Total_percentage:{ $sum:"$percentage" }
            }
        }
    }
])

*/




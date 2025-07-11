<?php
/*

// --------------- Aggregate Out Operator ---------------- //

NOte:- Agar kisi bhi existing operator ke andar se hume ek new collection banana hai to uske liye hum "OUT OPERATOR" ka use krte hai

************** SYNTAX OF THE OUT OPERATOR *******************

db.students.aggregate([
    { $match" {"Class": "Btech"}},
    { $out: "Student_new"} 
]);

*/



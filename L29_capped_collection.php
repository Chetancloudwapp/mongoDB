<?php

/*

Capped Collection :- Let suppose hum chahte hai ki humare pass ek collection hai and hum usme only 3 records hi add krskte hai 3 se jyada nahi aise hi collection ko hum capped collection kahte hai. that means isme humne 3 limit ki capping krdi hai and capping hum size mai bhi krskte hai i.e 1024 se jyada ka data add nahi krskte
=> Capped collection mai jese hi hum 4th record add karenge to 1st record delete hojayga because limit only 3 ki hi hai

// ----------- HOW TO MAKE CAPPED COLLECTIONS --------------- //
db.createCollection(
    "students":{
        capped: true,
        size:1024, // total size
        max:3  // max 3 limit
    }
)

db.createCollection("log", {
    capped: true,
    size:51200,
    max:5
})

// -------- If we want to sort the collection then we can do like that ----------- //

db.log.find().sort({ $natural:-1}) // here natural is the inbuilt method and -1 refer to the descending and 1 refer to ascending

// How to check if our collection is capped collection or not

db.log.isCapped()

// --------- How to make our existing collection to Capped Collections ------------------ //

db.runCommand({
    convertToCapped: "students",
    size:51200, // only this is working
    max:2 // this property is not working because hum existing collection mai old data pr restrictions nahi laga skte hai
})

// --------- How to increase Capped Collection Limit ------------ //
db.runCommand({
    collMod: "log",
    cappedMax: 7
})

// --------- How to increase Capped Collection Size ------------ //
db.runCommand({
    collMod: "log",
    cappedSize: 100000
})



*/

?>
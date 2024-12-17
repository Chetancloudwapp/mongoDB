<?php
/*
booltype:"string",
        : Double (minimum, maximum)
        : integer (int likhna padega validation mai) (minimum, maximum)
        : Boolean (bool likhna padega validation mai)
        : Array => items:{bsonType:"string"}, // array mai humare pass items name ki properties hai jisme hum humare validation define karenge i.e in this case array k andar sari stirng value hi aaygi 
        : Object
        : Date

************ OBJECT VALIDATION IN MONGODB ************

address:{
    bsonType:"object",
    required:["street","city","zipCode"],
    properties:{
        street:{
           bsonType: "string",
           description: "Street must be a string and is required."
        },
        city:{
           bsonType: "string",
           description: "City must be a string and is required."
        },
        zipCode:{
           bsonType: "int",
           description: "Zip code must be a string and is required."
        },
    }
}

----------------------- CREATE NEW COLLECTION AND IMPLEMENT VALIDATION AS WELL ---------------
db.createCollection("students", {
    validator:{  // validator is a mongodb class
        $jsonSchema : {   // $jsonSchema is a mongoDB obj class which is required
            required:['name','age'], title:"Student Object Validation", // jab bhi err aaygi tab yhh title sabse upar show hoga note title and required field both are opitonal
            properties:{ // properties k andar hum validation ko define karenge that means this is compulsory field 
                name:{
                    bsonType:"string", // name must be a string 
                    description:"Name must be a string and is required" // validation msg
                },
                age:{
                    bsonType:"int", // age must be an int NOTE THAT: int and double k case mai hume 2 properties bhi milti hai maximum and minimum
                    minimum:5,
                    maximum:20,
                    description:"Age must be an integer between 5 and 20."
                },
                course:{
                    bsonType:"string",
                    enum:["BCA","Btech","BSC"],
                    description:"Course must be one of the following values: BCA, Btech or BSC"
                } 
            }
        }
    }
})

------------- EXISTING COLLECTION MAI VALIDATION IMPLEMENT -------------------

db.runCommand({
    collMod: "students", // collection name given here
    validator: {
       $jsonSchema:{
          required:["name","age","course"],
          properties:{
            name: {
               bsonType:"string",
               description: "Name must be a string and is required"
            },
            age: {
               bsonType:"int",
               minimum:20,
               maximum:72,
               description: "Age must be an integer between 20 and 35 and is required"
            },
            course:{
                bsonType:"string",
                enum:["BCA","Btech","BSC"],
                description:"Course must be one of the following values: BCA, Btech or BSC"
            },
            hobbies:{
                bsonType:"array",
                items: {
                    bsonType:"string"  // array k andar jo bhi value aaygi vo strings mai aaygi
                },
                description:"Hobbies must be an array of strings"
            },
            address:{
                bsonType:"object",
                required: ['street','city','zip'],
                properties: {
                    street:{
                        bsonType: "string",
                        description:"street must be a string and is required."
                    },
                    city:{
                        bsonType: "string",
                        description:"City must be a string and is required."
                    },
                    zip:{
                        bsonType: "int",
                        description:"Zip code must be a string and is required."
                    },
                }
            } 
          }
       }
    }
});

*/
?>
<?php
/*

HOW TO TAKE DATABASE BACKUP IN MONGODB :- mongodump is a command line tool which is used to dump the mongodb database and collections

COMMAND :-

Case-1 :- If we want to export the entire database then our command will be :-

mongodump -d school -o c:\backup (OR WE CAN ALSO WRITE LIKE THAT)

mongodump --db school --out c:\backup

// here -d is database name and -o means output folder i.e school database ko c drive ke backup folder mai backup lelo

Case-2 :- If we want to export the specific collection then our command will be like this :- 

mongodump -d school -c students -o c:\backup

// here school is the database and students is our collection name which is export in our c driver backup folder

Case-3 :- If we want to backup all over mongodb database i.e mongodb ke sabhi database ka backup lena chahte hai

mongodump -o c:\backup

// ----------------------- HOW TO RESTORE DATABASE -------------------------- //

=> mongorestore comes in picture with the help of this we can restore our database as well

CASE-1 :-
*********** HOW TO RESTORE OUR DATABASE FROM LOCAL FOLDER Syntax **************

mongorestore -d school c:\backup\school // yaha hume vo path dena hota hai jaha se hume apne database ko upload krna hai i.e jaha pr database ki file rakhi hui hai

CASE-2 :-
*********** HOW TO RESTORE COLLECTION FROM LOCAL FOLDER Syntax **************

mongorestore -d school -c students c:\backup\school\students.bson // yaha hume vo path dena hota hai jaha se hume apne collection ko upload krna hai i.e jaha pr collection ki file rakhi hui hai

CASE-3 :- 

********** AGAR EK SATH SABHI DATABASE KO UPLOAD KRNA CHAHTE HAI TO **************

mongorestore --dir c:\backup

mongorestore --drop --dir c:\backup  // phle sabhi database delete hojayenge then after vapas se create honge
*/

// mongodump -d school -c library -o Documents

?>

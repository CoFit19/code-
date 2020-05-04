CREATE TABLE IF NOT EXISTS 'users' (
'id' int(11) NOT NULL AUTO_INCREMENT,
'username' varchar(255),
'email' varchar(255) NOT NULL,
'password' varchar(32) NOT NULL,
'firstname' varchar(255) NOT NULL,
'lastname' varchar(255) NOT NULL,
'height'int(11) NOT NULL,
'weight'int(11) NOT NULL,
PRIMARY KEY ('id')
);
/*when putting into my sql do not use ''*/


create table consumer(consumername varchar(20),consumerid varchar(10) primary key,password varchar(20));
create table album(albumid varchar(10) primary key,name varchar(20).albumart bytea);
create table songs(songid varchar(10) primary key,name varchar(20),artistname varchar(20), songart bytea,genre varchar(10),filepath varchar(25));
create table rating(consumerid varchar(20),songid varchar(10) primary key,value integer, foreign key(consumerid) references consumer (consumerid));
create table playlist(songid varchar(10),albumid varchar(10),name varchar(20),foreign key(songid) references songs(songid),foreign key(albumid) references album(albumid));

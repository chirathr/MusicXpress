create table user(
      id numeric(10) primary key,
      username varchar(100) unique,
      fullname varchar(100),
      email varchar(100),
      password varchar(32)
    );

create table album(
      id numeric(10) primary key,
      name varchar(100),
      albumart varchar(100)
    );

create table song(
      id numeric(10) primary key,
      name varchar(100),
      artistname varchar(100),
      songart varchar(100),
      genre varchar(100),
      filepath varchar(100)
    );

create table rating(
      songid numeric(10) references song(id),
      userid numeric(10) references user(id),
      value numeric(2)
    );

create table playlist(
      songid numeric(10) references song(id),
      albumid numeric(10) references album(id),
      name varchar(1000),
      song_order_numeber numeric(10)
    );

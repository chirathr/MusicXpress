create table users(
      id numeric(10) primary key,
      username varchar(100) unique,
      fullname varchar(100),
      email varchar(100),
      password varchar(32)
    );

create table albums(
      id numeric(10) primary key,
      name varchar(100),
      albumart varchar(100)
    );

create table songs(
      id numeric(10) primary key,
      name varchar(100),
      artistname varchar(100),
      songart varchar(100),
      genre varchar(100),
      filepath varchar(100)
    );

create table ratings(
      songid numeric(10) references songs(id),
      userid numeric(10) references users(id),
      value numeric(2)
    );

create table playlists(
      id numeric(10) primary key,
      name varchar(100)
    );

create table playlistSongs(
      playlistid numeric(10) references playlists(id),
      userid numeric(10) references users(id),
      songid numeric(10) references songs(id),
      song_order_numeber numeric(10)
    );

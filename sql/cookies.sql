drop table if exists Cookies;
create table Cookies
( CookieID int unsigned not null auto_increment primary key,
Cookie varchar(50),
Brand varchar(50),
Calories int(7),
Description text
);
insert into Customers values (NULL,"Oreo","Nabisco",140, "these things are 140 cals");

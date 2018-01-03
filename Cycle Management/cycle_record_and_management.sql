create table cycle_info
(
	chassis_number varchar(30)	not null unique ,
	brand_name varchar(30),
	model_number varchar(30) not null,
	price numeric(10,2) check (price > 0) ,
	date_of_sale char(20) ,
	for_sale int(1) not null ,
	primary key(chassis_number)
);
create table user
(
	nid varchar(15) not null unique ,
	name varchar(20) not null,
	email varchar(50) not null unique,
	district varchar(15) ,
	thana varchar(15) ,
	password varchar(20) not null ,
	number_of_cycle numeric(3,0) ,
	phone varchar(30) not null,
	primary key(nid)
);
create table cycle_owner
(
	chassis_number varchar(15)	not null unique ,
	nid varchar(15) not null ,
	primary key(chassis_number),
	foreign key(chassis_number) references cycle_info(chassis_number),
	foreign key(nid) references user(nid)
);





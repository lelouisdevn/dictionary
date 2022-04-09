create table user (
	UserID Int primary key,
	UserName varchar(50) not null,
	UserDOB varchar(20),
	UserRole Int,
	UserJoinAt varchar(20)
);

create table account (
	AccountId Int primary key,
	UserEmail varchar(50) not null unique,
	UserPass varchar(20) not null,
	UserID Int,
	FOREIGN KEY(UserID) references user(UserID)
);

create table bookmark (
	UserID Int,
	Word varchar(40) not null unique,
	Added_at varchar(20) not null,
	FOREIGN KEY(UserID) references User(UserID)
);
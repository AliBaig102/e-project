# Create Database
create database e_commerce;

use  e_commerce;

# Create Category Table

create table categories(
   Category_Id int primary key auto_increment,
   Category_Name varchar(100) not null,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp on update current_timestamp
);

# Create Users Table

create table users(
  User_Id int primary key auto_increment,
  username varchar(200) not null unique ,
  User_Email varchar(50) not null unique ,
  User_Password varchar(100) not null ,
  User_Profile varchar(200) not null ,
  User_Role varchar(50)not null default 'user',
  User_Access_Token varchar(200) not null,
  created_at datetime default current_timestamp,
  updated_at datetime default current_timestamp on update current_timestamp
);

# Create Shops Table

create table shops (
   Shop_Id int primary key auto_increment,
   Shop_Name varchar(50) not null ,
   Shop_Description text not null ,
   Shop_Email varchar(50) not null,
   Shop_Contact varchar(13) not null ,
   Shop_Avatar varchar(200) not null ,
   Shop_Cover varchar(200) not null,
   User_Id int,
   created_at datetime default current_timestamp,
   updated_at datetime default current_timestamp on update current_timestamp,
   foreign key (User_Id) references users (User_Id)
);

# Create Address Table

create table address(
    Address_Id int primary key auto_increment,
    Full_Name varchar(100) not null ,
    Address varchar(200) not null ,
    Phone_Number varchar(200) not null ,
    Nearest_Landmark varchar(100) not null ,
    Province varchar(100) not null ,
    City varchar(100) not null ,
    Area varchar(100) not null ,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp on update current_timestamp
);

# Create Products Table
create table products(
    Product_Id int primary key auto_increment,
    Product_Title varchar(150) not null ,
    Product_Description text not null ,
    Product_Images text not null ,
    Product_Specs text not null ,
    Product_Features text not null ,
    Product_Colors varchar(200) not null ,
    Product_Price varchar(200) not null ,
    Product_Quantity int not null ,
    Max_Orders int not null ,
    Stock_Status varchar(100) not null default 'In Stock',
    SKU varchar(100) not null,
    Category_Id int,
    Shop_Id int,
    foreign key (Category_Id) references categories(Category_Id),
    foreign key (Shop_Id) references shops(Shop_Id),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp on update current_timestamp
);

# Create Orders Table
create table orders(
    Order_Id int primary key auto_increment,
    Order_Quantity int not null ,
    Sub_Total varchar(200) not null ,
    Delivery_Status varchar(100) not null ,
    Address_Id int,
    User_Id int,
    Product_Id int,
    foreign key (Address_Id) references address(Address_Id),
    foreign key (User_Id) references users(User_Id),
    foreign key (Product_Id) references products(Product_Id),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp on update current_timestamp
);

# Create Carts Table
create table carts(
    Cart_ID int primary key  auto_increment,
    User_Id int,
    Product_Id int,
    foreign key (User_Id) references users(User_Id),
    foreign key (Product_Id) references products(Product_Id),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp on update current_timestamp
);
# Create Messages Table
create table messages(
    Message_Id int primary key auto_increment,
    User_Id int,
    Shop_Id int,
    Product_Id int,
    Message text not null ,
    Message_Status varchar(20),
    foreign key (User_Id) references users(User_Id),
    foreign key (Product_Id) references products(Product_Id),
    foreign key (Shop_Id) references shops(Shop_Id),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp on update current_timestamp
);

# Create Reviews Table
create table reviews(
    Review_Id int primary key auto_increment,
    Rating_Star int not null ,
    Review_Message text not null ,
    User_Id int,
    Product_Id int,
    foreign key (User_Id) references users(User_Id),
    foreign key (Product_Id) references products (Product_Id),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp on update current_timestamp
)


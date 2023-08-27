Drop Table if exists Menu
Drop Table if exists Employees
Drop Table if exists OnlineBookings
Drop Table if exists Orders
Drop Table if exists OrderItems

CREATE DATABASE MenuTable;
USE MenuTable;


CREATE TABLE Menu (
    ID INT PRIMARY KEY,
    Name NVARCHAR(50),
    Price DECIMAL(10, 2), 
    Description NVARCHAR(255),
    Photo NVARCHAR(255)
);

CREATE TABLE Employees (
    ID INT PRIMARY KEY,
    Name NVARCHAR(100),
    Email NVARCHAR(100),
    Position NVARCHAR(50),
    Password NVARCHAR(25)
);

CREATE TABLE OnlineBookings (
    Phone_Number INT PRIMARY KEY,
    Time TIME,
    Date DATE,
    Guests INT
);

REATE TABLE Orders (
    OrderID INT PRIMARY KEY,
    TableNumber INT
);

CREATE TABLE OrderItems (
    OrderItemID INT PRIMARY KEY AUTO_INCREMENT,
    OrderID INT,
    ItemID INT
);

INSERT INTO Orders (OrderID, TableNumber)
VALUES
    (1001, NULL),
    (1002, NULL),
    (1003, NULL),
    (1004, NULL),
    (1005, NULL);

INSERT INTO OrderItems (OrderID, ItemID)
VALUES
    (1001, 101),
    (1001, 102),
    (1001, 105),
    (1002, 103),
    (1002, 104),
    (1003, 101),
    (1003, 105),
    (1003, 106),
    (1004, 102),
    (1004, 104),
    (1004, 107),
    (1005, 103),
    (1005, 106),
    (1005, 108);



INSERT INTO OnlineBookings (Phone_Number, Time, Date, Guests)
VALUES
    (1234567890, '09:00:00', '2023-08-28', 2),
    (9876543210, '14:30:00', '2023-08-29', 4),
    (5555555555, '18:45:00', '2023-08-30', 6),
    (7777777777, '12:15:00', '2023-08-31', 3),
    (8888888888, '20:00:00', '2023-09-01', 5);

INSERT INTO Employees (ID, Name, Email, Position, Password)
VALUES
    (1, 'John Smith', 'john.smith@email.com', 'Manager', 'Password123'),
    (2, 'Jane Doe', 'jane.doe@email.com', 'Employee', 'SecurePass'),
    (3, 'Alice Brown', 'alice.brown@email.com', 'Employee', '12345'),
    (4, 'Bob Johnson', 'bob.johnson@email.com', 'Manager', 'SecretPass'),
    (5, 'Sarah White', 'sarah.white@email.com', 'Employee', 'Pass123');

INSERT INTO Menu (ID, Name, Price, Description, Photo)
VALUES
    (1, 'Cappuccino', 4.99, 'A classic Italian coffee', 'images/cappuccino.jpg'),
    (2, 'Espresso', 3.49, 'Strong and concentrated', 'images/espresso.jpg'),
    (3, 'Latte', 5.49, 'Creamy and mild', 'images/latte.jpg'),
    (4, 'Americano', 4.29, 'Diluted espresso', 'images/americano.jpg'),
    (5, 'Mocha', 5.99, 'Coffee and chocolate', 'images/mocha.jpg'),
    (6, 'Macchiato', 4.79, 'Espresso with a dash of milk', 'images/macchiato.jpg'),
    (7, 'Caffè Ristretto', 4.79, 'Short and strong espresso', 'images/ristretto.jpg'),
    (8, 'Iced Coffee', 4.99, 'Chilled coffee with ice', 'images/iced_coffee.jpg'),
    (9, 'Hot Chocolate', 4.99, 'Rich and chocolaty', 'images/hot_chocolate.jpg'),
    (10, 'Green Tea Latte', 4.49, 'Matcha and steamed milk', 'images/green_tea_latte.jpg'),
    (11, 'Chai Latte', 4.49, 'Spiced tea with milk', 'images/chai_latte.jpg'),
    (12, 'Caramel Macchiato', 5.49, 'Caramel, espresso, and milk', 'images/caramel_macchiato.jpg'),
    (13, 'Tea', 3.99, 'Assorted tea flavors', 'images/tea.jpg'),
    (14, 'Lemonade', 3.99, 'Refreshing lemon drink', 'images/lemonade.jpg'),
    (15, 'Orange Juice', 3.49, 'Freshly squeezed', 'images/orange_juice.jpg'),
    (16, 'Cheeseburger', 7.99, 'Classic beef burger with cheese', 'images/cheeseburger.jpg'),
    (17, 'Veggie Wrap', 6.49, 'Grilled vegetables in a wrap', 'images/veggie_wrap.jpg'),
    (18, 'Caesar Salad', 8.99, 'Romaine lettuce, croutons, and Caesar dressing', 'images/caesar_salad.jpg'),
    (19, 'Margherita Pizza', 10.99, 'Tomato, mozzarella, and basil on thin crust', 'images/margherita_pizza.jpg'),
    (20, 'Spaghetti Bolognese', 9.49, 'Spaghetti with meat sauce', 'images/spaghetti_bolognese.jpg'),
    (21, 'Sushi Platter', 14.99, 'Assorted sushi rolls', 'images/sushi_platter.jpg'),
    (22, 'Chicken Tenders', 6.99, 'Breaded chicken tenders', 'images/chicken_tenders.jpg'),
    (23, 'French Fries', 3.99, 'Crispy golden fries', 'images/french_fries.jpg');
Drop Table if exists menu;
Drop Table if exists Employees;
Drop Table if exists OnlineBookings;
Drop Table if exists Orders;
Drop Table if exists OrderItems;

CREATE TABLE menu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    photo VARCHAR(255)
);

CREATE TABLE Employees (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name NVARCHAR(100),
    Email NVARCHAR(100),
    Position NVARCHAR(50),
    Password NVARCHAR(255)
);

CREATE TABLE OnlineBookings (
    Phone_Number NVARCHAR(255) PRIMARY KEY,
    Time TIME,
    Date DATE,
    Guests INT
);

CREATE TABLE Orders (
    OrderID INT PRIMARY KEY AUTO_INCREMENT,
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
    ('1234567890', '09:00:00', '2023-08-28', 2),
    ('9876543210', '14:30:00', '2023-08-29', 4),
    ('5555555555', '18:45:00', '2023-08-30', 6),
    ('7777777777', '12:15:00', '2023-08-31', 3),
    ('8888888888', '20:00:00', '2023-09-01', 5);

INSERT INTO Employees (ID, Name, Email, Position, Password)
VALUES
    (1, 'John Smith', 'john.smith@email.com', 'Manager', '$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'),
    (2, 'Jane Doe', 'jane.doe@email.com', 'Employee','$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'), 
    (3, 'Alice Brown', 'alice.brown@email.com', 'Employee','$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'), 
    (4, 'Bob Johnson', 'bob.johnson@email.com', 'Manager', '$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'),
    (5, 'Sarah White', 'sarah.white@email.com', 'Employee', '$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26');

INSERT INTO menu (name, price, description, photo)
VALUES
    (1, 'Cappuccino', 4.99, 'A classic Italian coffee', 'Cappuccino.jpg'),
    (2, 'Espresso', 3.49, 'Strong and concentrated', 'Espresso.jpg'),
    (3, 'Latte', 5.49, 'Creamy and mild', 'Latte.jpg'),
    (4, 'Americano', 4.29, 'Diluted espresso', 'Americano.jpg'),
    (5, 'Mocha', 5.99, 'Coffee and chocolate', 'Mocha.jpg'),
    (6, 'Macchiato', 4.79, 'Espresso with a dash of milk', 'Macchiato.jpg'),
    (7, 'Caffè Ristretto', 4.79, 'Short and strong espresso', 'Caffè_Ristretto.jpg'),
    (8, 'Iced Coffee', 4.99, 'Chilled coffee with ice', 'Iced_Coffee.jpg'),
    (9, 'Hot Chocolate', 4.99, 'Rich and chocolaty', 'Hot_Chocolate.jpg'),
    (10, 'Green Tea Latte', 4.49, 'Matcha and steamed milk', 'Green_Tea_Latte.jpg'),
    (11, 'Chai Latte', 4.49, 'Spiced tea with milk', 'Chai_Latte.jpg'),
    (12, 'Caramel Macchiato', 5.49, 'Caramel, espresso, and milk', 'Caramel_Macchiato.jpg'),
    (13, 'Tea', 3.99, 'Assorted tea flavors', 'Tea.jpg'),
    (14, 'Lemonade', 3.99, 'Refreshing lemon drink', 'Lemonade.jpg'),
    (15, 'Orange Juice', 3.49, 'Freshly squeezed', 'Orange_Juice.jpg'),
    (16, 'Cheeseburger', 7.99, 'Classic beef burger with cheese', 'Cheeseburger.jpg'),
    (17, 'Veggie Wrap', 6.49, 'Grilled vegetables in a wrap', 'Veggie_Wrap.jpg'),
    (18, 'Caesar Salad', 8.99, 'Romaine lettuce, croutons, and Caesar dressing', 'Caesar_Salad.jpg'),
    (19, 'Margherita Pizza', 10.99, 'Tomato, mozzarella, and basil on thin crust', 'Margherita_Pizza.jpg'),
    (20, 'Spaghetti Bolognese', 9.49, 'Spaghetti with meat sauce', 'Spaghetti_Bolognese.jpg'),
    (21, 'Sushi Platter', 14.99, 'Assorted sushi rolls', 'Sushi_Platter.jpg'),
    (22, 'Chicken Tenders', 6.99, 'Breaded chicken tenders', 'Chicken_Tenders.jpg'),
    (23, 'French Fries', 3.99, 'Crispy golden fries', 'French_Fries.jpg');
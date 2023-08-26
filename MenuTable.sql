Drop Table if exists MenuTable

CREATE DATABASE MenuTable;
USE MenuTable;


CREATE TABLE Menu (
    ID INT PRIMARY KEY,
    Name NVARCHAR(50),
    Price DECIMAL(10, 2), 
    Description NVARCHAR(255),
    Photo NVARCHAR(255)
);


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
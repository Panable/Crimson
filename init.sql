-- Drop the "menu" table if it exists
DROP TABLE IF EXISTS menu;

-- Create the "menu" table
CREATE TABLE menu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    photo VARCHAR(255)
);

-- Insert sample data into the "menu" table
INSERT INTO menu (name, price, description, photo) VALUES
    ('Espresso', 2.50, 'A strong black coffee', NULL),
    ('Cappuccino', 3.75, 'Coffee with steamed milk foam', NULL),
    ('Latte', 3.50, 'Coffee with a lot of milk', NULL),
    ('Mocha', 4.00, 'Coffee with chocolate', NULL),
    ('Americano', 2.00, 'Diluted espresso', NULL);

SELECT name from menu;

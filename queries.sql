-- Видалення однієї з таблиць
DROP TABLE IF EXISTS orders;

-- Модифікація поля таблиці (наприклад, поле типу datetime, стало date (або зміна імені поля) )
ALTER TABLE drivers
    RENAME COLUMN phone TO contact_number;

-- Заповнення кожної таблиці хоча б по 3-5 записів
INSERT INTO parks
    (address)
VALUES ('123 Main St'),
       ('456 Elm St'),
       ('789 Oak St');

INSERT INTO cars
    (park_id, model, price)
VALUES (1, 'Toyota Prius', 20000),
       (1, 'Honda Civic', 18000),
       (2, 'Ford Focus', 15000);

INSERT INTO drivers
    (car_id, name, contact_number)
VALUES (1, 'John Doe', '123-456-7890'),
       (2, 'Jane Smith', '987-654-3210'),
       (3, 'Tom Johnson', '456-789-1234');

INSERT INTO customers
    (name, phone)
VALUES ('Alex Brown', '555-111-2222'),
       ('Bob White', '555-333-4444'),
       ('Charlie Black', '555-555-6666');

INSERT INTO orders
    (driver_id, customer_id, start, finish, total)
VALUES (1, 1, '2024-09-20', '2024-09-20', 25.50),
       (2, 2, '2024-09-21', '2024-09-21', 18.00),
       (3, 3, '2024-09-22', '2024-09-22', 30.00);

-- Модифікації будь-якого запису (наприклад, змінити серійний номер автопарку)
UPDATE cars
SET model = 'Toyota Camry'
WHERE id = 1;

-- Видалення запису з таблиці
DELETE FROM customers
WHERE id = 3;

-- Ну і пару різних запитів до бази даних (маю на увазі SELECT)
SELECT cars.id, cars.model, cars.price
FROM cars
         JOIN parks ON cars.park_id = parks.id
WHERE parks.address = '123 Main St';


SELECT drivers.name AS driver_name, cars.model AS car_model
FROM drivers
         JOIN cars ON drivers.car_id = cars.id;

-- 1-2 приклади Join запиту
SELECT orders.id AS order_id, drivers.name AS driver_name, customers.name AS customer_name, orders.total
FROM orders
         JOIN drivers ON orders.driver_id = drivers.id
         JOIN customers ON orders.customer_id = customers.id;

SELECT drivers.name AS driver_name, orders.id AS order_id, orders.total
FROM drivers
         LEFT JOIN orders ON drivers.id = orders.driver_id;

-- Додати/змінити колонку за допомогою команди ALTER TABLE
ALTER TABLE drivers
    ADD COLUMN rating INT DEFAULT 5;


ALTER TABLE orders
    MODIFY total DECIMAL(10, 2);

-- Креативний запит
SELECT drivers.name, SUM(orders.total) AS total_earnings
FROM drivers
         JOIN orders ON drivers.id = orders.driver_id
GROUP BY drivers.name
HAVING total_earnings > 20;




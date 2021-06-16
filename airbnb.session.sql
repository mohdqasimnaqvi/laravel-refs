--! My Comment
-- @block create users table
CREATE TABLE Users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    bio TEXT NOT NULL
);
-- @BLOCK create index
CREATE INDEX email_index ON Users(email);
-- @block insert users
INSERT INTO Users( email, bio)
VALUES
    ( 'hello@world.com', 'Hello, World!'),
    ( 'hi@superHero.com', 'super hero!'),
    ( 'hola@mundo.com', 'I am Spanish');
-- @block get all users that start with h
SELECT email,bio FROM Users
    WHERE ID > 1
    AND email LIKE 'h%'
    ORDER BY email ASC
    LIMIT 3;

-- @block create rooms table
CREATE TABLE ROOMS (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    street VARCHAR(255),
    owner_id INTEGER NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES Users (id)
);
-- @block add demo rooms
INSERT INTO ROOMS ( owner_id, street )
    VALUES
        (1, 'san diego bay'),
        (2, 'street 7 ghaziabad'),
        (2, 'Sea bay at mumbai'),
        (4, 'Room near mumbai rain');
-- @block User owned rooms
SELECT * FROM Users
INNER JOIN Rooms
ON Rooms.owner_id = Users.id;
-- @block add bookings table
CREATE TABLE Bookings(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    guest_id INTEGER NOT NULL,
    room_id INTEGER NOT NULL,
    FOREIGN KEY (guest_id) REFERENCES Users(id),
    FOREIGN KEY (room_id) REFERENCES Rooms(id)
);
-- @block add bookings
INSERT INTO Bookings (guest_id, room_id, check_in)
    VALUES
        (6, 2, '14th June 2021 8:51pm'),
        (1, 3, '14th June 2021 8:51pm'),
        (3, 1, '14th June 2021 8:51pm'),
        (2, 4, '14th June 2021 8:51pm');
-- @block Rooms a user has booked
SELECT * FROM Bookings
INNER JOIN Rooms
ON Rooms.owner_id = Bookings.room_id
ORDER BY Bookings.id ASC
WHERE Bookings.room_id = 2
LIMIT 1;
-- @block get room guests
SELECT
* FROM Bookings
INNER JOIN Rooms
ON Rooms.owner_id = Bookings.guest_id;
-- @block h
SELECT * FROM Users;

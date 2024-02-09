CREATE TABLE Usuario (
    DNI VARCHAR(10) PRIMARY KEY,
    Nombre VARCHAR(100),
    email VARCHAR(100),
    Telefono VARCHAR(15),
    password VARCHAR(100));

-- Crear la tabla Ventas
CREATE TABLE Ventas (
    Id INT PRIMARY KEY,
    Monto DECIMAL(10, 2),
    FormaDePago VARCHAR(50),
    Fecha DATE,
    DNI varchar(100),
    FOREIGN KEY (DNI) REFERENCES Usuario(DNI)
);

CREATE TABLE Categoria (
    Id INT PRIMARY KEY,
    Nombre varchar(50)
);

CREATE TABLE Productos (
    Id INT PRIMARY KEY,
    Precio DECIMAL(10, 2),
    Cantidad INT,
    Nombre varchar(50),
    IDCategoria int,
    FOREIGN KEY (IDCategoria) REFERENCES Categoria(ID)
);


 -- Insertar un usuario
INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('111111', 'Juan Perez', 'juan@example.com', '1234567', 'contrasena123');

INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('222222', 'Pedro Dominguez', 'pedro@example.com', '123557', 'contrasena123');

-- Insertar una venta
INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI)
VALUES (1, 100.50, 'Tarjeta de crédito', '2023-10-16', 111111);

-- Insertar otra venta
INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI)
VALUES (2, 75.25, 'Efectivo', '2023-10-17', 222222);

-- Insertar categorías relacionadas con la venta de celulares y accesorios
INSERT INTO Categoria (Id, Nombre) VALUES
(1, 'Celulares'),
(2, 'Accesorios');

-- Insertar productos de la categoría "Celulares"
INSERT INTO Productos (Id, Precio, Cantidad, Nombre, IDCategoria) VALUES
(1, 799.99, 50, 'Teléfono inteligente X', 1),
(2, 649.99, 30, 'Teléfono inteligente Y', 1),
(3, 499.99, 20, 'Teléfono inteligente Z', 1);

-- Insertar productos de la categoría "Accesorios"
INSERT INTO Productos (Id, Precio, Cantidad, Nombre, IDCategoria) VALUES
(4, 29.99, 100, 'Funda para teléfono X', 2),
(5, 19.99, 80, 'Protector de pantalla Y', 2),
(6, 9.99, 120, 'Cargador portátil', 2);

ALTER TABLE Ventas
ADD COLUMN IdProducto INT,
ADD FOREIGN KEY (IdProducto) REFERENCES Productos(Id);

UPDATE Ventas
SET IdProducto = 1
WHERE Id = 1;

UPDATE Ventas
SET IdProducto = 4
WHERE Id = 2;

-- Insertar más usuarios
INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('333333', 'Maria Rodriguez', 'maria@example.com', '9876543', 'contrasena456');

INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('444444', 'Luis Martinez', 'luis@example.com', '8765432', 'contrasena789');

INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('555555', 'Ana Gonzalez', 'ana@example.com', '7654321', 'contrasena012');

-- Insertar más ventas
INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI, IdProducto)
VALUES (3, 120.75, 'Tarjeta de débito', '2023-10-18', '333333', 2);

INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI, IdProducto)
VALUES (4, 50.00, 'Efectivo', '2023-10-19', '444444', 5);

INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI, IdProducto)
VALUES (5, 200.25, 'Transferencia bancaria', '2023-10-20', '555555', 3);

INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI, IdProducto)
VALUES (6, 80.50, 'Tarjeta de crédito', '2023-10-21', '111111', 1);

INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI, IdProducto)
VALUES (7, 150.00, 'Efectivo', '2023-10-22', '222222', 6);

INSERT INTO Ventas (Id, Monto, FormaDePago, Fecha, DNI, IdProducto)
VALUES (8, 90.75, 'Tarjeta de débito', '2023-10-23', '333333', 4);

-- Insertar más usuarios
INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('666666', 'Laura Hernandez', 'laura@example.com', '6543210', 'contrasena345');

INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('777777', 'Carlos Sanchez', 'carlos@example.com', '5432109', 'contrasena678');

INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('888888', 'Elena Ramirez', 'elena@example.com', '4321098', 'contrasena901');

INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('999999', 'Hugo Lopez', 'hugo@example.com', '3210987', 'contrasena234');

INSERT INTO Usuario (DNI, Nombre, email, Telefono, password)
VALUES ('123456', 'Marta Castillo', 'marta@example.com', '2109876', 'contrasena567');

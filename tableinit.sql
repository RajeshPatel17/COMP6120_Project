CREATE TABLE books(
    BookID INT,
    Title VARCHAR(255),
    UnitPrice REAL,
    Author VARCHAR(255),
    Quantity INT,
    SupplierID INT, 
    SubjectID INT,
    PRIMARY KEY(BookID),
    FOREIGN KEY(SupplierID) REFERENCES suppliers
    FOREIGN KEY(SubjectID) REFERENCES subjects
);
CREATE TABLE orders(
    OrderID INT, 
    CustomerID INT, 
    EmployeeID INT,
    OrderDate DATE,
    ShippedDate DATE DEFAULT NULL, 
    ShipperID INT DEFAULT NULL,
    PRIMARY KEY (OrderID), 
    FOREIGN KEY (CustomerID) REFERENCES customers,
    FOREIGN KEY (EmployeeID) REFERENCES employees 
);
CREATE TABLE order_details(
    BookID INT, 
    OrderID INT, 
    Quantity INT,
    PRIMARY KEY(BookID, OrderID),
    FOREIGN KEY(BookID) REFERENCES books,
    FOREIGN KEY(OrderID) REFERENCES orders
);
CREATE TABLE customers(
    CustomerID INT, 
    LastName VARCHAR(255),
    FirstName VARCHAR(255),
    Phone VARCHAR(255),
    PRIMARY KEY(CustomerID)
);
CREATE TABLE employees(
    EmployeeID INT, 
    LastName VARCHAR(255), 
    FirstName VARCHAR(255), 
    PRIMARY KEY(EmployeeID)
);
CREATE TABLE shippers(
    ShipperID INT, 
    ShipperName VARCHAR(255),
    PRIMARY KEY(ShipperID)
);
CREATE TABLE suppliers(
    SupplierID INT, 
    CompanyName VARCHAR(255),
    ContactLastName VARCHAR(255),
    ContactFirstName VARCHAR(255),
    Phone VARCHAR(255),
    PRIMARY KEY(SupplierID)
);
CREATE TABLE subjects(
    SubjectID INT, 
    CategoryName VARCHAR(255),
    PRIMARY KEY(SubjectID)
);
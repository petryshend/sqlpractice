<?php 

require_once 'bootstrap.php';

$exercises = [];

/*****************************************/

$stmt = $conn->prepare('SELECT Name FROM Products');
$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the names of all the products in the store.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare('SELECT Name, Price FROM Products');
$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the names and the prices of all the products in the store.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT Name, Price 
    FROM Products
    WHERE Price <= 200
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the name of the products with a price less than or equal to $200.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT Name, Price 
    FROM Products
    WHERE Price BETWEEN 60 AND 120
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select all the products with a price between $60 and $120.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT Name, Price * 100 AS "Price in cents"
    FROM Products
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the name and price in cents (i.e., the price must be multiplied by 100).',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT AVG(Price) AS "Average Price"
    FROM Products
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Compute the average price of all the products.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT AVG(Price) AS "Average Price"
    FROM Products
    WHERE Manufacturer = 2
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Compute the average price of all products with manufacturer code equal to 2.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT COUNT(*)
    FROM Products
    WHERE Price >= 180
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Compute the number of products with a price larger than or equal to $180.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT Name, Price
    FROM Products
    WHERE Price >= 180
    ORDER BY Price DESC, Name ASC
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the name and price of all products with a price larger than or equal to $180, and sort first by price (in descending order), and then by name (in ascending order).',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT P.Code, P.Name, P.Price, M.Name as "Manufacturer"
    FROM Products P JOIN Manufacturers M
        ON P.Manufacturer = M.Code
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select all the data from the products, including all the data for each product\'s manufacturer.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT P.Name, P.Price, M.Name AS "Manufacturer"
    FROM Products P JOIN Manufacturers M
    ON P.Manufacturer = M.Code
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the product name, price, and manufacturer name of all the products.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT AVG(Price), Manufacturer
    FROM Products
    GROUP BY Manufacturer
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the average price of each manufacturer\'s products, showing only the manufacturer\'s code.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT AVG(Price), M.Name
    FROM Products P JOIN Manufacturers M
    ON P.Manufacturer = M.Code
    GROUP BY Manufacturer
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the average price of each manufacturer\'s products, showing the manufacturer\'s name.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

$stmt = $conn->prepare(
    <<<'SQL'
    SELECT AVG(Price), M.Name
    FROM Products P JOIN Manufacturers M
    ON P.Manufacturer = M.Code
    GROUP BY Manufacturer
SQL
);

$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the names of manufacturer whose products have an average price larger than or equal to $150.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/


render('main', ['exercises' => $exercises]);

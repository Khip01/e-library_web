<?php
include("db/db.php");

//// ------ LIBRARIAN TABLE ------ ////
// GET - Get all Librarian data
function getLibrarians()
{
    global $conn;

    $query = "SELECT * FROM librarian";
    $librarianData = sqlsrv_query($conn, $query);
    $result = [];

    while ($row = sqlsrv_fetch_array($librarianData)) {
        $result[] = $row;
    }

    return $result;
}

// GET - Specific Librarian data
function getLibrarianById($librarianId)
{
    global $conn;

    $query = "SELECT name FROM librarian WHERE librarian_id = ?";
    $param = array($librarianId);
    $librarianData = sqlsrv_query($conn, $query, $param);
    $result = "";

    while ($row = sqlsrv_fetch_array($librarianData)) {
        $result = $row[0];
    }

    return $result;
}

//// ------ BOOK TABLE ------ ////
// GET - Get all Book data
function getBooks(){
    global $conn;

    $query = "SELECT * FROM book";
    $bookData = sqlsrv_query($conn, $query);
    $result = [];

    while ($row = sqlsrv_fetch_array($bookData)) {
        $result[] = $row;
    }

    $result = array_reverse($result);

    return $result;
}

function getBookById($bookId){
    global $conn;

    $query = "SELECT * FROM book WHERE book_id = ?";
    $param = array($bookId);
    $bookData = sqlsrv_query($conn, $query, $param);
    $result = [];

    while ($row = sqlsrv_fetch_array($bookData)) {
        $result[] = $row;
    }

    return $result;
}

// INSERT - Insert new book
function createBook($postData, $fileData)
{
    global $conn;

    if(!isset($postData["submit"])) {
        return;
    }

    $title = htmlspecialchars($postData["title"]);
    $author = htmlspecialchars($postData["author"]);
    $isbn = htmlspecialchars($postData["isbn"]);
    $image = htmlspecialchars(basename($fileData["image"]["name"]));
    $description = htmlspecialchars($postData["description"]);
    $librarian = htmlspecialchars($postData["librarian"]);

    // Move Image to assets/images
    $imagePath = "assets/images/" . $image;
    move_uploaded_file($fileData["image"]["tmp_name"], $imagePath);

    // Insert data
    $query = "INSERT INTO book (title, author, isbn, image, description, librarian_id) VALUES ('$title', '$author', '$isbn', '$image', '$description', '$librarian' )";

    sqlsrv_query($conn, $query);

    return;
}

// UPDATE - Update book data
function updateBook($postData, $fileData)
{
    global $conn;

    if(!isset($postData["submit"])) {
        return;
    }

    // inisialisasi
    $bookId = htmlspecialchars($postData["book_id"]);
    $title = htmlspecialchars($postData["title"]);
    $author = htmlspecialchars($postData["author"]);
    $isbn = htmlspecialchars($postData["isbn"]);
    $description = htmlspecialchars($postData["description"]);
    $librarian = htmlspecialchars($postData["librarian"]);

    // Update data
    $query = "UPDATE book 
        SET title = '$title', 
        author = '$author', 
        isbn = '$isbn', 
        description = '$description', 
        librarian_id = '$librarian' 
        WHERE 
        book_id = '$bookId'";

    sqlsrv_query($conn, $query);

    // Mengecek apakah ada file gambar yang diunggah
    if (isset($fileData["image"]) && $fileData["image"]["error"] === 0) {
        // inisialisasi image
        $imageName = htmlspecialchars(basename($fileData["image"]["name"]));
        $imagePath = "assets/images/" . $imageName;

        // Pindahkan file ke folder assets/images
        if (move_uploaded_file($fileData["image"]["tmp_name"], $imagePath)) {
            // Update data gambar di database
            $queryImage = "UPDATE book 
                           SET image = '$imageName' 
                           WHERE book_id = '$bookId'";
            sqlsrv_query($conn, $queryImage);
        }
    }

    return;
}
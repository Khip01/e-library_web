<?php
include("db/db.php");

//// ------ LIBRARIAN TABLE ------ ////
// GET - Get all Librarian data
function getLibrarians()
{
    global $conn;

    $query = "SELECT * FROM librarian";
    $librarianData = mysqli_query($conn, $query);
    $result = [];

    while ($row = mysqli_fetch_assoc($librarianData)) {
        $result[] = $row;
    }

    return $result;
}

//// ------ BOOK TABLE ------ ////
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
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function validateBook($postData, $fileData)
{
    $title = htmlspecialchars($postData["title"]);
    $author = htmlspecialchars($postData["author"]);
    $isbn = htmlspecialchars($postData["isbn"]);
    $image = htmlspecialchars(basename($fileData["image"]["name"]));
    $description = htmlspecialchars($postData["description"]);
    $librarian = htmlspecialchars($postData["librarian"]);

    if (empty($title) || empty($author) || empty($isbn) || empty($image) || empty($description) || empty($librarian)) {
        return false;
    }

    return true;
}

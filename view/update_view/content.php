<?php 
$booksData = getBooks();

?>

<div class="py-3">
    <?php 
    for ($i = 0; $i < count($booksData); $i++) {
        $bookData = $booksData[$i];
        $GLOBALS["librarian_name"] = getLibrarianById($bookData["librarian_id"]);
        include("components/list_item_update.php");
    }
    ?>
</div>
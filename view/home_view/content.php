<?php
$booksData = getBooks();

?>

<div class="row row-cols-auto">
    <?php
    for ($i = 0; $i < count($booksData); $i++) {
        $bookData = $booksData[$i];
        include("components/content_card.php");
    }
    ?>
</div>
<?php
$booksData = getBooks();

?>

<div class="row row-cols-auto">
    <?php
    $contentCardImages = [];

    for ($i = 0; $i < count($booksData); $i++) {
        $bookData = $booksData[$i];
        include("components/content_card.php");
    }
    ?>
</div>
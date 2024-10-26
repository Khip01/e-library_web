<?php
$updatedBook = getBookById($_POST["book_id"])[0];

// Book Data
$updatedBookId = $updatedBook["book_id"];
$updatedBookTitle = htmlspecialchars_decode($updatedBook["title"]);
$updatedBookAuthor = htmlspecialchars_decode($updatedBook["author"]);
$updatedBookIsbn = htmlspecialchars_decode($updatedBook["isbn"]);
$updatedBookImage = $updatedBook["image"];
$updatedBookDescription = htmlspecialchars_decode($updatedBook["description"]);
$updatedLibrarianId = $updatedBook["librarian_id"];
?>

<!-- Title -->
<div class="pt-3 pb-4 fs-3 fw-bold">
    Update Book Data
</div>
<?php
// Inisialisasi variabel
$content = '';
$title = "Updating ";
$continuedTitle = "$updatedBookTitle";
$leadingTitle = 'You are now on the data update page! You can delete or update data.';

// Dilakukan Buffer pada konten pada include, lalu menyimpannya di variabel $content
ob_start();
include("view/update_view/update_section/content_section.php");
$content = ob_get_clean();

// Memanggil section_card.php dengan mengirimkan variabel $content dan $title
include("components/section_card_update.php");
?>
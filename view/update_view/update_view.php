<div id="update-page">
    <!-- Title -->
    <div class="pt-3 pb-4 fs-3 fw-bold">
        Update Book Data
    </div>
    <?php
    // Inisialisasi variabel
    $content = '';
    $title = 'Update your existing book data';
    $leadingTitle = 'Please tap on one of the books to select and make changes such as changing book data or deleting books.';

    // Dilakukan Buffer pada konten pada include, lalu menyimpannya di variabel $content
    ob_start();
    include("view/update_view/content.php");
    $content = ob_get_clean();

    // Memanggil section_card.php dengan mengirimkan variabel $content dan $title
    include("components/section_card.php");
    ?>
</div>
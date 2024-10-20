<div>
    <!-- Title -->
    <div class="pt-3 pb-4 fs-3 fw-bold">
        Home View
    </div>
    <?php
    // Inisialisasi variabel
    $content = '';
    $title = 'All Book';

    // Dilakukan Buffer pada konten pada include, lalu menyimpannya di variabel $content
    ob_start();
    include("view/home_view/content.php");
    $content = ob_get_clean();

    // Memanggil section_card.php dengan mengirimkan variabel $content dan $title
    include("components/section_card.php");
    ?>
</div>
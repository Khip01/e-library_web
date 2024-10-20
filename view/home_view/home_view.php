<div>
    <!-- Title -->
    <div class="pt-3 pb-4 fs-3 fw-bold">
        Home View
    </div>
    <?php
    // Membuat variabel content
    $content = '';
    $title = 'All Book';

    for ($i = 0; $i < 10; $i++) {
        $content .= "Hello World Anjay<br>";
    }

    include("components/section_card.php");
    ?>
</div>
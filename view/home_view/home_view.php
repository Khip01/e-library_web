<div>
    <div style="margin-right: 260px;">
        <!-- Title -->
        <div class="pt-3 pb-4 fs-3 fw-bold">
            Home View
        </div>
        <?php
        // Inisialisasi variabel
        $content = '';
        $title = 'Greetings, Librarian! 👋';
        $leadingTitle = "Your Book Collection Awaits: Ready to Explore, Organize, and Enhance the Library Experience";

        // Dilakukan Buffer pada konten pada include, lalu menyimpannya di variabel $content
        ob_start();
        include("view/home_view/content.php");
        $content = ob_get_clean();

        // Memanggil section_card.php dengan mengirimkan variabel $content dan $title
        include("components/section_card.php");
        ?>
    </div>

    <?php
    include("components/right_preview_content/right_preview_content.php");
    ?>
</div>
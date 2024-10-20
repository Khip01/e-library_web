<div class="rounded-4 p-3 w-100 h-auto bg-light">
    <!-- custom title -->
    <div class="fw-bold pb-2 fs-5">
        <?php
        if (isset($title)) {
            echo $title;
        }
        ?>
    </div>
    
    <!-- custom content -->
    <?php
    if (isset($content)) {
        echo $content;
    }
    ?>
</div>
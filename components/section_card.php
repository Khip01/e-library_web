<div class="rounded-4 p-4 mb-3 w-100 h-auto bg-light">

    <!-- custom title -->
    <div class="fw-bold pb-0 fs-5 text-truncate" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
        <?php
        if (isset($title)) {
            if (isset($continuedTitle)) {
                echo $title . ' "' . $continuedTitle . '"';
            } else {
                echo $title;
            }
        }
        ?>
    </div>
    <div class="pb-2 fs-6">
        <?php
        if (isset($title)) {
            echo $leadingTitle;
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
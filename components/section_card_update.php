<div class="rounded-4 p-4 mb-3 w-100 h-auto bg-light">

    <div id="refuse-update" class="d-flex flex-row align-items-center rounded-4" role="button">
        <div class="me-3">
            <i class="fas fa-chevron-left" style="font-size: 40px;"></i>
        </div>
        <div>
            <!-- custom title -->
            <div class="fw-bold pb-0 fs-5 truncate-one-lines">
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
            <div class="pb-2 fs-6 truncate-two-lines">
                <?php
                if (isset($title)) {
                    echo $leadingTitle;
                }
                ?>
            </div>
        </div>
    </div>

    <!-- custom content -->
    <?php
    if (isset($content)) {
        echo $content;
    }
    ?>
</div>

<style>
    .truncate-one-lines {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }

    .truncate-two-lines {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }

    #refuse-update {
        transition: background-color 0.3s ease;
    }

    #refuse-update:hover {
        background-color: #f0f0f0;
    }

    #refuse-update .fas.fa-chevron-left {
        opacity: .5;
        transition: opacity 0.3s ease;
    }

    #refuse-update:hover .fas.fa-chevron-left {
        opacity: 1;
    }
</style>

<script>
    // Refuse To Update Book ajax (back button)
    $(document).ready(function() {
        $('#refuse-update').on('click', function() {

            $.ajax({
                url: './ajax_update_view_back.php',
                type: 'GET',
                success: function(response) {
                    $('#update-page').html(response);
                },
                error: function() {
                    console.log('Error retrieving book preview.');
                }
            });

        });
    });
</script>
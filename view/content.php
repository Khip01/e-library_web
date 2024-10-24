<?php 

require "db/repository.php";

?>
<div id="content" class="flex-grow-1">
    <div class="container py-3 ps-4">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <?php include("view/home_view/home_view.php"); ?>
            </div>
            <div class="tab-pane fade" id="list-create" role="tabpanel" aria-labelledby="list-create-list">
                <?php include("view/create_view/create_view.php"); ?>
            </div>
            <div class="tab-pane fade" id="list-update" role="tabpanel" aria-labelledby="list-update-list">
                <?php include("view/update_view/update_view.php"); ?>
            </div>
        </div>
    </div>
</div>
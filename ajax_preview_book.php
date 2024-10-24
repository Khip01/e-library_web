<?php
require "db/repository.php";

    $GLOBALS["selectedPreviewBook"] = getBookById($_POST["book_id"])[0];
    include('components/right_preview_content/available_content.php');
    
?>
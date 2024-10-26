<!-- used variable -->
<!-- selectedPreviewBook is array_assoc['title'] -->
<?php
$selectedPreviewBook = getBookById($_POST["book_id"])[0];
?>
<div class="d-flex flex-column align-items-center" style="height: 100%; padding-top: 80px;">
    <!-- Content Image -->
    <div class="rounded-3 bg-body-tertiary" style="width: 175px; height: 250px; overflow: hidden;">
        <img src="assets/images/<?= $selectedPreviewBook['image'] ?>" class="img-fluid bg-body-tertiary" style="width: 100%; height: 100%; object-fit: cover;" alt="Book Image">
    </div>

    <!-- Content Title and Author -->
    <div class="pt-4 pb-3 text-white text-center">
        <div class="pb-2 fs-5 text-white text-center">
            <?= htmlspecialchars_decode($selectedPreviewBook['title']) ?>
        </div>
        <p style="color: #94b0dc; font-size: 14px;"><?= htmlspecialchars_decode($selectedPreviewBook['author']) ?></p>
    </div>

    <!-- Content Description -->
    <div class="text-white-50 text-center">
        <p style="font-size: 14px;"><?= htmlspecialchars_decode($selectedPreviewBook['description']) ?></p>
    </div>
</div>
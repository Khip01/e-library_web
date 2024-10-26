<div id="list-item-update" role="button" class="d-flex flex-row align-items-center justify-content-between rounded-4" style="height: 100px; width: 100%; padding-top: 10px; padding-bottom: 10px;">
    <div class="text-center mx-3">
        <?= $i + 1 ?>
    </div>
    <div class="border rounded-2 me-3" style="height: 100%; min-width: 60px; background-color: #001743;">
        <img src="assets/images/<?= $bookData["image"] ?>" class="img-fluid bg-body-tertiary" style="width: 100%; height: 100%; object-fit: cover;" alt="Book Image">
    </div>
    <div class="d-flex flex-column me-3 flex-grow-1" style="min-width: 65%; width: 100%;">
        <div class="text-truncate" style="font-size: 16px;">
            <?= htmlspecialchars_decode($bookData["title"]) ?>
        </div>
        <div class="text-truncate py-1" style="font-size: 14px;">
            <?= htmlspecialchars_decode($bookData["description"]) ?>
        </div>
        <div class="text-truncate text-secondary" style="font-size: 12px;">
            <?= htmlspecialchars_decode($bookData["author"]) ?>
        </div>
    </div>
    <div class="text-truncate text-center me-3 d-flex align-items-center justify-content-center" style="width: 100%; max-width: 200px; height: 35px; font-size: 14px;">
        <?= htmlspecialchars_decode($bookData["isbn"]) ?>
    </div>
    <div class="truncate-two-lines text-center me-3 d-flex align-items-center justify-content-center" style="height: 70px; max-width: 200px; width: 100%; font-size: 14px;">
        <?= htmlspecialchars_decode($GLOBALS["librarian_name"]) ?>
    </div>
    <div class="mh-100 me-3 row align-items-center" style="width: 50px; height: 100%; color: black;">
        <i class="fas fa-chevron-right" style="font-size: 20px;"></i>
    </div>
</div>

<style>
    .truncate-two-lines {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        /* Set jumlah baris yang diinginkan */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        /* Atur agar bisa lebih dari satu baris */
    }

    #list-item-update {
        transition: background-color 0.3s ease;
    }

    #list-item-update:hover {
        background-color: #f0f0f0;
    }

    #list-item-update .fas.fa-chevron-right {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    #list-item-update:hover .fas.fa-chevron-right {
        opacity: 1;
    }
</style>
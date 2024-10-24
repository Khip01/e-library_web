<script>
    let currentBookId = null; // Simpan ID buku saat ini

    $(document).ready(function() {
        // Event listener untuk setiap card
        $('.book-card').on('click', function() {
            var bookId = $(this).data('book-id'); // Ambil ID buku dari card yang diklik
            currentBookId = bookId; // Update ID saat ini

            $.ajax({
                url: 'ajax_preview_book.php', // Arahkan ke handler baru
                type: 'POST',
                data: {
                    book_id: bookId
                },
                success: function(response) {
                    // Hanya update jika ID dari card yang ditekan dan ID POST sama
                    if (currentBookId === bookId) {
                        $('#right-preview-content').html(response);
                    }
                },
                error: function() {
                    console.log('Error retrieving book preview.');
                }
            });
        });
    });
</script>


<div class="mx-2 mb-4 mt-3 p-0 col rounded-3 shadow book-card" data-book-id="<?= $bookData['book_id'] ?>" style="height: 340px; width: 220px; overflow: hidden;">
    <div class="d-flex flex-column" style="height: 100%;">
        <div class="bg-body-tertiary border-bottom" style="overflow: hidden; height: 270px;">
            <img src="assets/images/<?= $bookData["image"] ?>" class="img-fluid bg-body-tertiary" style="width: 100%; height: 100%; object-fit: cover;" alt="Book Image">
        </div>
        <div class="py-2 px-4  d-flex flex-column" style="height: 70px;">
            <div class="text-truncate flex-fill" style="font-size: 16px;">
                <?= htmlspecialchars_decode($bookData["title"]) ?>
            </div>
            <div class="text-truncate flex-fill text-secondary" style="font-size: 14px;">
                <?= htmlspecialchars_decode($bookData["author"]) ?>
            </div>
        </div>
    </div>
</div>
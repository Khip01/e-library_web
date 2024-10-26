// BOOK PREVIEW AJAX
let currentBookId = null; // Simpan ID buku saat ini

$(document).ready(function () {
    // Event listener untuk setiap card
    $('.book-card').on('click', function () {
        var bookId = $(this).data('book-id'); // Ambil ID buku dari card yang diklik
        currentBookId = bookId; // Update ID saat ini

        $.ajax({
            url: './ajax_preview_book.php', // Arahkan ke handler baru
            type: 'POST',
            data: {
                book_id: bookId
            },
            success: function (response) {
                // Hanya update jika ID dari card yang ditekan dan ID POST sama
                if (currentBookId === bookId) {
                    $('#right-preview-content').html(response);
                }
            },
            error: function () {
                console.log('Error retrieving book preview.');
            }
        });
    });
});

// List Item Update on Click ajax
$(document).ready(function () {
    // Event listener for each card
    $('#update-page').on('click', '.list-item-update', function () {
        var bookId = $(this).data('book-id'); 
        currentBookId = bookId;

        $.ajax({
            url: './ajax_update_book.php', 
            type: 'POST',
            data: {
                book_id: bookId,
            },
            success: function (response) {
                // Hanya update jika ID dari card yang ditekan dan ID POST sama
                if (currentBookId === bookId) {
                    $('#update-page').html(response);
                }
            },
            error: function () {
                console.log('Error retrieving book preview.');
            }
        });
    });
});


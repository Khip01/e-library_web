<?php
$librariansData = getLibrarians();

if (isset($_POST["submit"])) {
    updateBook($_POST, $_FILES);

    // Redirect setelah form di-submit dan diproses
    header("Location: /e-library_web/"); // Redirect ke halaman yang sama
    exit;
}
?>

<script>
    // JQUERY Validation
    $(document).ready(function() {
        $("#validate-update").click(function() {

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                }, false)
            })
        });
    });
</script>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation was-validated" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="book_id" value="<?= $updatedBookId ?>">
    <div class="mb-3 mt-2">
        <label for="bookTitleUpdate" class="form-label">Book Title</label>
        <input type="text" name="title" class="form-control" id="bookTitleUpdate" value="<?= $updatedBookTitle ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please fill this field.
        </div>
    </div>
    <div class="mb-3">
        <label for="bookAuthorUpdate" class="form-label">Author</label>
        <input type="text" name="author" class="form-control" id="bookAuthorUpdate" aria-describedby="authorHelpUpdate" value="<?= $updatedBookAuthor ?>" required>
        <div id="authorHelpUpdate" class="form-text">Make sure the author's name is written correctly.</div>
    </div>
    <div class="mb-4">
        <label for="bookISBNUpdate" class="form-label">ISBN</label>
        <input type="number" name="isbn" class="form-control" id="bookISBNUpdate" aria-describedby="ISBNHelpUpdate" value="<?= $updatedBookIsbn ?>" required>
        <div id="ISBNHelpUpdate" class="form-text">ISBN is an acronym that stands for International Standard Book Number.</div>
    </div>
    <div class="input-group mb-4">
        <input type="file" name="image" accept="image/jpeg, image/png" class="form-control" id="inputImageUpdate">
        <label class="input-group-text" for="inputImageUpdate">Upload Image</label>
    </div>
    <div id="ImageHelpUpdate" class="form-text">Current Image: <?= $updatedBookImage ?></div>
    <div class="bg-body-secondary rounded-3 mb-4" style="width: 200px; height: 300px; overflow: hidden; ">
        <img src="assets/images/<?= $updatedBookImage ?>" class="img-fluid bg-body-tertiary" style="width: 100%; height: 100%; object-fit: cover;" alt="Book Image">
    </div>
    <div class="form-floating mb-4">
        <textarea class="form-control" name="description" placeholder="Put the book description here" id="floatingDescriptionUpdate" style="height: 100px" required><?= $updatedBookDescription ?></textarea>
        <label for="floatingDescriptionUpdate">Description</label>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please fill this field.
        </div>
    </div>
    <div class="form-floating mb-4">
        <select class="form-select" required name="librarian" id="floatingSelectUpdate" aria-label="Librarians floating label">
            <option value="">Select the Librarian</option>
            <?php foreach ($librariansData as $librarian) : ?>
                <option value="<?= $librarian["librarian_id"] ?>" <?= $librarian["librarian_id"] == $updatedLibrarianId ? 'selected' : '' ?>> <?= $librarian["name"] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="floatingSelectUpdate">Librarian</label>
    </div>
    <div class="w-100 d-flex justify-content-center">
        <button type="submit" name="submit" id="validate-update" class="btn btn-warning w-25">Update</button>
    </div>
</form>
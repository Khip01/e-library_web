<?php
$librariansData = getLibrarians();

if (isset($_POST["submit"]) && $_FILES["image"]["error"] === 0) {
    if (validateBook($_POST, $_FILES)) {
        createBook($_POST, $_FILES);
    }

    // Redirect setelah form di-submit dan diproses
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama
    exit; 
}
?>

<script>

    // JQUERY Validation
    $(document).ready(function() {
        $("#validate").click(function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            
            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        });
    });
    
</script>

<form method="POST" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
    <div class="mb-3 mt-2">
        <label for="bookTitle1" class="form-label">Book Title</label>
        <input type="text" name="title" class="form-control" id="bookTitle1" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please fill this field.
        </div>
    </div>
    <div class="mb-3">
        <label for="bookAuthor1" class="form-label">Author</label>
        <input type="text" name="author" class="form-control" id="bookAuthor1" aria-describedby="authorHelp" required>
        <div id="authorHelp" class="form-text">Make sure the author's name is written correctly.</div>
    </div>
    <div class="mb-4">
        <label for="bookISBN1" class="form-label">ISBN</label>
        <input type="number" name="isbn" class="form-control" id="bookISBN1" aria-describedby="ISBNHelp" required>
        <div id="ISBNHelp" class="form-text">ISBN is an acronym that stands for International Standard Book Number.</div>
    </div>
    <div class="input-group mb-4">
        <input type="file" name="image" accept="image/jpeg, image/png" class="form-control" id="inputImage1" required>
        <label class="input-group-text" for="inputImage1">Upload Image</label>
    </div>
    <div class="form-floating mb-4">
        <textarea class="form-control" name="description" placeholder="Put the book description here" id="floatingDescription" style="height: 100px" required></textarea>
        <label for="floatingDescription">Description</label>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please fill this field.
        </div>
    </div>
    <div class="form-floating mb-4">
        <select class="form-select" required name="librarian" id="floatingSelect" aria-label="Librarians floating label">
            <option value="">Select the Librarian</option>
            <?php foreach ($librariansData as $librarian) : ?>
                <option value="<?= $librarian["librarian_id"] ?>"> <?= $librarian["name"] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="floatingSelect">Librarian</label>
    </div>
    <div class="w-100 d-flex justify-content-center">
        <button type="submit" name="submit" id="validate" class="btn btn-primary w-25">Submit</button>
    </div>
</form>
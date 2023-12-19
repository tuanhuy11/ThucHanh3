<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>
    <?php include_once APP_ROOT . '/app/components/navigation.php'; ?>

    <div class="container mt-4">
        <h3 class="pb-3 text-center">Create new course</h3>
        <?php if(isset($_GET['error'])): ?>
            <h4 class="text-danger text-center"><?= $_GET['error'] ?></h4>
        <?php endif ?>
        <form method="POST" action="index.php?c=course&a=add">
            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Author</label>
                <select id="disabledSelect" class="form-select" name="author">
                    <?php foreach($authors as $author): ?>
                        <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Tile</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add new</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>
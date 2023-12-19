<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>
    <?php include_once APP_ROOT . '/app/components/navigation.php'; ?>
    <div class="mt-4 row px-4">
    <?php if(isset($_SESSION['currentUser']) && $_SESSION['currentUser']['role'] == 'admin'):?>
        <?php include_once APP_ROOT . '/app/views/inc/listGroup.php'; ?>
    <?php endif ?>

        <div class="<?=isset($_SESSION['currentUser']) && $_SESSION['currentUser']['role'] == 'admin' ? 'col-10' :'' ?> border py-3 rounded-1 overflow-hidden">
            <a class="btn btn-primary float-end" href="index.php?controller=course&action=show">
                <i class="bi bi-plus-circle"></i>
                Add
            </a>
            
            <h3 class="pb-2">All courses</h3>
            <table class="table" id="tableUser">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($courses as $course): ?>
                        <tr class="tableRow">
                            <td><?= $course['id'] ?></td>
                            <td><?= $course['title'] ?></td>
                            <td><?= $course['description'] ?></td>
                            <td>
                                <a class="text-primary" href="index.php?controller=course&action=showEdit&id=<?= $course['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <button class="text-danger btn btnDelete" data-toggle="modal" data-id="<?= $course['id']?>" data-target="#exampleModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php include_once APP_ROOT . '/app/components/pagination.php'; ?>
            

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you can delete course?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="btn-yes" class="btn btn-primary" data-dismiss="modal">Yes</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/courses.js"></script>
</body>

</html>
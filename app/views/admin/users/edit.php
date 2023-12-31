<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Edit User</title>
        <!-- Link -->
        <link rel="stylesheet" href="/app/assets/css/styles.css">
    </head>

    <body>
        <?php require_once APP_ROOT.'/app/components/navigation.php' ?>

        <main class="admin-edit-user-page">
        <?php require_once APP_ROOT.'/app/components/sidebar.php' ?>

            <div class="container">
                <div class="admin-edit-user-page-heading">
                    <h1>EDIT USER</h1>
                    <a href="/app?controller=user&action=index" class="button-return">Return</a>
                </div>

                <form action="<?php APP_ROOT.'/app/controllers/UserController.php' ?>" method="POST" class="form-edit-user" autocomplete="off">
                    <div class="form-group">
                        <label for="input-fullname">Full name</label>
                        <input type="text" name="fullname" id="input-fullname" placeholder="Full name..." value="<?= $user[0]['name'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="input-email">Email</label>
                        <input type="email" name="email" id="input-email" placeholder="Email..." value="<?= $user[0]['email'] ?>">
                    </div>

                    <div class="form-group">
                        <div class="option">
                            <input type="radio" name="authorization" value="0" <?= $user[0]['authorization'] == 0 ? 'checked' : '' ?>>
                            <label for="">User</label>
                        </div>

                        <div class="option">
                            <input type="radio" name="authorization" value="1" <?= $user[0]['authorization'] == 1 ? 'checked' : '' ?>>
                            <label for="">Admin</label>
                        </div>
                    </div>

                    <button type="submit" class="button-edit" name="button-edit">Edit</button>
                </form>
            </div>
        </main>
    </body>
</html>
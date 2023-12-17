<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Users</title>
        <!-- Link -->
        <link rel="stylesheet" href="/app/assets/css/styles.css">
    </head>

    <body>
        <?php require_once APP_ROOT.'/app/components/navigation.php' ?>

        <input type="checkbox" id="toggle-confirm-box" hidden>

        <main class="admin-users-page">
            <?php require_once APP_ROOT.'/app/components/sidebar.php' ?>

            <div class="container">
                <div class="admin-users-page-heading">
                    <h1>USERS</h1>

                    <a href="/app?controller=user&action=pageAddUser" class="link-add">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Add</span>
                    </a>
                </div>

                <table class="table-users">
                    <thead>
                        <tr>
                            <td>Order</td>
                            <td>Full name</td>
                            <td>Email</td>
                            <td>Authorization</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (count($users) > 0): ?>
                            <?php $index = 1; foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo $index; $index++; ?></td>
                                    <td><?php echo $user['name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td>
                                        <?php if ($user['authorization'] == 1): ?>
                                            <p style="display: inline-block; color: white; padding: 8px 15px; font-size: 1.4rem; font-weight: 700; border-radius: 5px; background-color: var(--extra-bold-orange)">Admin</p>
                                        <?php elseif ($user['authorization'] == 0): ?>
                                            <p style="display: inline-block; color: white; padding: 8px 15px; font-size: 1.4rem; font-weight: 700; border-radius: 5px; background-color: var(--extra-light-orange)">User</p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href=<?php echo DOMAIN."?controller=user&action=pageEditUser&id=". $user['id'] .""?> class="link-edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>

                                        <label for="toggle-confirm-box" class="clear button-delete" data-id=<?= $user['id']; ?>>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Delete</span>
                                        </label>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <div class="confirm-box">
            <label for="toggle-confirm-box" class="confirm-box-overlay"></label>

            <div class="confirm-box-main">
                <div class="confirm-box-heading">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <h3>Confirm delete</h3>
                </div>

                <div class="confirm-box-buttons">
                    <label for="toggle-confirm-box">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancel
                    </label>

                    <label for="toggle-confirm-box" class="button-accept" name="button-accept">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Accept
                    </label>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/app/views/admin/users/javascript/script.js"></script>
    </body>
</html>
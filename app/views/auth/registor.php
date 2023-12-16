<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registor Page</title>
        <!-- link -->
        <link rel="stylesheet" href="/app/assets/css/styles.css">
    </head>

    <body>
        <?php require_once '../../components/navigation.php' ?>

        <main class="login-page-main">
            <form action="" class="registor-login" autocomplete="off">
                <h2 class="form-login-heading">REGISTOR</h2>

                <div class="form-group">
                    <input type="text" name="username" placeholder=" " id="input-username">
                    <label for="input-username">Username</label>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder=" " id="input-password">
                    <label for="input-password">Password</label>
                </div>

                <div class="form-group">
                    <input type="password" name="verify-password" placeholder=" " id="input-verify-password">
                    <label for="input-verify-password">Verify Password</label>
                </div>

                <button class="button-login" type="submit">Registor</button>
            </form>
        </main>
    </body>
</html>
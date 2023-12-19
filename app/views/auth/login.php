<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <!-- link -->
        <link rel="stylesheet" href="/app/assets/css/styles.css">
    </head>

    <body>
        <?php require_once APP_ROOT.'/app/components/navigation.php';?>

        <main class="login-page-main">
            <form action="index.php?controller=home&action=handleLogin" method="POST" class="form-login" autocomplete="off" >
                <h2 class="form-login-heading">LOGIN</h2>

                <div class="form-group">
                    <input type="text" name="email" placeholder=" " id="input-username">
                    <label for="input-username">Username</label>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder=" " id="input-password">
                    <label for="input-password">Password</label>
                </div>

                <a href="/app/views/auth/registor.php" class="link-registor">Registor</a>

                <button class="button-login" type="submit">Login</button>
            </form>
        </main>
    </body>
</html>
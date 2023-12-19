<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create material</title>
    <link rel="stylesheet" href="http://localhost/thucHanh3/app/assets/css/styles.css"?>>

</head>

</head>
<body>
    
    <?php include APP_ROOT."/app/components/navigation.php"?>

    <h1 align="center" style="margin-top: 70px;margin-bottom: 30px; background-color: var(--middle-orange); color:white" align="center">Create material</h1>

    <form method="post" action="index.php?controller=material&action=store" style="width: 800px; margin-left:100px">
    
        <label for="lesson_id">Lesson Id:</label>
        <input style="width: 100%" type="text" name="lesson_id" id="lesson_id" required>

        <label for="title">Title:</label>
        <input style="width: 100%" type="text" name="title" id="title" required>

        <label for="file_path">File Path:</label>
        <textarea style="width: 100%; height: 200px" name="file_path" id="file_path" required></textarea>
        <br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
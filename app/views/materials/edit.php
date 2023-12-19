<!DOCTYPE html>
<html>
<head>
    <title>Edit material</title>
    <link rel="stylesheet" href="http://localhost/thucHanh3/app/assets/css/styles.css"?>

</head>
<body>
    <?php include APP_ROOT."/app/components/navigation.php"?>
    <h1 align="center" style = "margin-top: 70px; margin-bottom:30px; background-color: var(--middle-orange); color:white" align="center"">Edit material</h1>
    <div>
        <form method="post" action="index.php?controller=material&action=update" style="width:800px; margin-left: 100px">
            <input type="hidden" name="id" id="id" value="<?php echo $material->getId(); ?>">
            <label for="title">Title:</label>
            <input style="width: 100%" type="text" name="title" id="title" value="<?php echo $material->getTitle(); ?>" required>
            <br><br>
            <label for="file_path">File path:</label>
            <textarea style="width: 100%;" name="file_path" id="file_path" required><?php echo $material->getFilePath();?></textarea>
            
            <br><br>
            <input type="submit" value="Update">
        </form>
    </div>
    

</body>
</html>
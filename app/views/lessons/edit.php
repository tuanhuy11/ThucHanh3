<!DOCTYPE html>
<html>
<head>
    <title>Edit Lesson</title>
    <link rel="stylesheet" href="http://localhost/thucHanh3/app/assets/css/styles.css"?>>

</head>
<body>
    <?php include APP_ROOT."/app/components/navigation.php"?>
    <h1 align="center" style = "margin-top: 70px; margin-bottom:30px; background-color: var(--middle-orange); color:white" align="center"">Edit Lesson</h1>
    <div>
        <form method="post" action="index.php?controller=lesson&action=update" style="width:800px; margin-left: 100px">
            <input type="hidden" name="id" id="id" value="<?php echo $lesson->getId(); ?>">
            <label for="title">Title:</label>
            <input style="width: 100%" type="text" name="title" id="title" value="<?php echo $lesson->getTitle(); ?>" required>
            <br><br>
            <label for="description">Description:</label>
            <textarea style="width: 100%; height: 200px" name="description" id="description" required><?php echo $lesson->getDescription();?></textarea>
            
            <br><br>
            <input type="submit" value="Update">
        </form>
    </div>
    

</body>
</html>
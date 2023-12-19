<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lesson</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/thucHanh3/app/assets/css/styles.css"?>>
  <?php include APP_ROOT."/app/components/navigation.php"?>
</head>
<body>
    
    
    
    <h1 style = "margin-top: 150px; background-color: var(--middle-orange); color:white" align="center">Lesson List</h1>

    <a href="index.php?controller=lesson&action=create" style=" background-color:var(--light-orange); border-radius: 5px; color:white" >Create Lesson</a>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <?php
            $columnName = ["ID", "CourseId", "Title", "Description", "Create day", "Update day"];
            foreach($columnName as $columnNames):
          ?>
          <td>
            <?=$columnNames;?>
          </td>
            <?php endforeach;?>
        </tr>
      </thead>
        <tbody>
            <?php foreach ($lessons as $lesson): ?>
                <tr>
                    <td><?php echo $lesson['id']; ?></td>
                    <td><?php echo $lesson['course_id']; ?></td>
                    <td><?php echo $lesson['title']; ?></td>
                    <td><?php echo $lesson['description']; ?></td>
                    <td><?php echo $lesson['created_at']; ?></td>
                    <td><?php echo $lesson['updated_at']; ?></td>


                    <td>
                        <a href="index.php?controller=lesson&action=edit&id=<?php echo $lesson['id']; ?>" style="background-color: aqua; padding: 0 3px 0 3px; border-radius: 4px">Edit</a>
                        <a href="index.php?controller=lesson&action=delete&id=<?php echo $lesson['id']; ?>" style="background-color: aqua; padding: 0 3px 0 3px; border-radius: 4px" >Delete</a>
                        <a href="index.php?controller=material&action=index&id=<?php echo $lesson['id']; ?>" style="background-color: aqua; padding: 0 3px 0 3px; border-radius: 4px" >Detail</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>



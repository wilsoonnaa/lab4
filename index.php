<?php $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <h1>Task list</h1>
    <div class="container">
        <?php

        foreach ($xml->item as $item) {
        ?>
            <div class="task-card">
                <span class="task-card-name"><?php echo $item->name ?></span>
                <div class="task-content">
                    <span class="task-card-assignedTo"><?php echo $item->assignedTo ?></span>
                    <span class="task-card-deadline"><?php echo $item['deadline'] ?></span>
                    <a class="hyperlinks" href="update.php?id=<?php echo $item['id']?>">Update</a>
                    <a class="hyperlinks" href="delete.php?id=<?php echo $item['id']?>">Delete</a>
                </div>
            </div>
        <?php
        }

        ?>
       
    </div>

    <a href="create.php"><strong>Add a new task!</strong></a>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css" />
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $task_name = $_POST['task_name'];
        $assignedTo = $_POST['assignedTo'];
        $deadline = $_POST['deadline'];

        $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
        
        $task = $xml->addChild('item', '');
        $task->addAttribute('deadline', $deadline);
        $task->addChild('name', $task_name);
        $task->addChild('assignedTo', $assignedTo);
        $task->addAttribute('id', $xml->count());

        $xml->saveXML('data.xml');
        echo '<script>
        alert("New task succesfully added.");
        location.href="index.php";
        </script>';
    }
    ?>
    <form method="POST" action="create.php">
        Task name: <input type="text" name="task_name" required /><br />
        Task solver: <input type="text" name="assignedTo" /><br />
        Deadline: <input type="date" name="deadline" /><br />
        <input type="submit" value="Save" />
    </form>
    
    <a href="index.php"><strong>Back to home</strong></a>
</body>

</html>
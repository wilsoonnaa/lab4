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
    $id = 0;
    $name = '';
    $assignedTo = '';
    $deadline = '';

    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $name = $item->name;
                $assignedTo = $item->assignedTo;
                $deadline = $item['deadline'];
                $node = $item;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $item->name = $_POST['task_name'];
                $item->assignedTo = $_POST['assignedTo'];
                $item['deadline'] = $_POST['deadline'];
            }
        }
        $xml->saveXML('data.xml');
        echo '<script>
        alert("Task succesfully updated.");
        location.href="index.php";
        </script>';
    }
    ?>

    <form method="POST" action="update.php?id=<?= $id ?>">
        Task name: <input type="text" name="task_name" required value="<?= $name ?>" /><br />
        Task solver: <input type="text" name="assignedTo" value="<?= $assignedTo ?>" /><br />
        Deadline: <input type="date" name="deadline" value="<?= $deadline ?>" /><br />
        <input type="hidden" value="<?= $id ?>" name="id"/>
        <input type="submit" value="Save" />
    </form>
    <a href="index.php"><strong>Back to home</strong></a>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
			<a href="https://github.com/gemalisk/CIS355Prog5">Github Repo</a>
            <div class="row">
                <h3>Customers</h3> <!-- Updated to Customers -->
            </div>
            <div class="row">
                <p>
                    <a href="../create/create.html" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../database/database.php';
                        $pdo = Database::connect();
                        $sql = 'SELECT * FROM customers ORDER BY id DESC';
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['mobile'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="../read/read.html?id=' . $row['id'] . '">Read</a>'; // Changed Link Reference
                            echo '&nbsp;';
                            echo '<a class="btn btn-success" href="../update/update.html?id=' . $row['id'] . '">Update</a>'; // Changed Link Reference
                            echo '&nbsp;';
                            echo '<a class="btn btn-danger" href="../delete/delete.html?id=' . $row['id'] . '">Delete</a>'; // Changed Link Reference
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /container -->
    </body>
</html>

<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beautiful Table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Data Table</h2>
            <?php include "alerts.php" ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Father name</th>
                            <th scope="col">Phone no</th>
                            <th scope="col">Country</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM c_table";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $fname = $row['fname'];
                                $phone = $row['phone'];
                                $dropdown = $row['dropdown'];
                                $email = $row['email'];
                                $address = $row['address'];
                                $gender = $row['gender'];
                                $file = $row['file'];
                                echo "<tr>
                                <td>  $id  </td>
                                <td>  $name  </td>
                                <td>  $fname  </td>
                                <td>  $phone  </td>
                                <td>  $dropdown  </td>
                                <td>  $email  </td>
                                <td>  $address  </td>
                                <td>  $gender  </td>
                                <td>
                                  <img src=\"files/$file\" alt=\"\" class='rounded-circle' width='50px' height='50px'>  
                                </td>
                                <td>
                                <div class=\"btn-group\">
                                <a href='delete.php?deleteid=" . $id . "'class='btn btn-danger' style='margin-right:10px;'><i class=\"bi bi-trash-fill\"></i></a>
                                <a href='edit.php?editid=" . $id . "' class='btn btn-primary'><i class=\"bi bi-pencil-fill\"></i></a>
                                </td>
                                </tr>
                                </dib>";

                            }

                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>

    </html>

</body>

</html>
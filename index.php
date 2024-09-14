<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "students";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Something went wrong! : " . $conn->connect_error);
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class 4/5 Roster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-dark text-center">
                <h2>รายชื่อนักเรียนชั้น ม.4/12 และ นักเรียนชั้น ม.4/13</h2>
            </div>
            <div class="card-body p-4">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>#</th>
                            <th>ชื่อจริง</th>
                            <th>นามสกุล</th>
                            <th>รหัสนักเรียน</th>
                            <th>ชั้น</th>
                            <th>ห้อง</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>สมัครวันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row['ID'] . "</td>
                                        <td>" . $row['F_name'] . "</td>
                                        <td>" . $row['L_name'] . "</td>
                                        <td>" . $row['Student_ID'] . "</td>
                                        <td>" . $row['Student_level'] . "</td>
                                        <td>" . $row['Class_ID'] . "</td>
                                        <td>" . $row['Email'] . "</td>
                                        <td>" . $row['User_name'] . "</td>
                                        <td>" . $row['Create_at'] . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center'>ไม่มีข้อมูล</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>
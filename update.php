<?php
include 'db_connection.php';

$roll = $name = $gender = $gpa = $city = "";
$notification = "";

// ✅ GET থেকে Roll নেওয়া
if (isset($_GET['roll'])) {
    $roll = $_GET['roll'];

    $sql = "SELECT * FROM students WHERE Roll='$roll'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
        $name = $student['Name'];
        $gender = $student['Gender'];
        $gpa = $student['GPA'];
        $city = $student['City'];
    } else {
        $notification = "<div class='bg-red-100 text-red-700 p-3 rounded mb-4 border border-red-300'>
            Student not found!
        </div>";
    }
}

// ✅ ফর্ম সাবমিট হলে ডেটা আপডেট করা
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $gpa = $_POST['gpa'];
    $city = $_POST['city'];

    $update_sql = "UPDATE students 
                   SET Name='$name', Gender='$gender', GPA='$gpa', City='$city' 
                   WHERE Roll='$roll'";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: display.php");
        exit;
    } else {
        $notification = "<div class='bg-red-100 text-red-700 p-3 rounded mb-4 border border-red-300'>
            Error: ".mysqli_error($conn)."
        </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

<div class="container mx-auto flex justify-center">
    <form action="" method="post" class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">

        <h2 class="text-2xl font-bold text-center mb-6 text-sky-600">Update Student</h2>

        <?php echo $notification; ?>

        <!-- Roll Number (readonly) -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Roll Number</label>
            <input type="text" name="roll" readonly value="<?php echo $roll; ?>"
                   class="w-full border border-gray-300 px-3 py-2 rounded bg-gray-100 cursor-not-allowed">
        </div>

        <!-- Name -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Name</label>
            <input type="text" name="name" required value="<?php echo $name; ?>"
                   class="w-full border border-gray-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400">
        </div>

        <!-- Gender -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Gender</label>
            <select name="gender" required class="w-full border border-gray-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400">
                <option value="Male" <?php if($gender=='Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if($gender=='Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>

        <!-- GPA -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">GPA</label>
            <input type="number" step="0.01" name="gpa" required value="<?php echo $gpa; ?>"
                   class="w-full border border-gray-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400">
        </div>

        <!-- City -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">City</label>
            <input type="text" name="city" required value="<?php echo $city; ?>"
                   class="w-full border border-gray-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400">
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">
            <a href="display.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
            <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </div>

    </form>
</div>

</body>
</html>

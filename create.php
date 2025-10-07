<?php
include 'db_connection.php';

$notification = ""; // বার্তা রাখার জন্য

if (isset($_POST['submit'])) {
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $gpa = $_POST['gpa'];
    $city = $_POST['city'];

    // ✅ 1. প্রথমে চেক করবো রোলটা আগে থেকেই আছে কিনা
    $check_sql = "SELECT * FROM students WHERE Roll = '$roll'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // রোল আগে থেকেই আছে
        $notification = "<div class='bg-red-100 text-red-700 p-3 rounded mb-4 border border-red-300'>
            Roll <strong>$roll</strong> already exists. Please use a different Roll number.
        </div>";
    } else {
        // ✅ 2. না থাকলে ইনসার্ট করবো
        $insert_sql = "INSERT INTO students (Roll, Name, Gender, GPA, City)
                       VALUES ('$roll', '$name', '$gender', '$gpa', '$city')";
        if (mysqli_query($conn, $insert_sql)) {
            $notification = "<div class='bg-green-100 text-green-700 p-3 rounded mb-4 border border-green-300'>
                Student data added successfully ✅
            </div>";
            header("Location: display.php");
        } else {
            $notification = "<div class='bg-red-100 text-red-700 p-3 rounded mb-4 border border-red-300'>
                Error: " . mysqli_error($conn) . "
            </div>";
        }
    }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

  <div class="container mx-auto flex justify-center">
    <form action="" method="post" class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">

      <h2 class="text-2xl font-bold text-center mb-6 text-sky-600">Create Student</h2>

      <!-- ✅ নোটিফিকেশন মেসেজ -->
      <?php echo $notification; ?>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Roll Number</label>
        <input type="number" name="roll" required class="w-full border border-gray-300 px-3 py-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Name</label>
        <input type="text" name="name" required class="w-full border border-gray-300 px-3 py-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Gender</label>
        <select name="gender" required class="w-full border border-gray-300 px-3 py-2 rounded">
          <option value="">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">GPA</label>
        <input type="number" step="0.01" name="gpa" required class="w-full border border-gray-300 px-3 py-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">City</label>
        <input type="text" name="city" required class="w-full border border-gray-300 px-3 py-2 rounded">
      </div>

      <div class="flex justify-between">
        <a href="display.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
        <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
      </div>

    </form>
  </div>

</body>
</html>

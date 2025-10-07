<?php
include 'db_connection.php';

// ডেটা রিড করা
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

  <div class="students_data_show_form container mx-auto flex justify-center">
    <form action="" method="post" class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl">
      
      <caption class="text-2xl font-bold text-center block mb-4 text-sky-600">
        Student Details
      </caption>
      
      <div class="mb-4 flex justify-end">
        <button type="submit" name="create" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
          <a href="create.php">+ Create</a>
        </button>
      </div>

      <table class="w-full border border-gray-300">
        <thead class="bg-sky-400 text-white">
          <tr>
            <th class="border px-4 py-2">Roll Number</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Gender</th>
            <th class="border px-4 py-2">GPA</th>
            <th class="border px-4 py-2">City</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr class="text-center hover:bg-gray-100">
                <td class="border px-4 py-2"><?php echo $row['Roll']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['Name']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['Gender']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['GPA']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['City']; ?></td>
                <td class="border px-4 py-2 space-x-2">
                  <button type="submit" name="edit" value="<?php echo $row['Roll']; ?>" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"><a href="update.php"<?php echo $row['Roll']; ?>>Edit</a></button>
                  <button type="submit" name="delete" value="<?php echo $row['Roll']; ?>" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center py-4 text-gray-500">No students found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </form>
  </div>

</body>
</html>

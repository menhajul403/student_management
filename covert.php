<?php

if (isset($_GET['text'])) {
    $text = $_GET['text'];
   
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

<div>
    
    <div class="mb-4  items-center justify-center mx-auto" >
        <h3 class="text-2xl  font-bold  text-center mb-6 text-sky-600">Coverter </h3>
        <div class="flex items-center justify-center">
            <form action="" method="get">
                <label class="  font-semibold mb-1" for="text">Enter Your Number or Text</label>
            <input type="text" name="text" id="text" class=" mx-5 border border-gray-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Convert</button>
            </form>
        </div>
         <div class="flex items-center justify-center">
            <label class="  font-semibold mb-1" for="bainary">Convert Formate Bainary</label>
            <p id="bainary" class=" mx-5 border border-green-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400"><?php printf("%b", $text); ?></p>
        </div>
        <div class="flex items-center justify-center">
            <label class="  font-semibold mb-1" for="octal">Convert Formate Octal</label>
            <p id="octal" class=" mx-5 border border-green-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400"><?php printf("%o", $text); ?></p>
        </div>
        <div class="flex items-center justify-center">
            <label class="  font-semibold mb-1" for="hexa">Convert Formate Hexa</label>
            <p id="hexa" class=" mx-5 border border-green-300 px-3 py-2 rounded focus:ring-2 focus:ring-sky-400"><?php printf("%x", $text); ?></p>
        </div>
    </div>
</div>

</body>
</html>

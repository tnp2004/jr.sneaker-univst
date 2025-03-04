<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="output.css">
    <title>เพิ่มสินค้า</title>
</head>
<body>
    <div class="px-5 container mx-auto">
        <?php include_once 'header.html'?>
        
       <div class="w-96 lg:w-1/3 shadow-xl border p-5 rounded-2xl mx-auto mt-5 h-fit">
            <label class="text-2xl font-bold block text-center mb-3" for="login">การเพิ่มสินค้า</label>
            <span id="form-message" class="w-full inline-block text-center text-rose-500"></span>
            <form method="POST" action="api/add_sneaker.php" class="mt-2" enctype="multipart/form-data">
                <label class="text-xl" for="name">ชื่อสินค้า</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="text" name="name" id="name" required>
                <label class="text-xl" for="brand">แบรนด์</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="text" name="brand" id="brand" required>
                <label class="text-xl" for="description">คำอธิบาย</label>
                <textarea class="py-1 px-2 w-full mb-2 border rounded-md" name="description" id="description" required></textarea>
                <label class="text-xl" for="price">ราคา</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="number" name="price" id="price" required>
                <label class="text-xl" for="inStock">จำนวนสินค้า</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="number" name="inStock" id="inStock" required>
                <label class="text-xl" for="image">รูปภาพ</label>
                <input class="py-1 w-full mb-4" type="file" accept="image/*" name="image" id="image" alt="Submit" required>
                <button class="py-1 text-xl w-full text-center mb-2 bg-gradient-to-r from-orange-400 to-amber-400 hover:from-orange-400/80 hover:to-amber-400/80 rounded-md" type="submit">
                    เพิ่มสินค้า
                </button>
            </form>
       </div>
    </div>
</body>
</html>
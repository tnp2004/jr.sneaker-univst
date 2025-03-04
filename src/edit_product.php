<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="output.css">
    <title>แก้ไขสินค้า</title>
</head>
<body onload="readProduct()">
    <div class="px-5 container mx-auto">
        <?php include_once 'header.html'?>
        
       <div class="w-96 lg:w-1/3 shadow-xl border p-5 rounded-2xl mx-auto mt-5 h-fit">
            <label class="text-2xl font-bold block text-center mb-3" for="login">การแก้ไขสินค้า</label>
            <img class="w-40 object-cover mx-auto shadow rounded" id="sneaker-image" alt="product">
            <span id="form-message" class="w-full inline-block text-center text-rose-500"></span>
            <form method="POST" action="api/edit_sneaker.php" class="mt-2" enctype="multipart/form-data">
                <label class="text-xl" for="id">ไอดี</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md bg-gray-200 text-gray-600" type="text" name="id" id="id" readonly>
                <label class="text-xl" for="name">ชื่อสินค้า</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="text" name="name" id="name">
                <label class="text-xl" for="brand">แบรนด์</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="text" name="brand" id="brand">
                <label class="text-xl" for="description">คำอธิบาย</label>
                <textarea class="py-1 px-2 w-full mb-2 border rounded-md" name="description" id="description"></textarea>
                <label class="text-xl" for="price">ราคา</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="number" name="price" id="price">
                <label class="text-xl" for="inStock">จำนวนสินค้า</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="number" name="inStock" id="inStock">
                <label class="text-xl" for="image">รูปภาพ</label>
                <input class="py-1 w-full mb-4" type="file" accept="image/*" name="image" id="image" alt="Submit">
                <button class="py-1 text-xl w-full text-center mb-2 bg-gradient-to-r from-emerald-400 to-green-400 hover:from-emerald-400/80 hover:to-green-400/80 rounded-md" type="submit">
                    อัพเดทสินค้า
                </button>
            </form>
       </div>
    </div>
</body>
</html>

<script>
    const readProduct = () => {
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');

        fetch(`http://localhost/jr-sneaker/src/api/read_sneaker.php?id=${id}`)
        .then(res => res.text())
        .then(result => {
            const data = JSON.parse(result)
            console.log(data)
            let id = document.getElementById("id");
            let name = document.getElementById("name");
            let brand = document.getElementById("brand");
            let description = document.getElementById("description");
            let price = document.getElementById("price");
            let inStock = document.getElementById("inStock");
            let image = document.getElementById("sneaker-image");

            id.value = data.id
            name.value = data.name
            brand.value = data.brand
            description.value = data.description
            price.value = data.price
            inStock.value = data.inStock
            image.src = `images/products/${data.imageName}`
        }).catch(e => console.error(e))
    };
</script>
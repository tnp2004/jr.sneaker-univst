<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="output.css">
    <title>Admin Products</title>
</head>
<body>
    <div class="px-5 container mx-auto">
        <?php include_once 'header.html'?>

        <div class="flex justify-between mb-3">
            <label class="text-2xl font-bold" for="manage-products">จัดการสินค้า</label>
            <a href="add_product.php" class="flex items-center bg-amber-400/80 hover:bg-amber-400 px-2 py-1 rounded font-semibold cursor-pointer">
                <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>    
                เพิ่มสินค้า
            </a>
        </div>
        <table class="w-full shadow-xl mb-5">
            <thead>
                <tr class="bg-gradient-to-r from-amber-400/80 to-yellow-400/80">
                    <th class="first:rounded-tl-md last:rounded-tr-md py-1">รูปภาพ</th>
                    <th class="first:rounded-tl-md last:rounded-tr-md py-1">ไอดี</th>
                    <th class="text-start first:rounded-tl-md last:rounded-tr-md py-1">ชื่อ</th>
                    <th class="text-start first:rounded-tl-md last:rounded-tr-md py-1">แบรนด์</th>
                    <th class="text-start first:rounded-tl-md last:rounded-tr-md py-1">คำอธิบาย</th>
                    <th class="text-start first:rounded-tl-md last:rounded-tr-md py-1">ราคา</th>
                    <th class="first:rounded-tl-md last:rounded-tr-md py-1">จำนวนสินค้า</th>
                    <th class="text-start first:rounded-tl-md last:rounded-tr-md py-1">แก้ไข</th>
                    <th class="text-start first:rounded-tl-md last:rounded-tr-md py-1">ลบ</th>
                </tr>
            </thead>
            <tbody class="max-h-52 overflow-y-scroll" id="product-table"></tbody>
        </table>
    </div>
</body>
</html>

<script>
    const productTable = document.getElementById("product-table");

    const requestOptions = {
        method: "GET",
        redirect: "follow",
    }

    fetch("http://localhost/jr-sneaker/src/api/read_all.php", requestOptions)
    .then(res => res.text())
    .then(result => {
        var jsonObj = JSON.parse(result);
        for (let sneaker of jsonObj) {
            console.log(sneaker);
            const row = `
            <tr class="odd:bg-white even:bg-gray-100">
                <td class="w-20">
                    <img src="images/products/${sneaker.imageName}" alt="${sneaker.name}" />
                </td>
                <td class="text-center">${sneaker.id}</td>
                <td>${sneaker.name}</td>
                <td>${sneaker.brand}</td>
                <td>${sneaker.description}</td>
                <td>${sneaker.price}</td>
                <td class="text-center">${sneaker.inStock}</td>
                <td><button class="text-emerald-400 p-1 hover:text-emerald-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                </button></td>
                <td><button class="text-rose-400 p-1 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                </button></td>
            </tr>
            `
        productTable.insertAdjacentHTML("beforeend", row);
        }
    }).catch(e => console.log(e))

    const addProduct = () => {

    }

    const editProduct = (id) => {

    }

    const removeProduct = (id) => {
        
        fetch("")
    }
</script>
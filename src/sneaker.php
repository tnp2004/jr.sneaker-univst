<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="output.css">
    <title>JR.SNEAKER</title>
</head>

<body>
    <div class="px-5 container mx-auto">
        <?php include_once 'header.html'?>
        
        <div class="flex flex-col lg:flex-row gap-10 mt-10 text-xl mb-5">
            <div class="">
                <img class="rounded shadow-md" id="image" alt="sneaker">
            </div>
            <div class=" lg:p-0 lg:w-fit px-5">
                <div class="mb-10">
                    <h1 class="text-3xl font-bold" id="name"></h1>
                    <span class="text-slate-600 mb-5" id="brand"></span>
                    <h2 class="my-5 font-bold">฿<span class="font-bold" id="price"></span></h2>
                    <div>
                        <label class="font-semibold" for="description">คำอธิบาย</label>
                        <h2 id="description"></h2>
                    </div>
                </div>
                    <div class="flex gap-2 w-full lg:w-fit">
                        <button id="add-btn" class="border w-10 h-10 align-middle rounded hover:bg-slate-100/90">+</button>
                        <input id="quantity" class="bg-slate-100 rounded w-16 text-center" value="1" type="text" />
                        <button id="delete-btn" class="border w-10 h-10 align-middle rounded hover:bg-slate-100/90">-</button>
                    </div>
                    <button class="w-full lg:w-fit mt-5 rounded bg-gradient-to-r from-orange-400 to-amber-400 hover:from-orange-400/80 hover:to-amber-400/80 text-md text-white py-2 px-4">เพิ่มลงตะกร้า</button>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    const quantity = document.getElementById("quantity")
    
    document.getElementById("add-btn").addEventListener("click", () => {
        quantity.value++
    })
    document.getElementById("delete-btn").addEventListener("click", () => {
        if(quantity.value > 1) {
            quantity.value--
        }
    })

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    fetch(`http://localhost/jr.sneaker-univst/src/api/read_sneaker.php?id=${id}`)
    .then(res => res.text())
    .then(result => {
        var data = JSON.parse(result);
        const name = document.getElementById("name")
        const brand = document.getElementById("brand")
        const description = document.getElementById("description")
        const price = document.getElementById("price")
        const image = document.getElementById("image")
        console.log(data)

        name.innerHTML = data.name
        brand.innerHTML = data.brand
        description.innerHTML = data.description
        price.innerHTML = data.price
        image.src = `./images/products/${data.imageName}`
    }).catch(e => console.log(e))
</script>
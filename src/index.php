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
        
        <div class="md:flex">
            <div class="md:w-1/2 md:text-start text-center my-auto">
                <label class="block text-4xl mb-3 md:text-5xl md:mb-10" for="sneaker-name">Air Max 97</label>
                <label class="hidden md:block md:mb-10" for="price">3,500 บาท</label>
                <button class="hidden md:block w-fit bg-gradient-to-r from-orange-400 to-amber-400 text-md text-white py-2 px-4">เพิ่มลงตะกร้า</button>
            </div>
            <a href="./air-max-97" class="md:w-1/2">
                <img src="images/products/air_max_97.webp" alt="sneaker-image">
            </a>
            <div class="md:hidden my-3">
                <label class="block mb-2 text-xl" for="price">3,500 บาท</label>
                <button class="block w-full text-2xl bg-gradient-to-r from-orange-400 to-amber-400 text-white py-2 px-4">เพิ่มลงตะกร้า</button>
            </div>
        </div>

        <div class="my-5">
            <label class="text-xl" for="recommand-sneaker">สินค้าแนะนำ</label>
                <!-- recommand product -->
                <div id="cards" class="md:grid grid-flow-row grid-cols-4 gap-5">
                    <a href="./puma" class="hover:drop-shadow-xl bg-white p-1 rounded">
                        <img class="w-full h-fit" src="https://placehold.co/270x200" alt="sneaker-image">
                        <label class="block italic" for="sneaker-name">Puma Running SX</label>
                        <label class="block text-slate-600" for="price">1,200 บาท</label>
                    </a>
                    <div>
                        <img class="w-full" src="https://placehold.co/270x200" alt="sneaker-image">
                        <label class="block italic" for="sneaker-name">Puma Running SX</label>
                        <label class="block text-slate-600" for="price">1,200 บาท</label>
                    </div>
                    <div>
                        <img class="w-full" src="https://placehold.co/270x200" alt="sneaker-image">
                        <label class="block italic" for="sneaker-name">Puma Running SX</label>
                        <label class="block text-slate-600" for="price">1,200 บาท</label>
                    </div>
                    <div>
                        <img class="w-full" src="https://placehold.co/270x200" alt="sneaker-image">
                        <label class="block italic" for="sneaker-name">Puma Running SX</label>
                        <label class="block text-slate-600" for="price">1,200 บาท</label>
                    </div>
            </div>
            <!-- watch all product -->
            <div class="text-end mb-5 mt-2">
                <a href="./sneakers.html" class="group inline-block">
                    <label class="text-slate-600 group-hover:cursor-pointer"
                        for="go-all-new-product">ดูสินค้าทั้งหมด</label>
                    <svg class="text-slate-500 inline" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-move-right">
                        <path d="M18 8L22 12L18 16" />
                        <path d="M2 12H22" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="my-15">
            <div class="text-center">
                <label class="block text-2xl" for="quote-1">รองเท้าที่ดี</label>
                <label class="block text-2xl" for="quote-2">จะพาคุณไปยังสถานที่ดีๆ</label>
                <span class="block text-slate-600">ไม่ต้องมองหาต่ออีกแล้ว
                    ที่นี่คือที่ๆคุณจะได้พบกับคู่ที่ดีที่สุด</span>
            </div>
            <div class="md:w-3/4 my-10 mx-auto md:flex justify-between gap-2">
                <div class="flex flex-col justify-end text-center text-lg w-3/5 mx-auto md:w-1/5">
                    <img class="" src="images/jr-sneaker-footer-1.png" alt="sneaker">
                    <label class="" for="quote">รองเท้าแบรนด์แท้ มือสอง ราคาคุ้มค่า</label>
                </div>
                <div class="flex flex-col justify-end text-center text-lg w-3/5 mx-auto md:w-1/5">
                    <img src="images/jr-sneaker-footer-2.png" alt="sneaker">
                    <label class="" for="quote">ของแท้แน่นอน</label>
                </div>
                <div class="flex flex-col justify-end text-center text-lg w-3/5 mx-auto md:w-1/5">
                    <img src="images/jr-sneaker-footer-3.png" alt="sneaker">
                    <label class="" for="quote">รองเท้ามือสอง สภาพดี</label>
                </div>
            </div>
        </div>

    </div>
</body>
</html>

<script>
    const menuBtn = document.getElementById("menu-btn");
    const menuDropdown = document.getElementById("menu-dropdown");

    menuBtn.addEventListener("click", () => {
        menuDropdown.classList.toggle("hidden");
    });

    var cards = document.getElementById("cards")
    const requestOptions = {
        method: "GET",
        redirect: "follow",
    }

    fetch("http://localhost/jr-sneaker/src/api/read_index_preview.php", requestOptions)
    .then(res => res.text())
    .then(result => {
        cards.innerHTML = "";
        var jsonObj = JSON.parse(result);
        for (let sneaker of jsonObj) {
            console.log(sneaker);
            const sneakerURL = sneaker.name.toLowerCase().replaceAll(" ", "-");
            const card = `
            <a href="${sneakerURL}" class="hover:drop-shadow-xl duration-300 bg-white p-1 rounded cursor-pointer">
                <img class="w-full h-fit" src="images/products/${sneaker.imageName}" alt="${sneaker.name}">
                <label class="block italic cursor-pointer" for="${sneaker.name}">${sneaker.name}</label>
                <label class="block text-slate-600 cursor-pointer" for="price">${sneaker.price} บาท</label>
            </a>
            `
        cards.insertAdjacentHTML("beforeend", card);
        }
    }).catch(e => console.log(e))
</script>
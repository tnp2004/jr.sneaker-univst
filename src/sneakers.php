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
        
        <div class="flex gap-5 justify-center">
            <div class="w-1/5 text-xl hidden lg:block">
                <div>
                    <label class="font-semibold" for="brand">แบรนด์</label>
                    <ul class="ml-5">
                        <li>
                            <input type="checkbox" name="nike" id="nike-checkbox">
                            <label for="nike">Nike</label>
                        </li>
                        <li>
                            <input type="checkbox" name="adidas" id="adidas-checkbox">
                            <label for="adidas">Adidas</label>
                        </li>
                        <li>
                            <input type="checkbox" name="newbalance" id="newbalance-checkbox">
                            <label for="newbalance">New Balance</label>
                        </li>
                        <li>
                            <input type="checkbox" name="converse" id="converse-checkbox">
                            <label for="converse">Converse</label>
                        </li>
                        <li>
                            <input type="checkbox" name="reebok" id="reebok-checkbox">
                            <label for="reebok">Reebok</label>
                        </li>
                        <li>
                            <input type="checkbox" name="vans" id="vans-checkbox">
                            <label for="vans">Vans</label>
                        </li>
                    </ul>
                </div>
                <hr class="my-5">
                <div>
                    <label id="price-range-label" class="block font-semibold" for="price-range">ราคา <span class="text-sm text-slate-600">(0 บาท)</span></label>
                        <input class="w-full accent-amber-400 border-0 h-1" type="range" name="price-range" id="price-range" min="0" max="10000" step="100">
                        <div class="flex justify-between">
                            <span>0 บาท</span>
                            <span>10,000 บาท</span>
                        </div>
                </div>
                <hr class="my-5">
                <div>
                    <label class="block font-semibold mb-1" for="price-range">ขนาด</label>
                    <div class="grid grid-flow-row grid-cols-4 gap-3 w-fit">
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">32</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">33</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">34</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">35</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">36</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">37</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">38</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">39</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">40</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">41</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">42</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">43</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">44</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">45</button>
                        <button class="size bg-gradient-to-r border-2 w-fit px-2 py-1 rounded text-slate-600 text-xl">46</button>
                    </div>
                </div>
            </div>

            <div class="lg:w-4/5 my-5">
                <label class="text-xl" for="recommand-sneaker">สินค้าทั้งหมด</label>
                <!-- recommand product -->
                <div id="cards" class="w-fit md:grid grid-flow-row grid-cols-4 gap-5"></div>
            </div>
        </div>
</body>
</html>

<script>
    const sizeBtns = document.querySelectorAll(".size");
    sizeBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            btn.classList.toggle("from-orange-400");
            btn.classList.toggle("to-yellow-400");
            btn.classList.toggle("drop-shadow-md");
            btn.classList.toggle("border-slate-700");
            btn.classList.toggle("text-slate-900");
        });
    });

    const priceRange = document.getElementById("price-range");
    const priceRangeLabel = document.getElementById("price-range-label");
    priceRange.addEventListener("input", () => {
        priceRangeLabel.innerHTML = `ราคา <span class="text-sm text-slate-600">(${priceRange.value} บาท)</span>`;
    });

    var cards = document.getElementById("cards")
    const requestOptions = {
        method: "GET",
        redirect: "follow",
    }

    fetch("http://localhost/jr-sneaker/src/api/read_all.php", requestOptions)
    .then(res => res.text())
    .then(result => {
        cards.innerHTML = "";
        var jsonObj = JSON.parse(result);
        for (let sneaker of jsonObj) {
            const card = `
            <a href="./sneaker.php?id=${sneaker.id}" class="hover:drop-shadow-xl duration-300 bg-white p-1 my-1 rounded cursor-pointer flex flex-col justify-between">
                <img class="w-full max-h-52 h-fit object-cover" src="images/products/${sneaker.imageName}" alt="${sneaker.name}">
               <div>
                <label class="block italic cursor-pointer" for="${sneaker.name}">${sneaker.name}</label>
                <label class="block text-slate-600 cursor-pointer" for="price">${sneaker.price} บาท</label>
                </div>
            </a>
            `
        cards.insertAdjacentHTML("beforeend", card);
        }
    }).catch(e => console.log(e))
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="output.css">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <div class="px-5 container mx-auto">
        <?php include_once 'header.html'?>
        
       <div class="lg:w-72 lg:shadow-xl lg:border p-5 rounded-2xl mx-auto mt-16">
            <label class="text-2xl font-bold block text-center mb-3" for="login">การเข้าสู่ระบบ</label>
            <span id="form-message" class="w-full inline-block text-center text-rose-500"></span>
            <form class="mt-2" onsubmit="return false">
                <label class="text-xl" for="username">ชื่อผู้ใช้</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="text" name="username" id="username" required>
                <label class="text-xl" for="password">รหัสผ่าน</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="password" name="password" id="password" required>
                <button onclick="checkLogin()" class="py-1 text-xl w-full text-center mb-2 bg-gradient-to-r from-orange-400 to-amber-400 hover:from-orange-400/80 hover:to-amber-400/80 rounded-md" type="submit">เข้าสู่ระบบ</button>
            </form>
            <a href="register.php" class="text-slate-600 text-center block hover:underline">สมัครสมาชิก ?</a>
       </div>
    </div>
</body>
</html>

<script>
    const checkLogin = () => {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const formMessage = document.getElementById("form-message")
        console.log(`username: ${username} | password: ${password}`)

        if (username == "" || password == "") {
            formMessage.innerHTML = "กรุณากรอกชื่อผู้ใช้ และ รหัสผ่าน"
            return
        }

        const headers = new Headers();
        headers.append("Content-Type", "application/json");

        const body = JSON.stringify({ 
            username: username, 
            password: password 
        })

        const request = {
            method: "POST",
            headers,
            body,
            redirect: "follow"
        }

        fetch("http://localhost/jr.sneaker-univst/src/api/login.php", request)
        .then(response => response.text())
        .then(result => {
            const data = JSON.parse(result)
            if (data.status != "ok") {
                formMessage.innerHTML = "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง"
                return
            }
            
            window.open("admin_products.php")
        })
        .catch(e => console.error(e));
    }
</script>
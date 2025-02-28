<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="output.css">
    <title>การสมัครสมาชิก</title>
</head>
<body>
    <div class="px-5 container mx-auto">
        <?php include_once 'header.html'?>
        
       <div class="w-72 shadow-xl border p-5 rounded-2xl mx-auto mt-16">
            <label class="text-2xl font-bold block text-center mb-3" for="login">การสมัครสมาชิก</label>
            <span id="form-message" class="w-full inline-block text-center text-rose-500"></span>
            <form class="mt-2" onsubmit="return false">
                <label class="text-xl" for="username">ชื่อผู้ใช้</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="text" name="username" id="username" required>
                <label class="text-xl" for="password">รหัสผ่าน</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="password" name="password" id="password" required>
                <label class="text-xl" for="password">ยืนยันรหัสผ่าน</label>
                <input class="py-1 px-2 w-full mb-4 border rounded-md" type="password" name="password" id="confirm-password" required>
                <button onclick="register()" class="py-1 text-xl w-full text-center mb-2 bg-gradient-to-r from-orange-400 to-amber-400 hover:from-orange-400/80 hover:to-amber-400/80 rounded-md" type="submit">
                    สมัครสมาชิก
                </button>
            </form>
            <a href="login.php" class="text-slate-600 text-center block hover:underline">เข้าสู่ระบบ ?</a>
       </div>
    </div>
</body>
</html>

<script>
    const register = () => {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm-password").value;
        const formMessage = document.getElementById("form-message")
        
        if (username == "" || password == "" || confirmPassword == "") {
            formMessage.innerHTML = "กรุณากรอกทุกช่องให้ครบถ้วน"
            return
        }

        if (password != confirmPassword) {
            formMessage.innerHTML = "รหัสผ่าน และ ยืนยันรหัสผ่านไม่ตรงกัน"
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

        fetch("http://localhost/jr-sneaker/src/api/register.php", request)
        .then(response => response.text())
        .then(result => {
            const data = JSON.parse(result);
            console.log(data);
            if (data.status != "ok") {
                formMessage.innerHTML = "เกิดข้อผิดพลาดในการสมัครสมาชิก"
                return
            }
            
            window.open("login.php");
        })
        .catch(e => console.error(e));
    }
</script>
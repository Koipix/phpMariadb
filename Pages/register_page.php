<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="form">
        <form method="post" id="registerForm">
            <h1>Register Form</h1>
            <p>Status: <span id="status"></span></p> <br>
            <label">Username</label> <br>
            <input type="text" id="user" name="user"> <br><br>
            <label>Passsword</label> <br>
            <input type="password" id="pass" name="pass"><br><br>
            <label>Confirm Password</label> <br>
            <input type="password" id="confpass" name="confpass"><br><br>
            <button type="button" onclick="fetchData()">Register</button> <br>
            <a href="/login">Already have an account?</a> <br><br>
            <p id="msg"></p>
        </form> 
        <br><br>
    </div>
    <script>
        function fetchData() {
            event.preventDefault();

            let formData = new FormData(document.getElementById("registerForm"));
            let message = document.getElementById("msg");

            fetch("/api/register.php", {
                method: "POST",
                body: formData
            })

            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    message.textContent = data.message || "Registration failed!";
                }
             })
            .catch(err => console.log("Error: ", err));
        }

        function fetchStatus() {
            fetch("/api/status.php")
                .then(response => response.text())
                .then(data => {
                    document.getElementById("status").textContent = data;
                })
                .catch(err => console.log("Error: " + err));
        }

        window.onload = function() {
             fetchStatus();
        };
    </script>
</body>

<style>
    /* lazy frontend */
    * {
        margin: 0;
        padding: 0;
    }

    .form {
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</html>
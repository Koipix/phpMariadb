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
            <input type="text" id="pass" name="pass"><br><br>
            <label>Confirm Password</label> <br>
            <input type="text" id="confpass" name="confpass"><br><br>
            <input type="submit" id="btn" value="Register" name="submit"> <br>
            <a href="">Already have an account?</a> <br><br>
            <p id="msg"></p>
        </form> 
        <br><br>
    </div>
    <script>
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let message = document.getElementById("msg");

            fetch("/api/register.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => { message.textContent = data })
            .catch(err => console.log("Error: ", err));
        });

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
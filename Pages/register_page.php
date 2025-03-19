<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="form">
        <form method="post" id="registerForm">
            <h1>Register</h1>
            <p>Status: <span id="status"></span></p> <br>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input class="form-control" type="text" id="user" name="user">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3 mt-4">
                <label class="form-label">Passsword</label>
                <input class="form-control" type="password" id="pass" name="pass">
            </div>
            <div class="mb-3 mt-4">
                <label class="form-label">Confirm Password</label>
                <input class="form-control" type="password" id="confpass" name="confpass">
            </div>
            <div class="d-grid">
                <button class="btn btn-primary my-4" onclick="fetchData()">Register</button>
            </div>
            <p>Already have an account? <a href="/login">Login here</a></p> <br><br>
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
    @font-face {
        font-family: Montserrat;
        font-weight: 400;
        src:
            local(Montserrat),
            url(https://fonts.gstatic.com/s/montserrat/v29/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCtr6Hw5aXo.woff2) format(woff2);
    }
    @font-face {
        font-family: Montserrat;
        font-weight: 700;
        src:
            local(Montserrat-Bold),
            local("Montserrat Bold"),
            url(https://fonts.gstatic.com/s/montserrat/v29/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCuM73w5aXo.woff2) format(woff2);
    }
    body {
        background-color: #a02f40;
        font-family: "Montserrat";
        height: 100vh;
        min-width: 240px;
        transition: background-color 0.25s ease;
    }
    .form {
        align-items: center;
        display: flex;
        height: 100%;
        justify-content: center;
        transition: all 0.25s ease;
    }
    #registerForm {
        align-items: center;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        margin: auto;
        max-width: 1000px;
        padding: 25px;
        width: 100%;
    }
    #registerForm > * {
        width: 100%;
    }
    #registerForm > h1 {
        color: #c63c51;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
    }
    #registerForm > p {
        text-align: center;
    }
    #emailHelp {
        height: 0px;
        margin-top: 0px;
        overflow: hidden;
        transition: all 0.25s ease;
    }
    #user:focus + #emailHelp {
        height: 42px;
        margin-top: 0.25rem;
    }
    .mt-4 {
        margin-top: 1rem !important;
    }
    .btn {
        border-color: #C63C51 !important;
        background-color: #C63C51;
        margin-top: 0.5rem !important;
        transition: all 0.25s ease;
    }
    .btn:hover, .btn:focus {
        color: #C63C51 !important;
        background-color: #C63C5100 !important;
    }
    #registerForm p:nth-of-type(2) a {
        color: #C63C51;
    }
    #msg {
        color: #C63C51;
        font-weight: 700;
        margin-bottom: 0px;
        text-align: center;
        text-transform: uppercase;
    }
    @media only screen and (min-width: 352px) {
        #user:focus + #emailHelp {
            height: 21px;
        }
    }
    @media only screen and (min-width: 390px) {
        #registerForm {
            padding: 50px 25px;
        }
    }
    @media only screen and (min-width: 540px) {
        body {
            background-color: #f2f2f2;
        }
        #registerForm {
            border: 2px solid #C63C51;
            border-radius: 50px;
            box-shadow: 0px 10px 10px #C63C5180;
            margin: 0px 50px;
            padding: 50px;
        }
        #registerForm > * {
            min-width: 436px;
            width: calc((100% - 102px) * 0.75);
        }
    }
</style>
</html>
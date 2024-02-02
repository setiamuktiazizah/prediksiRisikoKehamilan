<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="styles.css">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f0f2f5;
}

.container {
    width: 100%;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container {
    width: 400px;
    padding: 30px;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.form-container h1 {
    text-align: center;
    margin-bottom: 30px;
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

.remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.remember-me label {
    font-size: 14px;
    margin-left: 5px;
}

.form-container button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
}

.form-container button:hover {
    background-color: #45a049;
}

.form-container p {
    text-align: center;
    font-size: 14px;
    margin-bottom: 10px;
}

.form-container .social-media {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.form-container .social-media a {
    display: block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #fff;
    margin: 0 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
}

.form-container .social-media a:hover {
    background-color: #f5f5f5;
}

.form-container .social-media a img {
    width: 20px;
    height: 20px;
}

.form-container p a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: 500;
}

.form-container p a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="#">
                <h1>Sign Up</h1>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="johndoe@example.com">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="••••••••">
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <button type="submit">LOGIN</button>
                <p>or sign up using</p>
                <div class="social-media">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-google"></i></a>
                </div>
                <p>Forgot password? <a href="#">Email</a></p>
            </form>
        </div>
    </div>
</body>
</html>
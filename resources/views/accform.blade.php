<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Login / Register </title>

    <link rel="stylesheet" href="{{ asset('css/loginregister.css') }}">
    <script src="{{ asset('js/loginregister.js') }}"></script>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger text-center" style="color: red">
            <ul class="mb-0" style="list-style-type: none; padding: 0; margin:0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-center" style="color: green">
            <ul class="mb-0" style="list-style-type: none; padding: 0; margin: 0;">
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    @endif
    <!--Sign Up Form-->
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="/register" method="POST">
                @csrf
                <h1>Register Now</h1>
                <span>Create Your Account Now</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm" placeholder=" Confirm Password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <!--Sign In Form-->
        <div class="form-container sign-in">
            <form action="/login" method="POST">
                @csrf
                <h1>Sign In</h1>
                <span>Sign in to your Account</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password"required>
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back Students!</h1>
                    <p>Enter your personal details to enter the website</p>
                    <span>Already have an Account? Sign In Now!</span>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back Students!</h1>
                    <p>Register with your personal details to enter the website</p>
                    <span>Don't have an Account yet? Sign Up Now!</span>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

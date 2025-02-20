<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuanta Login</title>
    @vite('resources/sass/app.scss')
    <style>

        .password-container .toggle-password {
            position: relative;
            right: 1000px;
            top: 90%;
            cursor: right;
        }


        .forgot-password {
            display: block;
            text-align: right;
            margin-bottom: 20px;
            color: #2F9D9E;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #2F9D9E; /* Sesuaikan warna background tombol sesuai kebutuhan */
            color: white; /* Pastikan teks berwarna putih */
            padding: 10px;
            width: 100%;
            height: 50px;
            border-radius: 20px;
        }

        #toggle-password {
            position: absolute;
            right: 5px;
            top: 45px;
            cursor: pointer;
        }



    </style>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">

    <div class="p-4 border-0" style="width: 100%; max-width: 400px; border-radius: 8px;">
        <div class="text-center mb-4">
            <img class="d-none d-md-inline" width="200" src="{{ Vite::asset('resources/images/Logo-Kuanta.png') }}" alt="logo kuanta">
        </div>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        
        <!-- Ini Form Untuk Login  -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <h5> Username </h5>
                <input type="text" name="username" class="form-control form-control-lg rounded" placeholder="Masukan Username" style="background: #D4F1F4;"> <!-- Menggunakan 'username' -->
            </div>
            <div class="mb-3 position-relative">
                <h5> Password </h5>
                <input type="password" name="password" class="form-control form-control-lg rounded" placeholder="Password" style="background: #D4F1F4;">
                <span id="toggle-password">
                    <i class="bi bi-eye" id="toggle-password-icon"></i>
                </span>
            </div>
        
            <button type="submit" class="btn btn-primary btn-lg w-70 rounded-pill">Login</button>
        </form>
    </div>

    @vite('resources/js/app.js')

    <script>
        // JavaScript untuk toggle password visibility 
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.querySelector('input[name="password"]');
        const togglePasswordIcon = document.getElementById('toggle-password-icon');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePasswordIcon.classList.toggle('bi-eye');
            togglePasswordIcon.classList.toggle('bi-eye-slash');
        });
    </script>

</body>
</html>

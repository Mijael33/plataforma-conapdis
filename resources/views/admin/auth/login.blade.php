<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel Administrativo - CONAPDIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/conapdis.css') }}" rel="stylesheet">
    <style>
        .login-body {
            background: linear-gradient(135deg, #001e5c 0%, #003097 50%, #001e5c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 3rem 2.5rem;
            width: 420px;
            max-width: 95%;
        }
        .login-logo {
            display: block;
            margin: 0 auto 1.5rem;
            width: 180px;
        }
        .login-titulo {
            text-align: center;
            color: #1a3b5d;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }
        .login-subtitulo {
            text-align: center;
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }
        .login-card .form-control {
            border-radius: 8px;
            padding: 0.7rem 1rem;
            border: 1px solid #e5e7eb;
            font-size: 0.95rem;
        }
        .login-card .form-control:focus {
            border-color: #003097;
            box-shadow: 0 0 0 3px rgba(0,48,151,0.1);
        }
        .login-card .form-label {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
            margin-bottom: 0.4rem;
        }
        .btn-login {
            width: 100%;
            background-color: #003097;
            color: #ffffff;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background-color: #001e5c;
            color: #ffda00;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(26,59,93,0.4);
        }
        .login-error {
            background-color: #fee2e2;
            color: #dc2626;
            padding: 0.75rem;
            border-radius: 8px;
            font-size: 0.88rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .login-footer-text {
            text-align: center;
            font-size: 0.78rem;
            color: #9ca3af;
            margin-top: 2rem;
        }
    </style>
</head>
<body class="login-body">
    <div class="login-card">
        <img src="{{ asset('images/logos/logo-conapdis.png') }}" alt="CONAPDIS" class="login-logo">
        <h2 class="login-titulo">Panel Administrativo CONAPDIS</h2>
        <p class="login-subtitulo">Ingrese sus credenciales para acceder</p>
        
        @if($errors->any())
        <div class="login-error">
            {{ $errors->first('email') }}
        </div>
        @endif
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su usuario" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            <button type="submit" class="btn-login">Acceder al panel</button>
        </form>
        
        <p class="login-footer-text">&copy; {{ date('Y') }} CONAPDIS - Todos los derechos reservados</p>
    </div>
</body>
</html>
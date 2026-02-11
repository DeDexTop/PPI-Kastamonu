<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="{{ asset('img/Logo ppi.png') }}">
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #D32F2F, #fb7c7c);
    }

    .login-card {
      background: #ffffff;
      padding: 2.5rem;
      border-radius: 16px;
      width: 100%;
      max-width: 360px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .login-card h2 {
      margin: 0 0 1.5rem;
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.4rem;
      font-size: 0.9rem;
      color: #555;
    }

    .form-group input {
      width: 100%;
      padding: 0.7rem 0.9rem;
      border-radius: 10px;
      border: 1px solid #ddd;
      outline: none;
      font-size: 0.95rem;
      transition: border 0.2s, box-shadow 0.2s;
    }

    .form-group input:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    }

    .login-btn {
      width: 100%;
      padding: 0.8rem;
      border: none;
      border-radius: 12px;
      background: #D32F2F;
      color: #fff;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.25s, transform 0.1s;
    }

    .login-btn:hover {
      background: #fb7c7c;
    }

    .login-btn:active {
      transform: scale(0.98);
    }

    .extra {
      margin-top: 1.2rem;
      text-align: center;
      font-size: 0.85rem;
    }

    .extra a {
      color: #667eea;
      text-decoration: none;
    }

    .extra a:hover {
      text-decoration: underline;
    }
    .toggle-password {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      opacity: 0.6;
    }


    .toggle-password:hover {
      opacity: 1;
    }
    .password-wrapper {
      position: relative;
    }   
  </style>
</head>
<body>
  <div class="login-card">
    <h2>Login</h2>
    <form method="POST" action="/login">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="user@email.com" required name="email"/>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" placeholder="••••••••" required name="password"/>
                <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
            </div>
          </div>
      <button type="submit" class="login-btn btn-red">Masuk</button>
    </form>
    <div class="extra">
      <p>Kembali ke <a href="/" style="color: red; font-weight: bold">Beranda</a></p>
    </div>
  </div>
  <script>
    function togglePassword() {
    const passwordInput = document.getElementById('password');
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
</script>   
</body>
</html>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>إنشاء حساب جديد — الأسطورة رونق</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --red: #C0392B;
      --red-dark: #922B21;
      --blue: #1A3A6B;
      --bg: #0f172a;
      --glass: rgba(255, 255, 255, 0.05);
      --glass-border: rgba(255, 255, 255, 0.1);
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Cairo', sans-serif;
      background: var(--bg);
      background-image: radial-gradient(circle at 80% 20%, rgba(192, 57, 43, 0.15) 0%, transparent 40%),
                        radial-gradient(circle at 20% 80%, rgba(26, 58, 107, 0.3) 0%, transparent 40%);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      overflow: hidden;
    }
    .register-card {
      width: 100%;
      max-width: 460px;
      padding: 40px;
      background: var(--glass);
      backdrop-filter: blur(12px);
      border: 1px solid var(--glass-border);
      border-radius: 24px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
      text-align: center;
      animation: fadeIn 0.8s ease-out;
    }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .logo { font-size: 40px; margin-bottom: 15px; }
    h1 { font-size: 22px; font-weight: 800; margin-bottom: 8px; }
    p { color: rgba(255,255,255,0.5); font-size: 13px; margin-bottom: 25px; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; text-align: right; }
    .form-group { text-align: right; margin-bottom: 15px; }
    .full { grid-column: span 2; }
    label { display: block; font-size: 12px; font-weight: 600; margin-bottom: 6px; color: rgba(255,255,255,0.7); }
    input {
      width: 100%;
      padding: 12px 16px;
      background: rgba(255,255,255,0.05);
      border: 1px solid var(--glass-border);
      border-radius: 10px;
      color: #fff;
      font-family: 'Cairo', sans-serif;
      font-size: 14px;
      transition: all 0.3s;
    }
    input:focus { outline: none; border-color: var(--red); background: rgba(255,255,255,0.1); }
    .btn {
      width: 100%;
      padding: 14px;
      background: var(--red);
      color: #fff;
      border: none;
      border-radius: 12px;
      font-family: 'Cairo', sans-serif;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 10px;
    }
    .btn:hover { background: var(--red-dark); transform: translateY(-2px); box-shadow: 0 10px 20px rgba(192, 57, 43, 0.3); }
    .footer-links { margin-top: 24px; font-size: 13px; color: rgba(255,255,255,0.4); }
    .footer-links a { color: var(--red); text-decoration: none; font-weight: 700; }
    .alert { background: rgba(231, 76, 60, 0.2); border: 1px solid rgba(231, 76, 60, 0.3); padding: 10px; border-radius: 10px; font-size: 12px; color: #ff8a80; margin-bottom: 15px; text-align: right; }
  </style>
</head>
<body>

<div class="register-card">
  <div class="logo">🚀</div>
  <h1>انضم لأسرة الأسطورة</h1>
  <p>ابدأ بإدارة أصول موقعك باحترافية وسهولة</p>

  @if($errors->any())
    <div class="alert">
      @foreach($errors->all() as $error)
        <div>• {{ $error }}</div>
      @endforeach
    </div>
  @endif

  <form action="{{ route('register.post') }}" method="POST">
    @csrf
    <div class="form-grid">
      <div class="form-group full">
        <label>الاسم الكامل</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="أدخل اسمك" required>
      </div>
      <div class="form-group full">
        <label>البريد الإلكتروني</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="user@example.com" required>
      </div>
      <div class="form-group">
        <label>كلمة المرور</label>
        <input type="password" name="password" placeholder="••••••••" required>
      </div>
      <div class="form-group">
        <label>تأكيد كلمة المرور</label>
        <input type="password" name="password_confirmation" placeholder="••••••••" required>
      </div>
    </div>
    
    <button type="submit" class="btn">إنشاء الحساب الآن</button>
  </form>

  <div class="footer-links">
    لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجل دخولك من هنا</a>
  </div>
</div>

</body>
</html>

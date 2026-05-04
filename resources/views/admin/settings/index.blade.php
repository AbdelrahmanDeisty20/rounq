<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>إعدادات التواصل | الأسطورة رونق</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <div class="icon">⚙️</div>
    <div class="brand">
      <div class="brand-name">الأسطورة <em>رونق</em></div>
      <div class="brand-sub">إعدادات الموقع</div>
    </div>
  </div>
  <div class="sidebar-section">
    <div class="sidebar-section-title">القائمة</div>
    <ul class="sidebar-nav">
      <li><a href="{{ route('admin.images.index') }}"><span class="nav-icon">🖼️</span> إدارة الصور</a></li>
      <li><a href="{{ route('admin.users.index') }}"><span class="nav-icon">👥</span> إدارة المستخدمين</a></li>
      <li><a href="{{ route('admin.settings.index') }}" class="active"><span class="nav-icon">📞</span> أرقام التواصل</a></li>
    </ul>
  </div>
  <div class="sidebar-footer">
    <a href="{{ url('/') }}" target="_blank">↗️ معاينة الموقع</a>
    <form action="{{ route('logout') }}" method="POST" style="margin-top:10px">
      @csrf
      <button type="submit" class="btn btn-outline btn-sm" style="width:100%">🚪 خروج</button>
    </form>
  </div>
</aside>

<!-- MAIN -->
<div class="main">
  <div class="topbar">
    <div class="topbar-title">
      <h1>إعدادات التواصل</h1>
      <p>تعديل أرقام الهاتف والواتساب والمعلومات الأساسية</p>
    </div>
  </div>

  <div class="content">
    @if(session('success'))
      <div style="padding:15px; background:#d4edda; color:#155724; border-radius:8px; margin-bottom:20px">{{ session('success') }}</div>
    @endif

    <div class="section-card">
      <div class="section-card-header">
        <h3>📞 معلومات الاتصال</h3>
      </div>
      <div class="section-card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST">
          @csrf
          <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
              <label class="form-label">رقم الهاتف (للاتصال)</label>
              <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="form-control ltr" placeholder="0500000000">
              <p style="font-size:11px; color:#666; margin-top:5px">هذا الرقم يظهر عند الضغط على "اتصل الآن"</p>
            </div>
            <div class="form-group">
              <label class="form-label">رقم الواتساب (بدون +)</label>
              <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}" class="form-control ltr" placeholder="966500000000">
              <p style="font-size:11px; color:#666; margin-top:5px">يجب كتابة كود الدولة (مثال: 9665...)</p>
            </div>
            <div class="form-group">
              <label class="form-label">البريد الإلكتروني</label>
              <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="form-control ltr" placeholder="info@example.com">
            </div>
            <div class="form-group">
              <label class="form-label">العنوان / الموقع</label>
              <input type="text" name="address" value="{{ $settings['address'] ?? '' }}" class="form-control" placeholder="القصيم، السعودية">
            </div>
          </div>
          <div style="margin-top:30px">
            <button type="submit" class="btn btn-primary" style="padding:12px 40px">✅ حفظ التعديلات</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

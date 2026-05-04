<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>إدارة المستخدمين | الأسطورة رونق</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<style>
  .user-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
  .user-table th, .user-table td { padding: 16px; text-align: right; border-bottom: 1px solid #eee; }
  .user-table th { background: #f8f9fa; color: #1a3a6b; font-weight: 700; }
  .user-table tr:hover { background: #fafafa; }
  .badge { padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 700; }
  .badge-admin { background: #ffebee; color: #c0392b; }
  .badge-user { background: #e3f2fd; color: #1a3a6b; }
  .perm-list { display: flex; flex-wrap: wrap; gap: 4px; margin-top: 5px; }
  .perm-badge { font-size: 10px; background: #f0f0f0; padding: 2px 6px; border-radius: 4px; color: #666; border: 1px solid #ddd; }
  .perm-check-item { display: flex; align-items: center; gap: 8px; font-size: 13px; margin-bottom: 8px; cursor: pointer; }
</style>
</head>
<body>

<!-- SIDEBAR -->
@php
  $permLabels = [
    'add images' => 'إضافة صور',
    'edit images' => 'تعديل صور',
    'delete images' => 'حذف صور',
    'manage images' => 'إدارة الصور',
    'manage users' => 'إدارة المستخدمين',
    'manage settings' => 'إعدادات الموقع',
  ];
@endphp
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <div class="icon">🚛</div>
    <div class="brand">
      <div class="brand-name">الأسطورة <em>رونق</em></div>
      <div class="brand-sub">إدارة المستخدمين</div>
    </div>
  </div>
  <div class="sidebar-section">
    <div class="sidebar-section-title">القائمة</div>
    <ul class="sidebar-nav">
      <li><a href="{{ route('admin.images.index') }}"><span class="nav-icon">🖼️</span> إدارة الصور</a></li>
      <li><a href="{{ route('admin.users.index') }}" class="active"><span class="nav-icon">👥</span> إدارة المستخدمين</a></li>
      <li><a href="{{ route('admin.settings.index') }}"><span class="nav-icon">📞</span> أرقام التواصل</a></li>
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
      <h1>إدارة المستخدمين</h1>
      <p>التحكم في صلاحيات الحسابات المسجلة</p>
    </div>
    <div class="topbar-actions">
      <button class="btn btn-primary" onclick="document.getElementById('addUserModal').style.display='flex'">➕ إضافة مستخدم جديد</button>
    </div>
  </div>

  <div class="content">
    @if(session('success'))
      <div style="padding:15px; background:#d4edda; color:#155724; border-radius:8px; margin-bottom:20px">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div style="padding:15px; background:#f8d7da; color:#721c24; border-radius:8px; margin-bottom:20px">
        @foreach($errors->all() as $error) <div>{{ $error }}</div> @endforeach
      </div>
    @endif

    <div class="user-table-container">
      <table class="user-table">
        <thead>
          <tr>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
            <th>الرتبة</th>
            <th>الصلاحيات الخاصة</th>
            <th>تاريخ التسجيل</th>
            <th>الإجراءات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td><strong>{{ $user->name }}</strong></td>
            <td>{{ $user->email }}</td>
            <td>
              @foreach($user->roles as $role)
                <span class="badge badge-{{ $role->name == 'admin' ? 'admin' : 'user' }}">
                  {{ $role->name == 'admin' ? 'مدير' : 'مستخدم' }}
                </span>
              @endforeach
            </td>
            <td>
              @if($user->email !== 'admin@admin.com')
              <form action="{{ route('admin.users.updatePermissions', $user) }}" method="POST" id="perm-form-{{ $user->id }}">
                @csrf
                <div class="perm-list">
                  @foreach($permissions as $perm)
                    <label class="perm-check-item" style="margin:0; font-size:11px">
                      <input type="checkbox" name="permissions[]" value="{{ $perm->name }}" 
                        {{ $user->hasDirectPermission($perm->name) ? 'checked' : '' }}
                        onchange="document.getElementById('perm-form-{{ $user->id }}').submit()">
                      {{ $permLabels[$perm->name] ?? $perm->name }}
                    </label>
                  @endforeach
                </div>
              </form>
              @else
                <span class="badge badge-admin">صلاحيات كاملة</span>
              @endif
            </td>
            <td>{{ $user->created_at->format('Y/m/d') }}</td>
            <td>
              <div style="display:flex; gap:8px">
                @if($user->email !== 'admin@admin.com')
                <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                  @csrf
                  <select name="role" onchange="this.form.submit()" class="btn btn-outline btn-sm">
                    <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>مستخدم</option>
                    <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>مدير</option>
                  </select>
                </form>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">🗑️ حذف</button>
                </form>
                @else
                  <span style="font-size:12px; color:#999 italic">الحساب الأساسي</span>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ===== ADD USER MODAL ===== -->
<div class="modal-overlay" id="addUserModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center; z-index:1000;">
  <div class="modal" style="background:#fff; padding:24px; border-radius:12px; width:400px; max-width:95%;">
    <div class="modal-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
      <h3 style="margin:0">👤 إضافة مستخدم جديد</h3>
      <button onclick="document.getElementById('addUserModal').style.display='none'" style="background:none; border:none; font-size:20px; cursor:pointer;">✕</button>
    </div>
    <form action="{{ route('admin.users.store') }}" method="POST">
      @csrf
      <div class="form-group" style="margin-bottom:15px">
        <label style="display:block; margin-bottom:5px; font-weight:700">الاسم</label>
        <input type="text" name="name" required class="form-control" placeholder="اسم المستخدم">
      </div>
      <div class="form-group" style="margin-bottom:15px">
        <label style="display:block; margin-bottom:5px; font-weight:700">البريد الإلكتروني</label>
        <input type="email" name="email" required class="form-control" placeholder="example@email.com">
      </div>
      <div class="form-group" style="margin-bottom:15px">
        <label style="display:block; margin-bottom:5px; font-weight:700">كلمة المرور</label>
        <input type="password" name="password" required class="form-control" placeholder="********">
      </div>
      <div class="form-group" style="margin-bottom:20px">
        <label style="display:block; margin-bottom:5px; font-weight:700">الرتبة (الصلاحية)</label>
        <select name="role" required class="form-control" onchange="togglePermissions(this.value)">
          @foreach($roles as $role)
            <option value="{{ $role->name }}" {{ $role->name == 'admin' ? 'selected' : '' }}>{{ $role->name == 'admin' ? 'مدير' : 'مستخدم' }}</option>
          @endforeach
        </select>
      </div>
      <div id="permissionsGroup" class="form-group" style="margin-bottom:20px; display:none;">
        <label style="display:block; margin-bottom:10px; font-weight:700">الصلاحيات الإضافية للمستخدم</label>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
          @foreach($permissions as $perm)
            <label class="perm-check-item">
              <input type="checkbox" name="permissions[]" value="{{ $perm->name }}">
              {{ $permLabels[$perm->name] ?? $perm->name }}
            </label>
          @endforeach
        </div>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%">✅ إنشاء الحساب</button>
    </form>
  </div>
</div>

<script>
  function togglePermissions(role) {
    const group = document.getElementById('permissionsGroup');
    if (role === 'user') {
      group.style.display = 'block';
    } else {
      group.style.display = 'none';
    }
  }

  // Close modal when clicking outside
  window.onclick = function(event) {
    if (event.target == document.getElementById('addUserModal')) {
      document.getElementById('addUserModal').style.display = 'none';
    }
  }
</script>

</body>
</html>

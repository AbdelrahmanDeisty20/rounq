<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة إدارة الصور | الأسطورة رونق قلب الخليج</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@@400;600;700;900&display=swap" rel="stylesheet">
<style>
/* ===== RESET & BASE ===== */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --red: #C0392B;
  --red-dark: #922B21;
  --blue: #1A3A6B;
  --blue-light: #2980B9;
  --gold: #D4A017;
  --gold-light: #F1C40F;
  --white: #ffffff;
  --bg: #F0F2F5;
  --card: #ffffff;
  --sidebar: #1A2744;
  --sidebar-hover: rgba(255,255,255,0.08);
  --text: #2C3E50;
  --muted: #7F8C8D;
  --border: #E8ECF0;
  --success: #27AE60;
  --warning: #F39C12;
  --danger: #E74C3C;
  --shadow: 0 2px 12px rgba(0,0,0,0.08);
  --shadow-lg: 0 8px 32px rgba(0,0,0,0.14);
  --radius: 12px;
  --radius-sm: 8px;
}
body {
  font-family: 'Cairo', sans-serif;
  direction: rtl;
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  display: flex;
}

/* ===== SIDEBAR ===== */
.sidebar {
  width: 270px;
  background: var(--sidebar);
  min-height: 100vh;
  flex-shrink: 0;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 100;
  overflow-y: auto;
  transition: transform 0.3s ease;
  display: flex;
  flex-direction: column;
}
.sidebar-logo {
  padding: 24px 20px 20px;
  border-bottom: 1px solid rgba(255,255,255,0.1);
  display: flex;
  align-items: center;
  gap: 12px;
}
.sidebar-logo .icon { font-size: 32px; }
.sidebar-logo .brand { color: #fff; }
.sidebar-logo .brand-name { font-size: 14px; font-weight: 900; line-height: 1.3; }
.sidebar-logo .brand-name em { color: var(--gold-light); font-style: normal; }
.sidebar-logo .brand-sub { font-size: 11px; color: rgba(255,255,255,0.5); margin-top: 2px; }

.sidebar-section { padding: 20px 14px 8px; }
.sidebar-section-title { font-size: 10px; font-weight: 700; color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 1px; padding: 0 8px; margin-bottom: 8px; }
.sidebar-nav { list-style: none; }
.sidebar-nav li a {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 12px;
  border-radius: var(--radius-sm);
  color: rgba(255,255,255,0.75);
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  transition: all 0.2s;
  cursor: pointer;
}
.sidebar-nav li a:hover { background: var(--sidebar-hover); color: #fff; }
.sidebar-nav li a.active { background: var(--red); color: #fff; }
.sidebar-nav li a .nav-icon { font-size: 18px; width: 24px; text-align: center; }
.sidebar-nav li a .nav-badge {
  margin-right: auto;
  background: var(--gold);
  color: #fff;
  font-size: 10px;
  font-weight: 800;
  padding: 2px 7px;
  border-radius: 50px;
}

.sidebar-footer {
  margin-top: auto;
  padding: 16px 14px;
  border-top: 1px solid rgba(255,255,255,0.08);
}
.sidebar-footer a {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 12px;
  border-radius: var(--radius-sm);
  color: rgba(255,255,255,0.6);
  text-decoration: none;
  font-size: 13px;
  font-weight: 600;
  transition: all 0.2s;
}
.sidebar-footer a:hover { background: var(--sidebar-hover); color: #fff; }

/* ===== MAIN ===== */
.main {
  margin-right: 270px;
  flex: 1;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* ===== TOPBAR ===== */
.topbar {
  background: var(--white);
  padding: 16px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: var(--shadow);
  position: sticky;
  top: 0;
  z-index: 90;
  gap: 16px;
  flex-wrap: wrap;
}
.topbar-title h1 { font-size: 20px; font-weight: 900; color: var(--blue); }
.topbar-title p { font-size: 13px; color: var(--muted); margin-top: 2px; }
.topbar-actions { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
.btn { display: inline-flex; align-items: center; gap: 7px; padding: 10px 18px; border-radius: var(--radius-sm); font-family: 'Cairo', sans-serif; font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.2s; border: none; }
.btn-primary { background: var(--red); color: #fff; }
.btn-primary:hover { background: var(--red-dark); transform: translateY(-1px); }
.btn-secondary { background: var(--blue); color: #fff; }
.btn-secondary:hover { background: #0F2147; transform: translateY(-1px); }
.btn-outline { background: transparent; color: var(--text); border: 2px solid var(--border); }
.btn-outline:hover { border-color: var(--blue); color: var(--blue); }
.btn-success { background: var(--success); color: #fff; }
.btn-success:hover { background: #1E8449; }
.btn-danger { background: var(--danger); color: #fff; }
.btn-danger:hover { background: #C0392B; }
.btn-sm { padding: 7px 13px; font-size: 12px; }
.btn-icon { width: 36px; height: 36px; padding: 0; justify-content: center; }

/* ===== CONTENT AREA ===== */
.content { padding: 28px; flex: 1; }

/* ===== STATS ROW ===== */
.stats-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 28px; }
.stat-card {
  background: var(--card);
  border-radius: var(--radius);
  padding: 20px 22px;
  box-shadow: var(--shadow);
  display: flex;
  align-items: center;
  gap: 14px;
}
.stat-icon { width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0; }
.stat-icon.red { background: rgba(192,57,43,0.1); }
.stat-icon.blue { background: rgba(26,58,107,0.1); }
.stat-icon.gold { background: rgba(212,160,23,0.1); }
.stat-icon.green { background: rgba(39,174,96,0.1); }
.stat-num { font-size: 24px; font-weight: 900; color: var(--text); }
.stat-label { font-size: 12px; color: var(--muted); margin-top: 2px; }

/* ===== TABS ===== */
.tabs { display: flex; gap: 4px; background: var(--card); padding: 6px; border-radius: var(--radius); box-shadow: var(--shadow); margin-bottom: 24px; flex-wrap: wrap; }
.tab-btn {
  padding: 9px 18px;
  border-radius: var(--radius-sm);
  border: none;
  background: transparent;
  color: var(--muted);
  font-family: 'Cairo', sans-serif;
  font-size: 13px;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.2s;
  display: flex;
  align-items: center;
  gap: 7px;
}
.tab-btn:hover { background: var(--bg); color: var(--text); }
.tab-btn.active { background: var(--red); color: #fff; box-shadow: 0 3px 10px rgba(192,57,43,0.35); }

/* ===== IMAGE SECTIONS ===== */
.panel { display: none; }
.panel.active { display: block; }

.section-card {
  background: var(--card);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  margin-bottom: 24px;
  overflow: hidden;
}
.section-card-header {
  padding: 18px 22px;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  flex-wrap: wrap;
}
.section-card-header h3 { font-size: 16px; font-weight: 800; color: var(--blue); display: flex; align-items: center; gap: 8px; }
.section-card-body { padding: 22px; }

/* ===== IMAGE GRID ===== */
.img-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px; }
.img-item {
  border-radius: var(--radius-sm);
  overflow: hidden;
  position: relative;
  border: 2px solid var(--border);
  transition: all 0.25s;
  background: var(--bg);
}
.img-item:hover { border-color: var(--blue); box-shadow: var(--shadow-lg); }
.img-item.active-img { border-color: var(--success); }
.img-item.active-img::after {
  content: '✓ الصورة الحالية';
  position: absolute;
  top: 8px;
  right: 8px;
  background: var(--success);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  padding: 3px 9px;
  border-radius: 50px;
}
.img-item img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  display: block;
  transition: transform 0.3s;
}
.img-item:hover img { transform: scale(1.03); }
.img-item-info { padding: 10px 12px; }
.img-item-label { font-size: 12px; font-weight: 700; color: var(--text); margin-bottom: 4px; }
.img-item-url { font-size: 10px; color: var(--muted); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; direction: ltr; text-align: left; }
.img-item-actions { display: flex; gap: 6px; margin-top: 10px; }

/* ===== UPLOAD ZONE ===== */
.upload-zone {
  border: 2px dashed var(--border);
  border-radius: var(--radius);
  padding: 40px 20px;
  text-align: center;
  transition: all 0.25s;
  cursor: pointer;
  background: var(--bg);
}
.upload-zone:hover, .upload-zone.dragover { border-color: var(--blue); background: rgba(26,58,107,0.04); }
.upload-zone .upload-icon { font-size: 48px; margin-bottom: 12px; }
.upload-zone h4 { font-size: 16px; font-weight: 800; color: var(--text); margin-bottom: 6px; }
.upload-zone p { font-size: 13px; color: var(--muted); margin-bottom: 16px; }
.upload-zone input[type="file"] { display: none; }

/* ===== URL INPUT ===== */
.url-input-row {
  display: flex;
  gap: 10px;
  margin-bottom: 16px;
  flex-wrap: wrap;
}
.url-input-row input {
  flex: 1;
  min-width: 200px;
  padding: 11px 14px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-family: 'Cairo', sans-serif;
  font-size: 13px;
  color: var(--text);
  direction: ltr;
  transition: border-color 0.2s;
}
.url-input-row input:focus { outline: none; border-color: var(--blue); }
.url-input-row select {
  padding: 11px 14px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-family: 'Cairo', sans-serif;
  font-size: 13px;
  color: var(--text);
  background: #fff;
  cursor: pointer;
}
.url-input-row select:focus { outline: none; border-color: var(--blue); }

/* ===== PREVIEW STRIP ===== */
.preview-strip {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  margin-top: 14px;
}
.preview-chip {
  position: relative;
  border-radius: 8px;
  overflow: hidden;
  border: 2px solid var(--border);
  width: 90px;
  height: 70px;
}
.preview-chip img { width: 100%; height: 100%; object-fit: cover; display: block; }
.preview-chip .remove-chip {
  position: absolute;
  top: 2px;
  left: 2px;
  width: 20px;
  height: 20px;
  background: var(--danger);
  color: #fff;
  border: none;
  border-radius: 50%;
  font-size: 11px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Cairo', sans-serif;
}

/* ===== CURRENT VIEW ===== */
.current-view-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: 18px;
}
.current-img-card {
  background: var(--card);
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow);
  border: 2px solid var(--border);
  transition: all 0.25s;
}
.current-img-card:hover { border-color: var(--red); box-shadow: var(--shadow-lg); }
.current-img-card .img-wrap { height: 160px; overflow: hidden; position: relative; }
.current-img-card .img-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s; }
.current-img-card:hover .img-wrap img { transform: scale(1.04); }
.current-img-card .img-wrap .img-badge {
  position: absolute;
  top: 10px;
  right: 10px;
  background: rgba(26,58,107,0.85);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  padding: 3px 10px;
  border-radius: 50px;
}
.current-img-card .card-info { padding: 14px 16px; }
.current-img-card .card-info h4 { font-size: 14px; font-weight: 800; color: var(--text); margin-bottom: 6px; }
.current-img-card .card-info .loc { font-size: 11px; color: var(--muted); margin-bottom: 12px; display: flex; align-items: center; gap: 5px; }
.current-img-card .card-actions { display: flex; gap: 6px; }

/* ===== MODAL ===== */
.modal-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  z-index: 200;
  align-items: center;
  justify-content: center;
  padding: 20px;
}
.modal-overlay.open { display: flex; }
.modal {
  background: var(--white);
  border-radius: 16px;
  width: 100%;
  max-width: 640px;
  max-height: 90vh;
  overflow-y: auto;
  box-shadow: 0 20px 60px rgba(0,0,0,0.3);
  animation: slideUp 0.3s ease;
}
@@keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
.modal-header {
  padding: 20px 24px;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.modal-header h3 { font-size: 18px; font-weight: 800; color: var(--blue); }
.modal-close { background: var(--bg); border: none; width: 32px; height: 32px; border-radius: 50%; cursor: pointer; font-size: 16px; display: flex; align-items: center; justify-content: center; transition: all 0.2s; }
.modal-close:hover { background: var(--danger); color: #fff; }
.modal-body { padding: 24px; }
.modal-footer { padding: 16px 24px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 10px; }

/* ===== FORM ===== */
.form-group { margin-bottom: 18px; }
.form-label { font-size: 13px; font-weight: 700; color: var(--text); margin-bottom: 6px; display: block; }
.form-control {
  width: 100%;
  padding: 11px 14px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-family: 'Cairo', sans-serif;
  font-size: 13px;
  color: var(--text);
  transition: border-color 0.2s;
}
.form-control:focus { outline: none; border-color: var(--blue); }
.form-control.ltr { direction: ltr; text-align: left; }
.form-hint { font-size: 11px; color: var(--muted); margin-top: 5px; }

/* ===== IMG PREVIEW BOX ===== */
.img-preview-box {
  width: 100%;
  height: 200px;
  background: var(--bg);
  border-radius: var(--radius-sm);
  overflow: hidden;
  margin-top: 10px;
  border: 2px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
}
.img-preview-box img { width: 100%; height: 100%; object-fit: cover; display: none; }
.img-preview-box .placeholder { text-align: center; color: var(--muted); }
.img-preview-box .placeholder div { font-size: 40px; margin-bottom: 8px; }
.img-preview-box .placeholder p { font-size: 13px; }

/* ===== TOAST ===== */
.toast-container { position: fixed; bottom: 24px; left: 24px; z-index: 999; display: flex; flex-direction: column; gap: 10px; }
.toast {
  background: var(--sidebar);
  color: #fff;
  padding: 14px 18px;
  border-radius: var(--radius-sm);
  font-size: 13px;
  font-weight: 600;
  box-shadow: var(--shadow-lg);
  display: flex;
  align-items: center;
  gap: 10px;
  animation: toastIn 0.3s ease;
  min-width: 260px;
}
.toast.success { border-right: 4px solid var(--success); }
.toast.error { border-right: 4px solid var(--danger); }
.toast.info { border-right: 4px solid var(--blue-light); }
@@keyframes toastIn { from { transform: translateX(-20px); opacity: 0; } to { transform: translateX(0); opacity: 1; } }

/* ===== SEARCH BAR ===== */
.search-bar {
  position: relative;
  margin-bottom: 20px;
}
.search-bar input {
  width: 100%;
  padding: 12px 44px 12px 16px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-family: 'Cairo', sans-serif;
  font-size: 14px;
  background: var(--white);
  color: var(--text);
}
.search-bar input:focus { outline: none; border-color: var(--blue); }
.search-bar .search-icon { position: absolute; top: 50%; left: auto; right: 14px; transform: translateY(-50%); font-size: 16px; pointer-events: none; }

/* ===== MOBILE ===== */
.hamburger-admin { display: none; background: none; border: none; cursor: pointer; padding: 4px; }
.hamburger-admin span { display: block; width: 22px; height: 3px; background: var(--text); border-radius: 3px; margin: 4px 0; }

@@media (max-width: 900px) {
  .sidebar { transform: translateX(100%); }
  .sidebar.open { transform: translateX(0); }
  .main { margin-right: 0; }
  .hamburger-admin { display: block; }
  .content { padding: 16px; }
  .topbar { padding: 14px 16px; }
  .img-grid { grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); }
  .current-view-grid { grid-template-columns: 1fr 1fr; }
}
@@media (max-width: 500px) {
  .current-view-grid { grid-template-columns: 1fr; }
  .stats-row { grid-template-columns: 1fr 1fr; }
}
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <div class="icon">🚛</div>
    <div class="brand">
      <div class="brand-name">الأسطورة <em>رونق</em> قلب الخليج</div>
      <div class="brand-sub">لوحة إدارة الصور</div>
    </div>
  </div>

  <div class="sidebar-section">
    <div class="sidebar-section-title">إدارة الصور</div>
    <ul class="sidebar-nav">
      <li><a href="#" class="active" onclick="switchTab('current', this)"><span class="nav-icon">🖼️</span> الصور الحالية <span class="nav-badge">17</span></a></li>
      <li><a href="#" onclick="switchTab('hero', this)"><span class="nav-icon">🌟</span> صورة الخلفية الرئيسية</a></li>
      <li><a href="#" onclick="switchTab('services', this)"><span class="nav-icon">🛋️</span> صور الخدمات</a></li>
      <li><a href="#" onclick="switchTab('steps', this)"><span class="nav-icon">🔢</span> صور خطوات العمل</a></li>
      <li><a href="#" onclick="switchTab('gallery', this)"><span class="nav-icon">📸</span> معرض الأعمال</a></li>
    </ul>
  </div>

  <div class="sidebar-section">
    <div class="sidebar-section-title">أدوات</div>
    <ul class="sidebar-nav">
      <li><a href="#" onclick="switchTab('upload', this)"><span class="nav-icon">⬆️</span> رفع صور جديدة</a></li>
      <li><a href="#" onclick="switchTab('url', this)"><span class="nav-icon">🔗</span> إضافة صور برابط</a></li>
    </ul>
  </div>

  <div class="sidebar-footer">
    <a href="index" target="_blank">↗️ معاينة الموقع</a>
  </div>
</aside>

<!-- MAIN -->
<div class="main">

  <!-- TOPBAR -->
  <div class="topbar">
    <div style="display:flex;align-items:center;gap:12px">
      <button class="hamburger-admin" onclick="document.getElementById('sidebar').classList.toggle('open')">
        <span></span><span></span><span></span>
      </button>
      <div class="topbar-title">
        <h1 id="pageTitle">الصور الحالية في الموقع</h1>
        <p id="pageSubtitle">عرض وإدارة جميع صور الموقع</p>
      </div>
    </div>
    <div class="topbar-actions">
      <button class="btn btn-outline" onclick="resetAllSettings()">🔄 إعادة ضبط الأصلي</button>
      <button class="btn btn-outline" onclick="switchTab('url', null)">🔗 إضافة برابط</button>
      <button class="btn btn-primary" onclick="openUploadModal()">⬆️ رفع صورة جديدة</button>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="content">

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon red">🖼️</div>
        <div><div class="stat-num">17</div><div class="stat-label">إجمالي الصور</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon blue">🏠</div>
        <div><div class="stat-num">1</div><div class="stat-label">صورة الخلفية</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon gold">🛋️</div>
        <div><div class="stat-num">8</div><div class="stat-label">صور الخدمات</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">📸</div>
        <div><div class="stat-num">5</div><div class="stat-label">صور المعرض</div></div>
      </div>
    </div>

    <!-- TABS -->
    <div class="tabs">
      <button class="tab-btn active" onclick="switchTab('current', null)" id="tab-current">🖼️ الكل</button>
      <button class="tab-btn" onclick="switchTab('hero', null)" id="tab-hero">🌟 الخلفية</button>
      <button class="tab-btn" onclick="switchTab('services', null)" id="tab-services">🛋️ الخدمات</button>
      <button class="tab-btn" onclick="switchTab('steps', null)" id="tab-steps">🔢 الخطوات</button>
      <button class="tab-btn" onclick="switchTab('gallery', null)" id="tab-gallery">📸 المعرض</button>
      <button class="tab-btn" onclick="switchTab('upload', null)" id="tab-upload">⬆️ رفع صورة</button>
      <button class="tab-btn" onclick="switchTab('url', null)" id="tab-url">🔗 إضافة برابط</button>
    </div>

    <!-- ========== PANEL: CURRENT IMAGES ========== -->
    <div class="panel active" id="panel-current">
      <div class="search-bar">
        <span class="search-icon">🔍</span>
        <input type="text" placeholder="ابحث عن صورة..." oninput="filterImages(this.value)">
      </div>
      <div class="current-view-grid" id="currentGrid">
        <!-- Hero -->
        <div class="current-img-card" data-section="hero">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=600&q=80" alt="خلفية Hero">
            <div class="img-badge">🌟 الخلفية الرئيسية</div>
          </div>
          <div class="card-info">
            <h4>صورة خلفية Hero Section</h4>
            <div class="loc">📍 الصفحة الرئيسية — خلفية كاملة</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('hero', 'Hero Background', 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1200&q=80')">👁️ معاينة</button>
            </div>
          </div>
        </div>
        <!-- Service 1 -->
        <div class="current-img-card" data-section="services">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80" alt="فك وتركيب">
            <div class="img-badge">🛋️ خدمة 1</div>
          </div>
          <div class="card-info">
            <h4>نقل عفش مع الفك والتركيب</h4>
            <div class="loc">📍 قسم الخدمات — كرت 1</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-1', 'خدمة 1: فك وتركيب', 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Service 2 -->
        <div class="current-img-card" data-section="services">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80" alt="شاحنة نقل">
            <div class="img-badge">🛋️ خدمة 2</div>
          </div>
          <div class="card-info">
            <h4>نقل أثاث مع التحميل والتنزيل</h4>
            <div class="loc">📍 قسم الخدمات — كرت 2</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-2', 'خدمة 2: شاحنة', 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Service 3 -->
        <div class="current-img-card" data-section="services">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80" alt="نقل بالضمان">
            <div class="img-badge">🛋️ خدمة 3</div>
          </div>
          <div class="card-info">
            <h4>نقل عفش بالضمان</h4>
            <div class="loc">📍 قسم الخدمات — كرت 3</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-3', 'خدمة 3: ضمان', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Step 1 -->
        <div class="current-img-card" data-section="steps">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=400&q=80" alt="تواصل معنا">
            <div class="img-badge">🔢 خطوة 1</div>
          </div>
          <div class="card-info">
            <h4>الخطوة ١ — تواصل معنا</h4>
            <div class="loc">📍 قسم خطوات العمل</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('step-1', 'الخطوة ١: تواصل', 'https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Step 2 -->
        <div class="current-img-card" data-section="steps">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80" alt="تحديد حجم العفش">
            <div class="img-badge">🔢 خطوة 2</div>
          </div>
          <div class="card-info">
            <h4>الخطوة ٢ — تحديد حجم العفش</h4>
            <div class="loc">📍 قسم خطوات العمل</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('step-2', 'الخطوة ٢: تحديد الحجم', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Step 3 -->
        <div class="current-img-card" data-section="steps">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80" alt="المعاينة">
            <div class="img-badge">🔢 خطوة 3</div>
          </div>
          <div class="card-info">
            <h4>الخطوة ٣ — المعاينة والاتفاق</h4>
            <div class="loc">📍 قسم خطوات العمل</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('step-3', 'الخطوة ٣: معاينة', 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Step 4 -->
        <div class="current-img-card" data-section="steps">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80" alt="التغليف والفك">
            <div class="img-badge">🔢 خطوة 4</div>
          </div>
          <div class="card-info">
            <h4>الخطوة ٤ — التغليف والفك</h4>
            <div class="loc">📍 قسم خطوات العمل</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('step-4', 'الخطوة ٤: تغليف', 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Step 5 -->
        <div class="current-img-card" data-section="steps">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80" alt="التحميل والنقل">
            <div class="img-badge">🔢 خطوة 5</div>
          </div>
          <div class="card-info">
            <h4>الخطوة ٥ — التحميل والنقل</h4>
            <div class="loc">📍 قسم خطوات العمل</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('step-5', 'الخطوة ٥: نقل', 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Step 6 -->
        <div class="current-img-card" data-section="steps">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=400&q=80" alt="التنزيل والتركيب">
            <div class="img-badge">🔢 خطوة 6</div>
          </div>
          <div class="card-info">
            <h4>الخطوة ٦ — التنزيل والتركيب</h4>
            <div class="loc">📍 قسم خطوات العمل</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('step-6', 'الخطوة ٦: تركيب', 'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=400&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Gallery 1 -->
        <div class="current-img-card" data-section="gallery">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80" alt="معرض 1">
            <div class="img-badge">📸 معرض 1</div>
          </div>
          <div class="card-info">
            <h4>معرض — شاحنات النقل</h4>
            <div class="loc">📍 معرض الأعمال — صورة كبيرة</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('gallery-1', 'معرض 1: شاحنة', 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1200&q=80')">👁️</button>
            </div>
          </div>
        </div>
        <!-- Gallery 2 -->
        <div class="current-img-card" data-section="gallery">
          <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80" alt="معرض 2">
            <div class="img-badge">📸 معرض 2</div>
          </div>
          <div class="card-info">
            <h4>معرض — التغليف بالكراتين</h4>
            <div class="loc">📍 معرض الأعمال — صورة 2</div>
            <div class="card-actions">
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('gallery-2', 'معرض 2: تغليف', 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=500&q=80')">✏️ تغيير</button>
              <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=1000&q=80')">👁️</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: HERO ========== -->
    <div class="panel" id="panel-hero">
      <div class="section-card">
        <div class="section-card-header">
          <h3>🌟 صورة الخلفية الرئيسية (Hero)</h3>
          <button class="btn btn-primary" onclick="openChangeModal('hero', 'Hero Background', 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1400&q=80')">✏️ تغيير الصورة</button>
        </div>
        <div class="section-card-body">
          <p style="font-size:13px;color:var(--muted);margin-bottom:16px">هذه الصورة تظهر كخلفية لقسم Hero الرئيسي في الصفحة الأولى. الأبعاد الموصى بها: <strong>1920×1080</strong> أو أكبر.</p>
          <div style="border-radius:12px;overflow:hidden;height:280px;position:relative">
            <img id="heroPreview" src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1000&q=80" alt="Hero" style="width:100%;height:100%;object-fit:cover">
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(26,58,107,0.7),rgba(146,43,33,0.5));display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px;font-weight:700">معاينة الخلفية مع التدرج</div>
          </div>
          <div style="margin-top:16px;padding:14px;background:var(--bg);border-radius:8px">
            <p style="font-size:12px;color:var(--muted)">الرابط الحالي:</p>
            <p style="font-size:12px;direction:ltr;text-align:left;color:var(--blue);font-weight:600;word-break:break-all">https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1400&q=80</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: SERVICES ========== -->
    <div class="panel" id="panel-services">
      <div class="section-card">
        <div class="section-card-header">
          <h3>🛋️ صور كروت الخدمات (8 كروت)</h3>
        </div>
        <div class="section-card-body">
          <div class="img-grid" id="servicesGrid">
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 1 — فك وتركيب</div>
                <div class="img-item-url">unsplash.com/photo-1600880292...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-1','خدمة 1','https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80')">✏️ تغيير</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 2 — شاحنة نقل</div>
                <div class="img-item-url">unsplash.com/photo-1566576721...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-2','خدمة 2','https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80')">✏️ تغيير</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 3 — نقل بضمان</div>
                <div class="img-item-url">unsplash.com/photo-1558618666...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-3','خدمة 3','https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80')">✏️</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 4 — نقل آمن</div>
                <div class="img-item-url">unsplash.com/photo-1581578731...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-4','خدمة 4','https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80')">✏️</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 5 — أسعار مناسبة</div>
                <div class="img-item-url">unsplash.com/photo-1504307651...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-5','خدمة 5','https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=400&q=80')">✏️</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 6 — تغليف</div>
                <div class="img-item-url">unsplash.com/photo-1584622650...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-6','خدمة 6','https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&q=80')">✏️</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 7 — فك وتركيب غرف</div>
                <div class="img-item-url">unsplash.com/photo-1556909172...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-7','خدمة 7','https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=400&q=80')">✏️</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
            <div class="img-item active-img">
              <img src="https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=300&q=80" alt="">
              <div class="img-item-info">
                <div class="img-item-label">كرت 8 — نقل بين المدن</div>
                <div class="img-item-url">unsplash.com/photo-1464082354...</div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('service-8','خدمة 8','https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=400&q=80')">✏️</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=800&q=80')">👁️</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: STEPS ========== -->
    <div class="panel" id="panel-steps">
      <div class="section-card">
        <div class="section-card-header">
          <h3>🔢 صور خطوات العمل (6 خطوات)</h3>
        </div>
        <div class="section-card-body">
          <div class="img-grid">
            <div class="img-item active-img"><img src="https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">الخطوة ١ — تواصل معنا</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('step-1','الخطوة ١','https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=400&q=80')">✏️ تغيير</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=800&q=80')">👁️</button></div></div></div>
            <div class="img-item active-img"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">الخطوة ٢ — تحديد الحجم</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('step-2','الخطوة ٢','https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80')">✏️ تغيير</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80')">👁️</button></div></div></div>
            <div class="img-item active-img"><img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">الخطوة ٣ — المعاينة</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('step-3','الخطوة ٣','https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80')">✏️ تغيير</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80')">👁️</button></div></div></div>
            <div class="img-item active-img"><img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">الخطوة ٤ — التغليف والفك</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('step-4','الخطوة ٤','https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80')">✏️ تغيير</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80')">👁️</button></div></div></div>
            <div class="img-item active-img"><img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">الخطوة ٥ — التحميل والنقل</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('step-5','الخطوة ٥','https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80')">✏️ تغيير</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')">👁️</button></div></div></div>
            <div class="img-item active-img"><img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">الخطوة ٦ — التنزيل والتركيب</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('step-6','الخطوة ٦','https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=400&q=80')">✏️ تغيير</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80')">👁️</button></div></div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: GALLERY ========== -->
    <div class="panel" id="panel-gallery">
      <div class="section-card">
        <div class="section-card-header">
          <h3>📸 صور معرض الأعمال (5 صور)</h3>
          <button class="btn btn-success" onclick="openAddGalleryModal()">➕ إضافة صورة جديدة</button>
        </div>
        <div class="section-card-body">
          <div class="img-grid" id="galleryGrid">
            <div class="img-item active-img" id="gal-1"><img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">معرض 1 — شاحنة نقل (كبيرة)</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('gallery-1','معرض 1','https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')">✏️</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1200&q=80')">👁️</button><button class="btn btn-danger btn-sm" onclick="removeGallery('gal-1')">🗑️</button></div></div></div>
            <div class="img-item active-img" id="gal-2"><img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">معرض 2 — تغليف كراتين</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('gallery-2','معرض 2','https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=500&q=80')">✏️</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=1000&q=80')">👁️</button><button class="btn btn-danger btn-sm" onclick="removeGallery('gal-2')">🗑️</button></div></div></div>
            <div class="img-item active-img" id="gal-3"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">معرض 3 — نقل الأثاث</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('gallery-3','معرض 3','https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&q=80')">✏️</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1000&q=80')">👁️</button><button class="btn btn-danger btn-sm" onclick="removeGallery('gal-3')">🗑️</button></div></div></div>
            <div class="img-item active-img" id="gal-4"><img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">معرض 4 — فريق العمل</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('gallery-4','معرض 4','https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=500&q=80')">✏️</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1000&q=80')">👁️</button><button class="btn btn-danger btn-sm" onclick="removeGallery('gal-4')">🗑️</button></div></div></div>
            <div class="img-item active-img" id="gal-5"><img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">معرض 5 — فك وتركيب</div><div class="img-item-actions"><button class="btn btn-primary btn-sm" onclick="openChangeModal('gallery-5','معرض 5','https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=500&q=80')">✏️</button><button class="btn btn-outline btn-sm" onclick="previewImg('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=1000&q=80')">👁️</button><button class="btn btn-danger btn-sm" onclick="removeGallery('gal-5')">🗑️</button></div></div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: UPLOAD ========== -->
    <div class="panel" id="panel-upload">
      <div class="section-card">
        <div class="section-card-header">
          <h3>⬆️ رفع صور من جهازك</h3>
        </div>
        <div class="section-card-body">
          <div class="upload-zone" onclick="document.getElementById('fileInput').click()" id="uploadZone">
            <div class="upload-icon">📁</div>
            <h4>اسحب الصور هنا أو اضغط للاختيار</h4>
            <p>يدعم: JPG, PNG, WEBP — الحجم الأقصى: 5MB لكل صورة</p>
            <button class="btn btn-primary" type="button">اختر الصور</button>
            <input type="file" id="fileInput" multiple accept="image/*" onchange="handleFiles(this.files)">
          </div>
          <div id="uploadPreview" class="preview-strip" style="margin-top:16px"></div>

          <div style="margin-top:24px;padding:18px;background:var(--bg);border-radius:10px" id="uploadFormSection" style="display:none">
            <div class="form-group">
              <label class="form-label">تخصيص الصور لقسم معين</label>
              <select class="form-control" id="uploadTarget">
                <option value="">-- اختر القسم --</option>
                <option value="hero">الخلفية الرئيسية (Hero)</option>
                <option value="service-1">خدمة 1 — فك وتركيب</option>
                <option value="service-2">خدمة 2 — شاحنة نقل</option>
                <option value="service-3">خدمة 3 — نقل بضمان</option>
                <option value="service-4">خدمة 4 — نقل آمن</option>
                <option value="service-5">خدمة 5 — أسعار</option>
                <option value="service-6">خدمة 6 — تغليف</option>
                <option value="service-7">خدمة 7 — فك غرف</option>
                <option value="service-8">خدمة 8 — بين المدن</option>
                <option value="step-1">الخطوة ١ — تواصل</option>
                <option value="step-2">الخطوة ٢ — الحجم</option>
                <option value="step-3">الخطوة ٣ — معاينة</option>
                <option value="step-4">الخطوة ٤ — تغليف</option>
                <option value="step-5">الخطوة ٥ — نقل</option>
                <option value="step-6">الخطوة ٦ — تركيب</option>
                <option value="gallery">إضافة لمعرض الأعمال</option>
              </select>
            </div>
            <button class="btn btn-success" onclick="applyUpload()">✅ تطبيق الصور</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: URL ========== -->
    <div class="panel" id="panel-url">
      <div class="section-card">
        <div class="section-card-header">
          <h3>🔗 إضافة صورة برابط URL</h3>
        </div>
        <div class="section-card-body">
          <p style="font-size:13px;color:var(--muted);margin-bottom:20px">أدخل رابط الصورة من أي مصدر (Unsplash, Google Drive, موقعك...) واختر القسم الذي تريد تطبيقها فيه.</p>
          <div class="url-input-row">
            <input type="text" id="urlInput" placeholder="https://images.unsplash.com/photo-..." oninput="previewUrlInput(this.value)">
            <select id="urlTarget">
              <option value="">-- اختر القسم --</option>
              <option value="hero">الخلفية الرئيسية</option>
              <option value="service-1">خدمة 1</option>
              <option value="service-2">خدمة 2</option>
              <option value="service-3">خدمة 3</option>
              <option value="service-4">خدمة 4</option>
              <option value="service-5">خدمة 5</option>
              <option value="service-6">خدمة 6</option>
              <option value="service-7">خدمة 7</option>
              <option value="service-8">خدمة 8</option>
              <option value="step-1">الخطوة ١</option>
              <option value="step-2">الخطوة ٢</option>
              <option value="step-3">الخطوة ٣</option>
              <option value="step-4">الخطوة ٤</option>
              <option value="step-5">الخطوة ٥</option>
              <option value="step-6">الخطوة ٦</option>
              <option value="gallery">إضافة للمعرض</option>
            </select>
            <button class="btn btn-primary" onclick="applyUrl()">✅ تطبيق</button>
          </div>
          <div class="img-preview-box" id="urlPreviewBox">
            <div class="placeholder"><div>🖼️</div><p>ستظهر معاينة الصورة هنا</p></div>
            <img id="urlPreviewImg" src="" alt="" onerror="this.style.display='none';document.querySelector('#urlPreviewBox .placeholder').style.display='block'">
          </div>
          <div style="margin-top:20px">
            <p style="font-size:13px;font-weight:700;color:var(--text);margin-bottom:12px">💡 اقتراحات صور Unsplash لنقل العفش:</p>
            <div class="img-grid">
              <div class="img-item" onclick="setUrl('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')"><img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">شاحنة نقل كبيرة</div></div></div>
              <div class="img-item" onclick="setUrl('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80')"><img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">تغليف ونقل</div></div></div>
              <div class="img-item" onclick="setUrl('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80')"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">أثاث منزلي</div></div></div>
              <div class="img-item" onclick="setUrl('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80')"><img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">عامل نقل محترف</div></div></div>
              <div class="img-item" onclick="setUrl('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80')"><img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">تركيب مطبخ</div></div></div>
              <div class="img-item" onclick="setUrl('https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=800&q=80')"><img src="https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=300&q=80" alt=""><div class="img-item-info"><div class="img-item-label">طريق بين المدن</div></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /content -->
</div><!-- /main -->

<!-- ===== CHANGE IMAGE MODAL ===== -->
<div class="modal-overlay" id="changeModal">
  <div class="modal">
    <div class="modal-header">
      <h3>✏️ تغيير صورة — <span id="modalSectionName"></span></h3>
      <button class="modal-close" onclick="closeModal('changeModal')">✕</button>
    </div>
    <div class="modal-body">
      <div class="img-preview-box" style="margin-bottom:16px">
        <div class="placeholder" id="modalPlaceholder"><div>🖼️</div><p>الصورة الحالية</p></div>
        <img id="modalCurrentImg" src="" alt="" style="display:block">
      </div>
      <div class="form-group">
        <label class="form-label">الصورة الجديدة</label>
        <div style="display:flex; flex-direction:column; gap:12px;">
          <!-- File Upload Option -->
          <div class="upload-zone" onclick="document.getElementById('modalFileInput').click()" id="modalUploadZone" style="padding: 20px; border-style: dashed;">
            <div class="upload-icon" style="font-size: 32px;">📁</div>
            <h4 style="font-size: 14px;">اضغط لرفع صورة من جهازك</h4>
            <input type="file" id="modalFileInput" style="display:none" accept="image/*" onchange="handleModalFile(this.files[0])">
          </div>
          
          <div style="display:flex; align-items:center; gap:10px;">
            <div style="flex:1; height:1px; background:var(--border)"></div>
            <div style="font-size:12px; color:var(--muted)">أو استخدم رابط</div>
            <div style="flex:1; height:1px; background:var(--border)"></div>
          </div>

          <!-- URL Input Option -->
          <input type="text" class="form-control ltr" id="modalUrlInput" placeholder="https://images.example.com/photo.jpg" oninput="previewModalUrl(this.value)">
        </div>
        <p class="form-hint">يمكنك رفع صورة مباشرة أو استخدام روابط Unsplash</p>
      </div>
      <div class="img-preview-box" id="modalNewPreview" style="display:none">
        <img id="modalNewImg" src="" alt="" style="display:block">
      </div>
      <div style="margin-top:14px">
        <p style="font-size:12px;font-weight:700;color:var(--muted);margin-bottom:10px">أو اختر من المقترحات:</p>
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=800&q=80',this)" alt="">
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('changeModal')">إلغاء</button>
      <button class="btn btn-success" onclick="applyChange()">✅ تطبيق الصورة الجديدة</button>
    </div>
  </div>
</div>

<!-- ===== IMAGE PREVIEW MODAL ===== -->
<div class="modal-overlay" id="previewModal" onclick="closeModal('previewModal')">
  <div style="max-width:90vw;max-height:90vh;border-radius:12px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.5)">
    <img id="previewModalImg" src="" alt="" style="width:100%;max-height:90vh;object-fit:contain;display:block">
  </div>
</div>

<!-- TOAST CONTAINER -->
<div class="toast-container" id="toastContainer"></div>

<script>
// ===== STATE & STORAGE =====
let currentModalSection = '';
let currentModalFile = null;
let imageDB = JSON.parse(localStorage.getItem('adminImagesDB') || '{}');

// Load stored images on startup
window.addEventListener('DOMContentLoaded', () => {
  loadFromStorage();
  showToast('👋 مرحباً بك في لوحة إدارة الصور!', 'info');
});

function saveToStorage() {
  try {
    localStorage.setItem('adminImagesDB', JSON.stringify(imageDB));
  } catch (e) {
    console.error("LocalStorage quota exceeded", e);
    showToast('⚠️ ذاكرة المتصفح ممتلئة! يرجى استخدام روابط URL للصور الكبيرة بدلاً من الرفع المباشر', 'error');
  }
}

function loadFromStorage() {
  const savedData = localStorage.getItem('adminImagesDB');
  if (savedData) {
    imageDB = JSON.parse(savedData);
    Object.entries(imageDB).forEach(([section, data]) => {
      updateUIPreviews(section, data);
    });
  }
}

function resetAllSettings() {
  if (confirm('هل أنت متأكد من حذف جميع التغييرات والعودة للصور الأصلية؟')) {
    localStorage.removeItem('adminImagesDB');
    location.reload();
  }
}

// ===== NAVIGATION =====
function switchTab(tab, linkEl) {
  // Hide all panels
  document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.sidebar-nav a').forEach(a => a.classList.remove('active'));

  // Show target panel
  const panel = document.getElementById('panel-' + tab);
  if (panel) panel.classList.add('active');

  // Activate tab button
  const tabBtn = document.getElementById('tab-' + tab);
  if (tabBtn) tabBtn.classList.add('active');

  // Activate sidebar link
  if (linkEl) linkEl.classList.add('active');

  // Update topbar title
  const titles = {
    current: ['الصور الحالية في الموقع', 'عرض وإدارة جميع صور الموقع'],
    hero: ['صورة الخلفية الرئيسية', 'تغيير خلفية Hero Section'],
    services: ['صور كروت الخدمات', 'إدارة صور الخدمات الثمانية'],
    steps: ['صور خطوات العمل', 'إدارة صور الخطوات الست'],
    gallery: ['معرض الأعمال', 'إضافة وحذف وتغيير صور المعرض'],
    upload: ['رفع صور جديدة', 'ارفع صورك من جهازك'],
    url: ['إضافة صورة برابط', 'أضف صورة من الإنترنت'],
  };
  const t = titles[tab] || ['لوحة الإدارة', ''];
  document.getElementById('pageTitle').textContent = t[0];
  document.getElementById('pageSubtitle').textContent = t[1];
}

// ===== MODAL: CHANGE IMAGE =====
function openChangeModal(section, name, currentUrl) {
  currentModalSection = section;
  currentModalFile = null;
  document.getElementById('modalSectionName').textContent = name;
  document.getElementById('modalCurrentImg').src = currentUrl;
  document.getElementById('modalCurrentImg').style.display = 'block';
  document.getElementById('modalPlaceholder').style.display = 'none';
  document.getElementById('modalUrlInput').value = '';
  document.getElementById('modalFileInput').value = '';
  document.getElementById('modalNewPreview').style.display = 'none';
  document.querySelectorAll('.modal-body img[onclick]').forEach(i => i.style.border = '2px solid transparent');
  document.getElementById('changeModal').classList.add('open');
}

function handleModalFile(file) {
  if (!file || !file.type.startsWith('image/')) {
    showToast('⚠️ يرجى اختيار ملف صورة صحيح', 'error');
    return;
  }
  
  const reader = new FileReader();
  reader.onload = e => {
    currentModalFile = e.target.result;
    document.getElementById('modalUrlInput').value = ''; // Clear URL if file is chosen
    const box = document.getElementById('modalNewPreview');
    const img = document.getElementById('modalNewImg');
    img.src = e.target.result;
    box.style.display = 'block';
    showToast('✅ تم تجهيز الصورة المرفوعة', 'info');
  };
  reader.readAsDataURL(file);
}

function previewModalUrl(url) {
  const box = document.getElementById('modalNewPreview');
  const img = document.getElementById('modalNewImg');
  if (url && url.startsWith('http')) {
    currentModalFile = null; // Clear file if URL is typed
    img.src = url;
    box.style.display = 'block';
  } else {
    box.style.display = 'none';
  }
}

function selectSuggestion(url, el) {
  document.getElementById('modalUrlInput').value = url;
  currentModalFile = null; // Clear file if suggestion is chosen
  previewModalUrl(url);
  document.querySelectorAll('.modal-body img[onclick]').forEach(i => i.style.border = '2px solid transparent');
  el.style.border = '2px solid #27AE60';
}

function applyChange() {
  const url = document.getElementById('modalUrlInput').value.trim();
  const finalImage = currentModalFile || url;
  
  if (!finalImage) { showToast('⚠️ يرجى اختيار صورة أو إدخال رابط أولاً', 'error'); return; }
  
  imageDB[currentModalSection] = finalImage;
  
  // Update UI previews
  updateUIPreviews(currentModalSection, finalImage);
  
  // Save to browser memory
  saveToStorage();
  
  showToast(`✅ تم تحديث وحفظ صورة "${document.getElementById('modalSectionName').textContent}" بنجاح`, 'success');
  closeModal('changeModal');
  generateCode();
}

function updateUIPreviews(section, data) {
  // Update all containers that have a change button targeting this section
  const containers = document.querySelectorAll('.current-img-card, .img-item');
  
  containers.forEach(container => {
    const btn = container.querySelector('button[onclick*="openChangeModal"]');
    if (btn && btn.getAttribute('onclick').includes(`'${section}'`)) {
      const img = container.querySelector('img');
      if (img) img.src = data;
    }
  });
  
  // Specific UI elements that don't follow the pattern
  if (section === 'hero') {
    const heroImg = document.getElementById('heroPreview');
    if (heroImg) heroImg.src = data;
  }
}

function updateUIPreviews_old(section, data) {
  // Update all images that match this section or specific ID
  const cards = document.querySelectorAll(`.current-img-card`);
  cards.forEach(card => {
    const btn = card.querySelector('button[onclick*="openChangeModal"]');
    if (btn && btn.getAttribute('onclick').includes(`'${section}'`)) {
      card.querySelector('img').src = data;
    }
  });
  
  // Also update sections like Hero or Service grids if they are specific
  if (section === 'hero') {
    const heroImg = document.getElementById('heroPreview');
    if (heroImg) heroImg.src = data;
  }
}

// ===== MODAL: ADD GALLERY =====
function openAddGalleryModal() {
  document.getElementById('urlInput').value = '';
  document.getElementById('urlTarget').value = 'gallery';
  switchTab('url', null);
}

// ===== PREVIEW IMAGE =====
function previewImg(url) {
  document.getElementById('previewModalImg').src = url;
  document.getElementById('previewModal').classList.add('open');
}

function closeModal(id) {
  document.getElementById(id).classList.remove('open');
}

// ===== URL PANEL =====
function previewUrlInput(url) {
  const box = document.getElementById('urlPreviewBox');
  const img = document.getElementById('urlPreviewImg');
  const ph = box.querySelector('.placeholder');
  if (url && url.startsWith('http')) {
    img.src = url;
    img.style.display = 'block';
    ph.style.display = 'none';
  } else {
    img.style.display = 'none';
    ph.style.display = 'block';
  }
}

function setUrl(url) {
  document.getElementById('urlInput').value = url;
  previewUrlInput(url);
  showToast('✅ تم اختيار الصورة — اضغط تطبيق لتحديدها', 'info');
}

function applyUrl() {
  const url = document.getElementById('urlInput').value.trim();
  const target = document.getElementById('urlTarget').value;
  if (!url) { showToast('⚠️ أدخل رابط الصورة', 'error'); return; }
  if (!target) { showToast('⚠️ اختر القسم المستهدف', 'error'); return; }
  
  imageDB[target] = url;
  updateUIPreviews(target, url);
  saveToStorage();
  
  showToast(`✅ تم تطبيق وحفظ الصورة على ${target} بنجاح`, 'success');
  generateCode();
}

// ===== UPLOAD =====
function handleFiles(files) {
  const preview = document.getElementById('uploadPreview');
  const formSection = document.getElementById('uploadFormSection');
  preview.innerHTML = '';
  Array.from(files).forEach(file => {
    if (!file.type.startsWith('image/')) return;
    const reader = new FileReader();
    reader.onload = e => {
      const chip = document.createElement('div');
      chip.className = 'preview-chip';
      chip.innerHTML = `<img src="${e.target.result}"><button class="remove-chip" onclick="this.parentElement.remove()">✕</button>`;
      preview.appendChild(chip);
    };
    reader.readAsDataURL(file);
  });
  formSection.style.display = 'block';
  showToast(`📁 تم تحميل ${files.length} صورة — اختر القسم وطبّق`, 'info');
}

function applyUpload() {
  const target = document.getElementById('uploadTarget').value;
  const preview = document.getElementById('uploadPreview');
  const firstImg = preview.querySelector('img');
  
  if (!target) { showToast('⚠️ اختر القسم أولاً', 'error'); return; }
  if (!firstImg) { showToast('⚠️ يرجى رفع صورة أولاً', 'error'); return; }
  
  const imageData = firstImg.src;
  imageDB[target] = imageData;
  updateUIPreviews(target, imageData);
  saveToStorage();
  
  showToast(`✅ تم حفظ وتطبيق الصورة المرفوعة على ${target}`, 'success');
  generateCode();
}

// ===== GALLERY REMOVE =====
function removeGallery(id) {
  if (!confirm('هل تريد حذف هذه الصورة من المعرض؟')) return;
  const el = document.getElementById(id);
  if (el) { el.style.opacity = '0'; setTimeout(() => el.remove(), 300); }
  showToast('🗑️ تم حذف الصورة من المعرض', 'info');
}

// ===== SEARCH =====
function filterImages(q) {
  const cards = document.querySelectorAll('.current-img-card');
  cards.forEach(c => {
    const text = c.querySelector('h4')?.textContent || '';
    c.style.display = text.includes(q) ? 'block' : 'none';
  });
}

// ===== DRAG & DROP =====
const uploadZone = document.getElementById('uploadZone');
if (uploadZone) {
  uploadZone.addEventListener('dragover', e => { e.preventDefault(); uploadZone.classList.add('dragover'); });
  uploadZone.addEventListener('dragleave', () => uploadZone.classList.remove('dragover'));
  uploadZone.addEventListener('drop', e => {
    e.preventDefault();
    uploadZone.classList.remove('dragover');
    handleFiles(e.dataTransfer.files);
  });
}

// ===== GENERATE CODE =====
function generateCode() {
  // In a real CMS this would write to files
  // Here we just show a summary
  const count = Object.keys(imageDB).length;
  if (count > 0) {
    const lines = Object.entries(imageDB).map(([k, v]) => `${k}: ${v}`).join('\n');
    console.log('Image changes:\n' + lines);
  }
}

// ===== TOAST =====
function showToast(msg, type = 'success') {
  const c = document.getElementById('toastContainer');
  const t = document.createElement('div');
  t.className = `toast ${type}`;
  t.textContent = msg;
  c.appendChild(t);
  setTimeout(() => { t.style.opacity = '0'; t.style.transform = 'translateX(-20px)'; t.style.transition = '.3s'; setTimeout(() => t.remove(), 300); }, 3500);
}

// Close modal on overlay click
document.getElementById('changeModal').addEventListener('click', function(e) {
  if (e.target === this) closeModal('changeModal');
});

// Init (handled by DOMContentLoaded)
</script>
<script src="image-loader.js"></script></body>
</html>


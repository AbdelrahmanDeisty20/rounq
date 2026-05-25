<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>لوحة إدارة الصور | الأسطورة رونق</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
@php
    $sectionLabels = [
        'hero' => 'الخلفية الرئيسية',
        'video-testimonial' => 'رأي عميل مصور بالفيديو',
        'service-1' => 'خدمة 1 — فك وتركيب',

        'service-2' => 'خدمة 2 — شاحنة نقل',
        'service-3' => 'خدمة 3 — نقل بضمان',
        'service-4' => 'خدمة 4 — نقل آمن',
        'service-5' => 'خدمة 5 — أسعار',
        'service-6' => 'خدمة 6 — تغليف',
        'service-7' => 'خدمة 7 — فك غرف',
        'service-8' => 'خدمة 8 — بين المدن',
        'step-1' => 'الخطوة ١ — تواصل',
        'step-2' => 'الخطوة ٢ — الحجم',
        'step-3' => 'الخطوة ٣ — معاينة',
        'step-4' => 'الخطوة ٤ — تغليف',
        'step-5' => 'الخطوة ٥ — نقل',
        'step-6' => 'الخطوة ٦ — تركيب',
        'gallery-packing' => 'معرض — التغليف بالكراتين',
        'gallery-trucks' => 'معرض — شاحنات النقل',
    ];
@endphp

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar" onclick="event.stopPropagation()">
  <div class="sidebar-logo">
    <div class="icon">🚛</div>
    <div class="brand">
      <div class="brand-name">الأسطورة <em>رونق</em> قلب الخليج</div>
      <div class="brand-sub">لوحة إدارة الصور</div>
    </div>
    <button class="sidebar-close-btn" onclick="document.getElementById('sidebar').classList.remove('open')">✕</button>
  </div>

  @if(session('success'))
    <div style="margin: 10px; padding: 10px; background: #d4edda; color: #155724; border-radius: 6px; font-size: 13px;">
        {{ session('success') }}
    </div>
  @endif

  @if($errors->any())
    <div style="margin: 10px; padding: 10px; background: #f8d7da; color: #721c24; border-radius: 6px; font-size: 13px;">
        @foreach($errors->all() as $error)
            <div>• {{ $error }}</div>
        @endforeach
    </div>
  @endif

  <div class="sidebar-section">
    <div class="sidebar-section-title">إدارة الصور</div>
    <ul class="sidebar-nav">
      <li><a href="{{ route('admin.images.index') }}" class="active" onclick="switchTab('current', this)" id="nav-current"><span class="nav-icon">🖼️</span> الصور الحالية <span class="nav-badge">{{ $stats['total'] }}</span></a></li>
      @role('admin')
      <li><a href="{{ route('admin.users.index') }}"><span class="nav-icon">👥</span> إدارة المستخدمين</a></li>
      <li><a href="{{ route('admin.settings.index') }}"><span class="nav-icon">📞</span> أرقام التواصل</a></li>
      @endrole
      <li><a href="#" onclick="switchTab('hero', this)" id="nav-hero"><span class="nav-icon">🌟</span> صورة الخلفية الرئيسية</a></li>
      <li><a href="#" onclick="switchTab('video-testimonial', this)" id="nav-video-testimonial"><span class="nav-icon">🎥</span> الآراء المصورة (فيديو)</a></li>
      <li><a href="#" onclick="switchTab('services', this)" id="nav-services"><span class="nav-icon">🛋️</span> صور الخدمات</a></li>
      <li><a href="#" onclick="switchTab('steps', this)" id="nav-steps"><span class="nav-icon">🔢</span> صور خطوات العمل</a></li>
      <li><a href="#" onclick="switchTab('gallery', this)" id="nav-gallery"><span class="nav-icon">📸</span> معرض الأعمال</a></li>
    </ul>
  </div>
  <div class="sidebar-section">
    <div class="sidebar-section-title">أدوات إضافية</div>
    <ul class="sidebar-nav">
      @can('add images')
      <li><a href="#" onclick="switchTab('upload', this)" id="nav-upload"><span class="nav-icon">⬆️</span> رفع صور جديدة</a></li>
      <li><a href="#" onclick="switchTab('url', this)" id="nav-url"><span class="nav-icon">🔗</span> إضافة صور برابط</a></li>
      @endcan
    </ul>
  </div>

  <div class="sidebar-section">
    <div class="sidebar-section-title">الحساب</div>
    <ul class="sidebar-nav">
      <li>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="nav-icon">🚪</span> تسجيل الخروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
      </li>
    </ul>
  </div>

  <div class="sidebar-footer">
    <a href="{{ url('/') }}" target="_blank">↗️ معاينة الموقع</a>
  </div>
</aside>

<!-- MAIN -->
<div class="main">

  <!-- TOPBAR -->
  <div class="topbar">
    <div style="display:flex;align-items:center;gap:12px">
      <button class="hamburger-admin" onclick="event.stopPropagation(); document.getElementById('sidebar').classList.toggle('open')">
        <span></span><span></span><span></span>
      </button>
      <div class="topbar-title">
        <h1 id="pageTitle">الصور الحالية في الموقع</h1>
        <p id="pageSubtitle">عرض وإدارة جميع صور الموقع</p>
      </div>
    </div>
    <div class="topbar-actions">
      <button class="btn btn-outline" onclick="location.reload()">🔄 تحديث الصفحة</button>
      @can('add images')
      <button class="btn btn-primary" onclick="switchTab('upload', null)">⬆️ رفع صورة جديدة</button>
      @endcan
    </div>
  </div>

  <!-- CONTENT -->
  <div class="content">

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon red">🖼️</div>
        <div><div class="stat-num">{{ $stats['total'] }}</div><div class="stat-label">إجمالي الصور</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon blue">🏠</div>
        <div><div class="stat-num">{{ $stats['hero'] }}</div><div class="stat-label">صورة الخلفية</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon gold">🛋️</div>
        <div><div class="stat-num">{{ $stats['services'] }}</div><div class="stat-label">صور الخدمات</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">📸</div>
        <div><div class="stat-num">{{ $stats['gallery'] }}</div><div class="stat-label">صور المعرض</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon red" style="background:rgba(231,76,60,0.1);color:#e74c3c">🎥</div>
        <div><div class="stat-num">{{ $stats['videos'] ?? 0 }}</div><div class="stat-label">الآراء المصورة</div></div>
      </div>
    </div>

    <!-- TABS -->
    <div class="tabs">
      <button class="tab-btn active" onclick="switchTab('current', null)" id="tab-current">🖼️ الكل</button>
      <button class="tab-btn" onclick="switchTab('hero', null)" id="tab-hero">🌟 الخلفية</button>
      <button class="tab-btn" onclick="switchTab('video-testimonial', null)" id="tab-video-testimonial">🎥 الآراء المصورة</button>
      <button class="tab-btn" onclick="switchTab('services', null)" id="tab-services">🛋️ الخدمات</button>
      <button class="tab-btn" onclick="switchTab('steps', null)" id="tab-steps">🔢 الخطوات</button>
      <button class="tab-btn" onclick="switchTab('gallery', null)" id="tab-gallery">📸 المعرض</button>
      @can('add images')
      <button class="tab-btn" onclick="switchTab('upload', null)" id="tab-upload">⬆️ رفع صورة</button>
      <button class="tab-btn" onclick="switchTab('url', null)" id="tab-url">🔗 إضافة برابط</button>
      @endcan
    </div>

    <!-- ========== PANEL: CURRENT IMAGES ========== -->
    <div class="panel active" id="panel-current">
      <div class="search-bar">
        <span class="search-icon">🔍</span>
        <input type="text" placeholder="ابحث عن صورة..." oninput="filterImages(this.value)">
      </div>
      <div class="current-view-grid" id="currentGrid">
        @foreach($images as $image)
        <div class="current-img-card" data-section="{{ $image->section }}">
          <div class="img-wrap">
            @if(strtolower($image->section) === 'video-testimonial' || str_ends_with(strtolower($image->url), '.mp4') || str_ends_with(strtolower($image->url), '.webm'))
              <video src="{{ $image->url }}#t=0.5" preload="metadata" muted playsinline style="width:100%;height:100%;object-fit:cover"></video>
            @else
              <img src="{{ $image->url }}" alt="{{ $image->title }}">
            @endif
            <div class="img-badge">{{ strtoupper($image->section) }}</div>
          </div>
          <div class="card-info">
            <h4>{{ $sectionLabels[strtolower($image->section)] ?? $image->title ?? 'صورة موقع' }}</h4>
            <div class="loc">🔑 ID: <span style="color:var(--red); font-weight:bold">{{ $image->section }}</span></div>
            <div class="loc">📍 {{ $image->location_hint ?? 'موقع غير محدد' }}</div>
            <div class="card-actions">
              @can('edit images')
              <button class="btn btn-primary btn-sm" onclick="openChangeModal('{{ $image->id }}', '{{ $image->title }}', '{{ $image->url }}')">✏️ تغيير</button>
              @endcan
              <button class="btn btn-outline btn-sm" onclick="previewImg('{{ $image->url }}')">👁️ معاينة</button>
              @can('delete images')
              <button class="btn btn-danger btn-sm" onclick="deleteImage('{{ $image->id }}')">🗑️ حذف</button>
              @endcan
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- ========== PANEL: HERO ========== -->
    <div class="panel" id="panel-hero">
      @php $hero = $images->where('section', 'hero')->first(); @endphp
      <div class="section-card">
        <div class="section-card-header">
          <h3>🌟 صورة الخلفية الرئيسية (Hero)</h3>
          @if($hero)
          <button class="btn btn-primary" onclick="openChangeModal('{{ $hero->id }}', 'خلفية Hero', '{{ $hero->url }}')">✏️ تغيير الصورة</button>
          @endif
        </div>
        <div class="section-card-body">
          <p style="font-size:13px;color:var(--muted);margin-bottom:16px">هذه الصورة تظهر كخلفية لقسم Hero الرئيسي في الصفحة الأولى.</p>
          <div style="border-radius:12px;overflow:hidden;height:280px;position:relative">
            <img id="heroPreview" src="{{ $hero->url ?? '' }}" alt="Hero" style="width:100%;height:100%;object-fit:cover">
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(26,58,107,0.7),rgba(146,43,33,0.5));display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px;font-weight:700">معاينة الخلفية مع التدرج</div>
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: VIDEO TESTIMONIAL ========== -->
    <div class="panel" id="panel-video-testimonial">
      @php $videoTests = $images->where('section', 'video-testimonial'); @endphp
      <div class="section-card">
        <div class="section-card-header">
          <h3>🎥 قائمة الآراء المصورة بالفيديو (Testimonials)</h3>
          <button class="btn btn-primary" onclick="switchTab('upload', null)">⬆️ رفع فيديو جديد</button>
        </div>
        <div class="section-card-body">
          <p style="font-size:13px;color:var(--muted);margin-bottom:20px">تظهر هذه الفيديوهات في الصفحة الرئيسية كآراء وتقييمات مصورة للعملاء.</p>
          @if($videoTests->count() > 0)
            <div class="img-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
              @foreach($videoTests as $video)
                <div class="img-item active-img" style="height: auto; min-height: 250px;">
                  <video src="{{ $video->url }}#t=0.5" preload="metadata" muted playsinline style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;"></video>
                  <div class="img-item-info">
                    <div class="img-item-label">{{ $video->title ?? 'رأي عميل مصور' }}</div>
                    <div class="img-item-actions" style="margin-top: 10px;">
                      <button class="btn btn-primary btn-sm" onclick="openChangeModal('{{ $video->id }}','{{ $video->title ?? 'رأي عميل مصور' }}','{{ $video->url }}')">✏️ تغيير</button>
                      <button class="btn btn-outline btn-sm" onclick="previewImg('{{ $video->url }}')">👁️ معاينة</button>
                      <button class="btn btn-danger btn-sm" onclick="deleteImage('{{ $video->id }}')">🗑️ حذف</button>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <div style="padding:40px;text-align:center;border:2px dashed #ddd;border-radius:12px;color:var(--muted)">لا توجد فيديوهات حالياً، يرجى رفع فيديو من تبويب "رفع صورة" واختيار قسم "رأي عميل مصور بالفيديو".</div>
          @endif
        </div>
      </div>
    </div>


    <!-- ========== PANEL: SERVICES ========== -->
    <div class="panel" id="panel-services">
      <div class="section-card">
        <div class="section-card-header">
          <h3>🛋️ صور كروت الخدمات</h3>
        </div>
        <div class="section-card-body">
          <div class="img-grid" id="servicesGrid">
            @foreach($images->filter(fn($img) => str_starts_with($img->section, 'service-')) as $image)
            <div class="img-item active-img">
              <img src="{{ $image->url }}" alt="">
              <div class="img-item-info">
                <div class="img-item-label">
                  {{ $sectionLabels[strtolower($image->section)] ?? $image->title ?? 'صورة موقع' }}
                </div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('{{ $image->id }}','{{ $image->title }}','{{ $image->url }}')">✏️ تغيير</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('{{ $image->url }}')">👁️ معاينة</button>
                  <button class="btn btn-danger btn-sm" onclick="deleteImage('{{ $image->id }}')">🗑️ حذف</button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: STEPS ========== -->
    <div class="panel" id="panel-steps">
      <div class="section-card">
        <div class="section-card-header">
          <h3>🔢 صور خطوات العمل</h3>
        </div>
        <div class="section-card-body">
          <div class="img-grid">
            @foreach($images->filter(fn($img) => str_starts_with($img->section, 'step-')) as $image)
            <div class="img-item active-img">
              <img src="{{ $image->url }}" alt="">
              <div class="img-item-info">
                <div class="img-item-label">
                  {{ $sectionLabels[strtolower($image->section)] ?? $image->title ?? 'صورة موقع' }}
                </div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('{{ $image->id }}','{{ $image->title }}','{{ $image->url }}')">✏️ تغيير</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('{{ $image->url }}')">👁️ معاينة</button>
                  <button class="btn btn-danger btn-sm" onclick="deleteImage('{{ $image->id }}')">🗑️ حذف</button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <!-- ========== PANEL: GALLERY ========== -->
    <div class="panel" id="panel-gallery">
      <div class="section-card">
        <div class="section-card-header">
          <h3>📸 معرض الأعمال (خانات ثابتة)</h3>
        </div>
        <div class="section-card-body">
          <p style="font-size:13px;color:var(--muted);margin-bottom:20px">يتم تبديل الصور في هذه الخانات الثابتة لضمان أفضل تنسيق للموقع.</p>
          <div class="img-grid">
            @php
              $gallerySlots = [
                'gallery-trucks' => 'معرض — شاحنات النقل',
                'gallery-packing' => 'معرض — التغليف بالكراتين',
              ];
            @endphp

            @foreach($gallerySlots as $slotSec => $slotLabel)
              @php $image = $images->filter(fn($img) => strtolower($img->section) == $slotSec)->first(); @endphp
              <div class="img-item {{ $image ? 'active-img' : 'placeholder-item' }}" style="height:280px">
                @if($image)
                  <img src="{{ $image->url }}" alt="">
                  <div class="img-item-info">
                    <div class="img-item-label">{{ $slotLabel }}</div>
                    <div class="img-item-actions">
                      <button class="btn btn-primary btn-sm" onclick="openChangeModal('{{ $image->id }}','{{ $slotLabel }}','{{ $image->url }}')">✏️ تغيير</button>
                      <button class="btn btn-outline btn-sm" onclick="previewImg('{{ $image->url }}')">👁️ معاينة</button>
                      <button class="btn btn-danger btn-sm" onclick="deleteImage('{{ $image->id }}')">🗑️ حذف</button>
                    </div>
                  </div>
                @else
                  <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;color:var(--muted);gap:10px;cursor:pointer;background:#f9f9f9;border-radius:12px;border:2px dashed #ddd" onclick="switchTab('upload', null)">
                    <span style="font-size:30px">+</span>
                    <span style="font-size:12px">أضف صورة {{ $slotLabel }}</span>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
        <!-- Old Gallery Hidden Loop (to avoid breaking anything for now) -->
        <div style="display:none">
            @foreach($images->filter(fn($img) => str_starts_with($img->section, 'gallery')) as $image)
            <div class="img-item active-img" id="gal-{{ $image->id }}">
              <img src="{{ $image->url }}" alt="">
              <div class="img-item-info">
                <div class="img-item-label">
                  @php
                    $labels = [
                        'hero' => 'الخلفية الرئيسية',
                        'service-1' => 'خدمة 1 — فك وتركيب',
                        'service-2' => 'خدمة 2 — شاحنة نقل',
                        'service-3' => 'خدمة 3 — نقل بضمان',
                        'service-4' => 'خدمة 4 — نقل آمن',
                        'service-5' => 'خدمة 5 — أسعار',
                        'service-6' => 'خدمة 6 — تغليف',
                        'service-7' => 'خدمة 7 — فك غرف',
                        'service-8' => 'خدمة 8 — بين المدن',
                        'step-1' => 'الخطوة ١ — تواصل',
                        'step-2' => 'الخطوة ٢ — الحجم',
                        'step-3' => 'الخطوة ٣ — معاينة',
                        'step-4' => 'الخطوة ٤ — تغليف',
                        'step-5' => 'الخطوة ٥ — نقل',
                        'step-6' => 'الخطوة ٦ — تركيب',
                        'gallery-packing' => 'معرض — التغليف بالكراتين',
                        'gallery-trucks' => 'معرض — شاحنات النقل',
                        'gallery' => 'معرض الأعمال',
                    ];
                  @endphp
                  {{ $labels[$image->section] ?? $image->title ?? 'صورة موقع' }}
                </div>
                <div class="img-item-actions">
                  <button class="btn btn-primary btn-sm" onclick="openChangeModal('{{ $image->id }}','{{ $image->title }}','{{ $image->url }}')">✏️</button>
                  <button class="btn btn-outline btn-sm" onclick="previewImg('{{ $image->url }}')">👁️</button>
                  <button class="btn btn-danger btn-sm" onclick="deleteImage('{{ $image->id }}')">🗑️</button>
                </div>
              </div>
            </div>
            @endforeach
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
          <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload-zone" onclick="document.getElementById('fileInputMain').click()" id="uploadZone">
              <div class="upload-icon">📁</div>
              <h4>اضغط للاختيار</h4>
              <p>يدعم: JPG, PNG, WEBP, MP4, WEBM</p>
              <input type="file" id="fileInputMain" name="image" accept="image/*,video/*" style="display:none" onchange="previewFileMain(this)">
            </div>
            <div id="uploadPreviewMain" class="img-preview-box" style="display:none; margin-top:16px">
                <img id="uploadPreviewImgMain" src="" alt="" style="display:block">
            </div>
            <div class="form-group" style="margin-top:20px">
              <label class="form-label">تخصيص لقسم معين</label>
              <select name="section" required class="form-control">
                <option value="">-- اختر القسم --</option>
                <option value="hero">الخلفية الرئيسية (Hero)</option>
                <option value="video-testimonial">رأي عميل مصور بالفيديو</option>
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
                <option value="gallery-packing">معرض — التغليف بالكراتين</option>
                <option value="gallery-trucks">معرض — شاحنات النقل</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success" style="width:100%;margin-top:10px">✅ رفع الصورة الآن</button>
          </form>
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
          <form action="{{ route('admin.images.store') }}" method="POST">
            @csrf
            <input type="hidden" name="is_url" value="1">
            <div class="url-input-row">
              <input type="text" name="url" id="urlInputMain" placeholder="https://images.unsplash.com/photo-..." required class="form-control" oninput="previewUrlMain(this.value)">
              <select name="section" required class="form-control">
                <option value="">-- اختر القسم --</option>
                <option value="hero">الخلفية الرئيسية (Hero)</option>
                <option value="video-testimonial">رأي عميل مصور بالفيديو</option>
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
                <option value="gallery-packing">معرض — التغليف بالكراتين</option>
                <option value="gallery-trucks">معرض — شاحنات النقل</option>
              </select>
              <button type="submit" class="btn btn-primary">✅ تطبيق</button>
            </div>
          </form>
          
          <div class="img-preview-box" id="urlPreviewBoxMain" style="display:none; margin-top:20px">
            <img id="urlPreviewImgMain" src="" alt="" style="display:block">
          </div>

          <div style="margin-top:20px">
            <p style="font-size:13px;font-weight:700;color:var(--text);margin-bottom:12px">💡 اقتراحات صور Unsplash لنقل العفش:</p>
            <div class="img-grid">
              <div class="img-item" onclick="setUrlMain('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80')">
                <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=300&q=80" alt="">
                <div class="img-item-info"><div class="img-item-label">شاحنة نقل كبيرة</div></div>
              </div>
              <div class="img-item" onclick="setUrlMain('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80')">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&q=80" alt="">
                <div class="img-item-info"><div class="img-item-label">تغليف ونقل</div></div>
              </div>
              <div class="img-item" onclick="setUrlMain('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80')">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&q=80" alt="">
                <div class="img-item-info"><div class="img-item-label">أثاث منزلي</div></div>
              </div>
              <div class="img-item" onclick="setUrlMain('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80')">
                <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=300&q=80" alt="">
                <div class="img-item-info"><div class="img-item-label">عامل نقل محترف</div></div>
              </div>
              <div class="img-item" onclick="setUrlMain('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80')">
                <img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=300&q=80" alt="">
                <div class="img-item-info"><div class="img-item-label">تركيب مطبخ</div></div>
              </div>
              <div class="img-item" onclick="setUrlMain('https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=800&q=80')">
                <img src="https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=300&q=80" alt="">
                <div class="img-item-info"><div class="img-item-label">طريق بين المدن</div></div>
              </div>
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
        <img id="modalCurrentImg" src="" alt="" style="display:block">
      </div>
      <div class="form-group">
        <label class="form-label">الصورة الجديدة</label>
        <div style="display:flex; flex-direction:column; gap:12px;">
          <div class="upload-zone" onclick="document.getElementById('modalFileInput').click()" style="padding: 20px; border-style: dashed;">
            <div class="upload-icon" style="font-size: 32px;">📁</div>
            <h4 style="font-size: 14px;">اضغط لرفع صورة من جهازك</h4>
            <input type="file" id="modalFileInput" style="display:none" accept="image/*,video/*" onchange="handleModalFile(this.files[0])">
          </div>
          <div style="display:flex; align-items:center; gap:10px;">
            <div style="flex:1; height:1px; background:var(--border)"></div>
            <div style="font-size:12px; color:var(--muted)">أو استخدم رابط</div>
            <div style="flex:1; height:1px; background:var(--border)"></div>
          </div>
          <input type="text" class="form-control ltr" id="modalUrlInput" placeholder="https://images.example.com/photo.jpg" oninput="previewModalUrl(this.value)">
        </div>
      </div>
      <div class="img-preview-box" id="modalNewPreview" style="display:none">
        <img id="modalNewImg" src="" alt="" style="display:block">
      </div>
      <div style="margin-top:14px">
        <p style="font-size:12px;font-weight:700;color:var(--muted);margin-bottom:10px">أو اختر من المقترحات:</p>
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=100&q=70',this)" alt="">
          <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80',this)" alt="">
          <img src="https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=100&q=70" style="width:80px;height:60px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:.2s" onclick="selectSuggestion('https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=800&q=80',this)" alt="">
        </div>
      </div>
      <div class="form-group" style="margin-top:15px">
        <label class="form-label">نقل إلى قسم آخر (اختياري)</label>
        <select id="modalSectionSelect" class="form-control">
          <option value="">-- ابقَ في نفس القسم --</option>
          <option value="hero">الخلفية الرئيسية (Hero)</option>
          <option value="video-testimonial">رأي عميل مصور بالفيديو</option>
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
          <option value="gallery-packing">معرض — التغليف بالكراتين</option>
          <option value="gallery-trucks">معرض — شاحنات النقل</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('changeModal')">إلغاء</button>
      <button class="btn btn-success" onclick="applyChange()">✅ تطبيق الصورة الجديدة</button>
    </div>
  </div>
</div>

<!-- ===== PREVIEW MODAL ===== -->
<div class="modal-overlay" id="previewModal" onclick="closeModal('previewModal')">
  <div class="modal modal-lg" onclick="event.stopPropagation()">
    <img id="fullPreviewImg" src="" alt="" style="width:100%; border-radius:12px;">
  </div>
</div>

<!-- TOAST -->
<div id="toast" class="toast"></div>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>

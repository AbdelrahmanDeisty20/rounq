<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="الأسطورة رونق قلب الخليج - من القصيم الى كل مدن المملكة مع خدمات الفك والتركيب والتغليف والتحميل والتنزيل. من القصيم الى جميع مدن المملكة بضمان وأسعار مناسبة.">
<meta name="keywords" content="القصيم, من القصيم الى كل مدن المملكة, القصيم الرياض, بالضمان">
<title>الأسطورة رونق قلب الخليج | من القصيم الى كل مدن المملكة</title>

<!-- Schema: Local Business -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "MovingCompany",
  "name": "الأسطورة رونق قلب الخليج",
  "description": "من القصيم إلى جميع مدن المملكة",
  "telephone": "{{ $settings['phone'] ?? '+966579796006' }}",
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "القصيم",
    "addressCountry": "SA"
  },
  "areaServed": "المملكة العربية السعودية",
  "priceRange": "$$"
}
</script>

<!-- Schema: FAQ -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "ما هي مناطق الخدمة؟",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "نخدم القصيم وجميع مدن المملكة العربية السعودية بما فيها الرياض وجدة والدمام ومكة والمدينة وحائل والطائف."
      }
    },
    {
      "@@type": "Question",
      "name": "هل تقدمون ضمان؟",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "نعم، نقدم ضمان كامل على سلامة الأثاث مع تغليف احترافي."
      }
    }
  ]
}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@@300;400;600;700;900&family=Tajawal:wght@@300;400;500;700;900&display=swap" rel="stylesheet">

<style>
:root {
  --red: #C0392B;
  --red-dark: #922B21;
  --red-light: #E74C3C;
  --blue: #1A3A6B;
  --blue-mid: #2980B9;
  --blue-light: #3498DB;
  --gold: #D4A017;
  --gold-light: #F1C40F;
  --white: #FFFFFF;
  --off-white: #F8F9FA;
  --gray: #6C757D;
  --dark: #1A1A2E;
  --text: #2C2C2C;
  --border: #E0E0E0;
  --shadow: 0 4px 20px rgba(0,0,0,0.12);
  --shadow-lg: 0 8px 40px rgba(0,0,0,0.18);
  --radius: 12px;
  --radius-sm: 8px;
  --transition: all 0.3s ease;
}

* { margin: 0; padding: 0; box-sizing: border-box; }

html { scroll-behavior: smooth; }

body {
  font-family: 'Cairo', 'Tajawal', sans-serif;
  direction: rtl;
  color: var(--text);
  background: var(--white);
  line-height: 1.7;
  overflow-x: hidden;
}

/* ===== HEADER ===== */
.top-bar {
  background: var(--blue);
  color: var(--white);
  padding: 8px 0;
  font-size: 13px;
}
.top-bar .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 8px;
}
.top-bar a { color: var(--gold-light); text-decoration: none; font-weight: 600; }
.top-bar .contact-info { display: flex; gap: 20px; align-items: center; }
.top-bar .contact-info span { display: flex; align-items: center; gap: 6px; }

header {
  background: var(--white);
  box-shadow: 0 2px 20px rgba(0,0,0,0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}
.header-inner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 0;
  gap: 20px;
}
.logo {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
}
.logo-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, var(--red), var(--red-dark));
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  box-shadow: 0 4px 15px rgba(192,57,43,0.4);
  border: 2px solid var(--gold);
  flex-shrink: 0;
}
.logo-text .brand-name {
  font-size: 18px;
  font-weight: 900;
  color: var(--blue);
  line-height: 1.2;
}
.logo-text .brand-name span { color: var(--red); }
.logo-text .brand-sub {
  font-size: 11px;
  color: var(--gray);
  font-weight: 500;
}

nav ul {
  display: flex;
  list-style: none;
  gap: 4px;
  align-items: center;
}
nav ul li a {
  text-decoration: none;
  color: var(--text);
  font-weight: 600;
  font-size: 14px;
  padding: 8px 14px;
  border-radius: var(--radius-sm);
  transition: var(--transition);
}
nav ul li a:hover { background: var(--off-white); color: var(--red); }

.header-cta {
  display: flex;
  gap: 10px;
  align-items: center;
}
.btn-call {
  background: var(--red);
  color: var(--white);
  padding: 10px 18px;
  border-radius: var(--radius-sm);
  text-decoration: none;
  font-weight: 700;
  font-size: 13px;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: var(--transition);
  white-space: nowrap;
}
.btn-call:hover { background: var(--red-dark); transform: translateY(-1px); }
.btn-whatsapp {
  background: #25D366;
  color: var(--white);
  padding: 10px 18px;
  border-radius: var(--radius-sm);
  text-decoration: none;
  font-weight: 700;
  font-size: 13px;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: var(--transition);
  white-space: nowrap;
}
.btn-whatsapp:hover { background: #1DA851; transform: translateY(-1px); }

.hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 5px; }
.hamburger span { width: 25px; height: 3px; background: var(--blue); border-radius: 3px; transition: var(--transition); }

/* ===== HERO ===== */
.hero {
  background: linear-gradient(135deg, rgba(26,58,107,0.92) 0%, rgba(26,26,46,0.88) 60%, rgba(146,43,33,0.85) 100%),
              url('https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1400&q=80') center/cover no-repeat;
  color: var(--white);
  padding: 80px 0;
  position: relative;
  overflow: hidden;
  min-height: 90vh;
  display: flex;
  align-items: center;
}
.hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.hero::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  right: 0;
  height: 80px;
  background: var(--white);
  clip-path: polygon(0 100%, 100% 100%, 100% 0);
}
.hero-content {
  position: relative;
  z-index: 2;
  max-width: 700px;
}
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(212,160,23,0.2);
  border: 1px solid var(--gold);
  color: var(--gold-light);
  padding: 6px 16px;
  border-radius: 50px;
  font-size: 13px;
  font-weight: 700;
  margin-bottom: 24px;
}
.hero h1 {
  font-size: clamp(32px, 5vw, 52px);
  font-weight: 900;
  line-height: 1.25;
  margin-bottom: 20px;
  text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}
.hero h1 span { color: var(--gold-light); }
.hero p {
  font-size: 18px;
  opacity: 0.9;
  margin-bottom: 36px;
  line-height: 1.8;
}
.hero-btns {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
}
.btn-primary {
  background: var(--red);
  color: var(--white);
  padding: 16px 32px;
  border-radius: var(--radius);
  text-decoration: none;
  font-weight: 700;
  font-size: 16px;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: var(--transition);
  box-shadow: 0 6px 20px rgba(192,57,43,0.5);
}
.btn-primary:hover { background: var(--red-dark); transform: translateY(-3px); box-shadow: 0 10px 30px rgba(192,57,43,0.5); }
.btn-secondary {
  background: #25D366;
  color: var(--white);
  padding: 16px 32px;
  border-radius: var(--radius);
  text-decoration: none;
  font-weight: 700;
  font-size: 16px;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: var(--transition);
  box-shadow: 0 6px 20px rgba(37,211,102,0.4);
}
.btn-secondary:hover { background: #1DA851; transform: translateY(-3px); }
.hero-stats {
  display: flex;
  gap: 32px;
  margin-top: 50px;
  flex-wrap: wrap;
}
.hero-stats .stat { text-align: center; }
.hero-stats .stat .num { font-size: 32px; font-weight: 900; color: var(--gold-light); }
.hero-stats .stat .label { font-size: 12px; opacity: 0.8; margin-top: 2px; }

/* ===== CONTAINER ===== */
.container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

/* ===== SECTIONS ===== */
section { padding: 80px 0; }
.section-header { text-align: center; margin-bottom: 60px; }
.section-tag {
  display: inline-block;
  background: linear-gradient(135deg, var(--red), var(--red-dark));
  color: var(--white);
  padding: 5px 18px;
  border-radius: 50px;
  font-size: 13px;
  font-weight: 700;
  margin-bottom: 14px;
}
.section-header h2 {
  font-size: clamp(26px, 4vw, 40px);
  font-weight: 900;
  color: var(--blue);
  margin-bottom: 14px;
}
.section-header p { font-size: 16px; color: var(--gray); max-width: 600px; margin: 0 auto; }
.divider {
  width: 70px;
  height: 4px;
  background: linear-gradient(90deg, var(--red), var(--gold));
  margin: 16px auto 0;
  border-radius: 2px;
}

/* ===== SERVICES ===== */
.services { background: var(--off-white); }
.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 24px;
}
.service-card {
  background: var(--white);
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow);
  transition: var(--transition);
  position: relative;
}
.service-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); }
.service-card-img {
  height: 180px;
  overflow: hidden;
  position: relative;
}
.service-card-img::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent 40%, rgba(26,58,107,0.55));
}
.service-card-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.4s ease;
}
.service-card:hover .service-card-img img { transform: scale(1.06); }
.service-icon {
  width: 56px;
  height: 56px;
  background: linear-gradient(135deg, var(--red), var(--red-dark));
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 26px;
  margin: -28px auto 14px;
  position: relative;
  z-index: 2;
  box-shadow: 0 4px 14px rgba(192,57,43,0.45);
  border: 3px solid var(--white);
}
.service-card h3 { font-size: 16px; font-weight: 700; color: var(--blue); margin-bottom: 10px; text-align: center; padding: 0 18px; }
.service-card p { font-size: 13px; color: var(--gray); line-height: 1.7; text-align: center; padding: 0 18px 22px; }

/* ===== SEO LINKS ===== */
.seo-links { background: var(--white); }
.seo-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
}
.cities-cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 20px;
}
.city-card {
  background: var(--white);
  border-radius: var(--radius);
  padding: 28px 20px 22px;
  text-align: center;
  box-shadow: var(--shadow);
  text-decoration: none;
  border: 2px solid transparent;
  transition: var(--transition);
  display: block;
  position: relative;
  overflow: hidden;
}
.city-card::before {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--red), var(--blue-mid));
  transform: scaleX(0);
  transition: var(--transition);
  transform-origin: right;
}
.city-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); border-color: rgba(192,57,43,0.2); }
.city-card:hover::before { transform: scaleX(1); }
.city-card-flag { font-size: 36px; margin-bottom: 10px; }
.city-card-name { font-size: 18px; font-weight: 900; color: var(--blue); margin-bottom: 12px; }
.city-card-links { display: flex; gap: 6px; justify-content: center; flex-wrap: wrap; }
.city-card-links span {
  background: var(--off-white);
  color: var(--gray);
  font-size: 11px;
  font-weight: 700;
  padding: 3px 10px;
  border-radius: 50px;
  border: 1px solid var(--border);
  transition: var(--transition);
}
.city-card:hover .city-card-links span { background: var(--red); color: var(--white); border-color: var(--red); }

/* ===== WHY US ===== */
.why-us { background: linear-gradient(135deg, var(--blue) 0%, var(--dark) 100%); color: var(--white); }
.why-us .section-header h2 { color: var(--white); }
.why-us .section-header p { color: rgba(255,255,255,0.8); }
.why-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 24px;
}
.why-card {
  background: rgba(255,255,255,0.07);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius);
  padding: 28px 20px;
  text-align: center;
  transition: var(--transition);
  backdrop-filter: blur(10px);
}
.why-card:hover { background: rgba(255,255,255,0.12); transform: translateY(-5px); border-color: var(--gold); }
.why-icon { font-size: 40px; margin-bottom: 16px; }
.why-card h4 { font-size: 16px; font-weight: 700; color: var(--gold-light); margin-bottom: 8px; }
.why-card p { font-size: 13px; color: rgba(255,255,255,0.75); }

/* ===== STEPS ===== */
.steps-wrap {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 24px;
  position: relative;
}
.step-card {
  text-align: center;
  background: var(--white);
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow);
  transition: var(--transition);
}
.step-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.step-img-wrap {
  position: relative;
  height: 180px;
  overflow: hidden;
}
.step-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.4s ease;
}
.step-card:hover .step-img-wrap img { transform: scale(1.07); }
.step-num {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 44px;
  height: 44px;
  background: linear-gradient(135deg, var(--red), var(--red-dark));
  color: var(--white);
  font-size: 18px;
  font-weight: 900;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 3px 12px rgba(192,57,43,0.5);
  border: 2px solid var(--gold);
  z-index: 2;
}
.step-card h4 { font-size: 15px; font-weight: 700; color: var(--blue); margin: 14px 12px 6px; }
.step-card p { font-size: 13px; color: var(--gray); padding: 0 12px 16px; line-height: 1.6; }

/* ===== GALLERY ===== */
.gallery { background: var(--off-white); }
.gallery-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(2, 240px);
  gap: 16px;
}
.gallery-item {
  border-radius: var(--radius);
  overflow: hidden;
  position: relative;
  cursor: pointer;
}
.gallery-item:first-child { grid-column: span 2; }
.gallery-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.5s ease;
}
.gallery-item:hover img { transform: scale(1.06); }
.gallery-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(26,58,107,0.85) 0%, transparent 100%);
  padding: 24px 16px 14px;
  transform: translateY(100%);
  transition: transform 0.35s ease;
}
.gallery-item:hover .gallery-overlay { transform: translateY(0); }
.gallery-overlay span {
  color: var(--white);
  font-weight: 700;
  font-size: 14px;
}

/* ===== REVIEWS ===== */
.reviews-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 24px;
}
.review-card {
  background: var(--white);
  border-radius: var(--radius);
  padding: 28px 24px;
  box-shadow: var(--shadow);
  border-right: 5px solid var(--red);
  transition: var(--transition);
  position: relative;
}
.review-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.review-card::before {
  content: '"';
  position: absolute;
  top: 10px;
  left: 20px;
  font-size: 80px;
  color: rgba(192,57,43,0.08);
  font-family: serif;
  line-height: 1;
}
.review-stars { color: var(--gold); font-size: 18px; margin-bottom: 12px; }
.review-text { font-size: 15px; color: var(--text); margin-bottom: 18px; line-height: 1.7; }
.reviewer { display: flex; align-items: center; gap: 12px; }
.reviewer-avatar {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  font-weight: 700;
  color: var(--white);
  flex-shrink: 0;
}
.reviewer-info .name { font-weight: 700; font-size: 15px; color: var(--blue); }
.reviewer-info .city { font-size: 12px; color: var(--gray); }

/* ===== CTA ===== */
.cta-section {
  background: linear-gradient(135deg, var(--red) 0%, var(--red-dark) 50%, #7B241C 100%);
  color: var(--white);
  text-align: center;
  padding: 80px 0;
  position: relative;
  overflow: hidden;
}
.cta-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='20' cy='20' r='3'/%3E%3C/g%3E%3C/svg%3E");
}
.cta-section h2 { font-size: clamp(26px, 4vw, 42px); font-weight: 900; margin-bottom: 16px; position: relative; }
.cta-section p { font-size: 18px; opacity: 0.9; margin-bottom: 40px; position: relative; max-width: 600px; margin-left: auto; margin-right: auto; }
.cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; position: relative; }
.btn-white {
  background: var(--white);
  color: var(--red);
  padding: 16px 36px;
  border-radius: var(--radius);
  text-decoration: none;
  font-weight: 700;
  font-size: 16px;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: var(--transition);
  box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}
.btn-white:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,0,0,0.3); }
.btn-wh-green {
  background: #25D366;
  color: var(--white);
  padding: 16px 36px;
  border-radius: var(--radius);
  text-decoration: none;
  font-weight: 700;
  font-size: 16px;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: var(--transition);
  box-shadow: 0 4px 20px rgba(37,211,102,0.4);
}
.btn-wh-green:hover { background: #1DA851; transform: translateY(-3px); }

/* ===== FOOTER ===== */
footer {
  background: var(--dark);
  color: rgba(255,255,255,0.85);
  padding: 60px 0 0;
}
.footer-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 40px;
  padding-bottom: 40px;
}
.footer-brand .logo-text .brand-name { color: var(--white); font-size: 20px; }
.footer-brand .brand-desc { font-size: 14px; color: rgba(255,255,255,0.65); margin: 16px 0 24px; line-height: 1.8; }
.footer-contact a {
  display: flex;
  align-items: center;
  gap: 10px;
  color: var(--gold-light);
  text-decoration: none;
  font-weight: 700;
  font-size: 16px;
  margin-bottom: 12px;
  transition: var(--transition);
}
.footer-contact a:hover { color: var(--white); }
.footer-col h4 {
  font-size: 16px;
  font-weight: 800;
  color: var(--white);
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 2px solid rgba(212,160,23,0.4);
}
.footer-col ul { list-style: none; }
.footer-col ul li { margin-bottom: 10px; }
.footer-col ul li a {
  text-decoration: none;
  color: rgba(255,255,255,0.65);
  font-size: 13px;
  transition: var(--transition);
  display: flex;
  align-items: center;
  gap: 6px;
}
.footer-col ul li a::before { content: '←'; font-size: 11px; color: var(--gold); }
.footer-col ul li a:hover { color: var(--gold-light); transform: translateX(-4px); }
.footer-bottom {
  border-top: 1px solid rgba(255,255,255,0.1);
  padding: 20px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 10px;
}
.footer-bottom p { font-size: 13px; color: rgba(255,255,255,0.5); }
.footer-bottom strong { color: var(--gold-light); }

/* ===== FLOATING BUTTONS ===== */
.float-wa {
  position: fixed;
  bottom: 30px;
  left: 30px;
  width: 60px;
  height: 60px;
  background: #25D366;
  color: var(--white);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  text-decoration: none;
  box-shadow: 0 4px 20px rgba(37,211,102,0.6);
  z-index: 999;
  animation: pulse 2s infinite;
  transition: var(--transition);
}
.float-wa:hover { transform: scale(1.1); }
.float-call {
  position: fixed;
  bottom: 100px;
  left: 30px;
  width: 60px;
  height: 60px;
  background: var(--red);
  color: var(--white);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 26px;
  text-decoration: none;
  box-shadow: 0 4px 20px rgba(192,57,43,0.5);
  z-index: 999;
  transition: var(--transition);
}
.float-call:hover { transform: scale(1.1); background: var(--red-dark); }

@@keyframes pulse {
  0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.6); }
  50% { box-shadow: 0 4px 40px rgba(37,211,102,0.9), 0 0 0 10px rgba(37,211,102,0.15); }
}

/* ===== FAQ ===== */
.faq { background: var(--off-white); }
.faq-wrap { max-width: 800px; margin: 0 auto; }
.faq-item {
  background: var(--white);
  border-radius: var(--radius);
  margin-bottom: 12px;
  box-shadow: var(--shadow);
  overflow: hidden;
}
.faq-q {
  padding: 20px 24px;
  font-weight: 700;
  font-size: 16px;
  color: var(--blue);
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: var(--transition);
  user-select: none;
}
.faq-q:hover { background: var(--off-white); }
.faq-q .arrow { transition: var(--transition); font-size: 12px; }
.faq-item.open .faq-q .arrow { transform: rotate(90deg); }
.faq-a {
  padding: 0 24px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.4s ease, padding 0.3s ease;
  font-size: 15px;
  color: var(--gray);
  line-height: 1.8;
}
.faq-item.open .faq-a { max-height: 300px; padding: 0 24px 20px; }

/* ===== MOBILE ===== */
@@media (max-width: 900px) {
  nav { display: none; position: absolute; top: 100%; right: 0; left: 0; background: var(--white); box-shadow: var(--shadow); padding: 20px; z-index: 100; }
  nav.open { display: block; }
  nav ul { flex-direction: column; gap: 0; }
  nav ul li a { padding: 12px 16px; border-radius: 0; border-bottom: 1px solid var(--border); }
  .hamburger { display: flex; }
  .header-cta .btn-call span, .header-cta .btn-whatsapp span { display: none; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
}

@@media (max-width: 600px) {
  .hero { padding: 60px 0 100px; min-height: auto; }
  .hero-stats { gap: 20px; }
  .hero-stats .stat .num { font-size: 24px; }
  .gallery-grid { grid-template-columns: 1fr 1fr; grid-template-rows: auto; }
  .gallery-item:first-child { grid-column: span 2; }
  .gallery-item { height: 180px; }
  .footer-grid { grid-template-columns: 1fr; }
  .footer-bottom { flex-direction: column; text-align: center; }
  .cta-btns { flex-direction: column; align-items: center; }
  .hero-btns { flex-direction: column; }
  .btn-primary, .btn-secondary { justify-content: center; }
  section { padding: 60px 0; }
  .steps-wrap { grid-template-columns: repeat(2, 1fr); }
  .service-card-img { height: 140px; }
}

/* ===== ANIMATIONS ===== */
.fade-up {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}
.fade-up.visible { opacity: 1; transform: translateY(0); }

.fade-up:nth-child(2) { transition-delay: 0.1s; }
.fade-up:nth-child(3) { transition-delay: 0.2s; }
.fade-up:nth-child(4) { transition-delay: 0.3s; }
.fade-up:nth-child(5) { transition-delay: 0.4s; }
.fade-up:nth-child(6) { transition-delay: 0.5s; }
.fade-up:nth-child(7) { transition-delay: 0.6s; }
.fade-up:nth-child(8) { transition-delay: 0.7s; }

/* ===== MOBILE NAV OVERLAY ===== */
.nav-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.5);
  z-index: 99;
}
.nav-overlay.open { display: block; }

/* ===== HERO ===== */
.hero {
  background: linear-gradient(135deg, rgba(26,58,107,0.92) 0%, rgba(26,26,46,0.88) 60%, rgba(146,43,33,0.85) 100%),
              url('{{ $images['hero'][0]->url ?? 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1400&q=80' }}') center/cover no-repeat;
  color: var(--white);
  padding: 80px 0;
  position: relative;
  overflow: hidden;
  min-height: 90vh;
  display: flex;
  align-items: center;
}
</style>
</head>
<body>

<!-- TOP BAR -->
<div class="top-bar">
  <div class="container">
    <div>🏠 {{ $settings['address'] ?? 'القصيم، المملكة العربية السعودية' }}</div>
    <div class="contact-info">
      <span>📞 <a href="tel:{{ $settings['phone'] ?? '0579796006' }}">{{ $settings['phone'] ?? '0579796006' }}</a></span>
      <span>💬 <a href="https://wa.me/{{ $settings['whatsapp'] ?? '966579796006' }}">واتساب مباشر</a></span>
      <span>⏰ متاحون 24/7</span>
    </div>
  </div>
</div>

<!-- HEADER -->
<header>
  <div class="container">
    <div class="header-inner">
      <a href="/" class="logo">
        <div class="logo-icon">🚛</div>
        <div class="logo-text">
          <div class="brand-name">الأسطورة <span>رونق</span> قلب الخليج</div>
          <div class="brand-sub">نقل عفش احترافي من القصيم الى جميع مدن المملكة</div>
        </div>
      </a>
      <nav id="mainNav">
        <ul>
          <li><a href="/">الرئيسية</a></li>
          <li><a href="#about">من نحن</a></li>
          <li><a href="#services">خدماتنا</a></li>
          <li><a href="#cities">مناطق النقل</a></li>
          <li><a href="#reviews">آراء العملاء</a></li>
          <li><a href="#contact">اتصل بنا</a></li>
        </ul>
      </nav>
      <div class="header-cta">
        <a href="tel:{{ $settings['phone'] ?? '0579796006' }}" class="btn-call">📞 <span>اتصل الآن</span></a>
        <a href="https://wa.me/{{ $settings['whatsapp'] ?? '966579796006' }}" class="btn-whatsapp">💬 <span>واتساب</span></a>
        <div class="hamburger" onclick="toggleNav()">
          <span></span><span></span><span></span>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="nav-overlay" id="navOverlay" onclick="toggleNav()"></div>

<!-- HERO -->
<section class="hero">
  <div class="container">
    <div class="hero-content">
      <div class="hero-badge">⭐ الأسطورة رونق قلب الخليج</div>
      <h1>من القصيم الى كل مدن المملكة</h1>
      <p>نقدم خدمات احترافية من القصيم إلى جميع مدن المملكة، مع فريق متخصص في الفك والتركيب والتغليف والتحميل والتنزيل، وضمان الأمان للأثاث.</p>
      <div class="hero-btns">
        <a href="tel:{{ $settings['phone'] ?? '0579796006' }}" class="btn-primary">📞 اطلب الخدمة الآن</a>
        <a href="https://wa.me/{{ $settings['whatsapp'] ?? '966579796006' }}" class="btn-secondary">💬 تواصل واتساب</a>
      </div>
      <div class="hero-stats">
        <div class="stat"><div class="num">+500</div><div class="label">عميل سعيد</div></div>
        <div class="stat"><div class="num">+10</div><div class="label">سنوات خبرة</div></div>
        <div class="stat"><div class="num">+20</div><div class="label">مدينة نخدمها</div></div>
        <div class="stat"><div class="num">100%</div><div class="label">نقل بضمان</div></div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">خدماتنا</span>
      <h2>خدمات شاملة ومتكاملة</h2>
      <p>نقدم جميع خدمات النقل تحت سقف واحد بأسعار مناسبة وأعلى معايير الجودة</p>
      <div class="divider"></div>
    </div>
    <div class="services-grid">
      @foreach($images['services'] as $index => $image)
      <div class="service-card fade-up">
        <div class="service-card-img">
          <img src="{{ $image->url }}" alt="{{ $image->title }}" loading="lazy">
        </div>
        <div class="service-icon">
            @php $icons = ['🛋️', '🚛', '🛡️', '🔒', '💰', '📦', '🔧', '🗺️']; @endphp
            {{ $icons[$loop->index] ?? '🚛' }}
        </div>
        <h3>{{ $image->title }}</h3>
        <p>{{ [
          'خدمة متكاملة تشمل فك الأثاث وتغليفه بشكل احترافي ثم تركيبه في الموقع الجديد بدقة عالية.',
          'فريق متخصص للتحميل والتنزيل الآمن للأثاث باستخدام أدوات احترافية تحمي من الخدوش.',
          'نضمن وصول أثاثك سليماً 100% مع تأمين كامل على البضائع خلال رحلة النقل.',
          'سيارات مجهزة بأحدث الأنظمة لتأمين الأثاث أثناء النقل مع كوادر مدربة ومحترفة.',
          'أسعار تنافسية لا تجد مثيلها في المنطقة مع الحفاظ على أعلى مستويات الخدمة والجودة.',
          'نستخدم مواد التغليف من كراتين وبلاستيك فقاعي وفلين لحماية كل قطعة.',
          'فنيون متخصصون في فك وتركيب جميع أنواع الأثاث بما فيها غرف النوم والمطابخ والمكاتب.',
          'نغطي جميع مدن المملكة من القصيم إلى الرياض وجدة والدمام ومكة والمدينة وحائل والطائف.'
        ][$loop->index] ?? '' }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- SEO LINKS / CITIES -->
<section class="seo-links" id="cities">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">مناطق التغطية</span>
      <h2>المدن التي نخدمها في المملكة</h2>
      <p>نغطي جميع مدن المملكة بخدمة احترافية وبضمان كامل من القصيم</p>
      <div class="divider"></div>
    </div>
    <div class="seo-grid">
      <div style="grid-column: 1/-1;">
        <div class="cities-cards-grid">
          @php
            $cities = [
              ['name' => 'من القصيم الى كل مدن المملكة', 'slug' => 'afzal-naql-afsh-qaseem', 'icon' => '🏙️'],
              ['name' => 'من القصيم الى الرياض', 'slug' => 'naql-afsh-qaseem-riyadh', 'icon' => '🏙️'],
              ['name' => 'من القصيم الى جدة', 'slug' => 'naql-afsh-qaseem-jeddah', 'icon' => '🌊'],
              ['name' => 'من القصيم الى الدمام', 'slug' => 'naql-afsh-qaseem-dammam', 'icon' => '⛽'],
              ['name' => 'من القصيم الى مكة المكرمة', 'slug' => 'naql-afsh-qaseem-makkah', 'icon' => '🕌'],
              ['name' => 'من القصيم الى المدينة المنورة', 'slug' => 'naql-afsh-qaseem-madinah', 'icon' => '🕌'],
              ['name' => 'من القصيم الى حائل', 'slug' => 'naql-afsh-qaseem-hail', 'icon' => '⛰️'],
              ['name' => 'من القصيم الى الطائف', 'slug' => 'naql-afsh-qaseem-taif', 'icon' => '🌹'],
              ['name' => 'من القصيم الى ينبع', 'slug' => 'naql-afsh-qaseem-yanbu', 'icon' => '⚓'],
              ['name' => 'من القصيم الى سكاكا', 'slug' => 'naql-afsh-qaseem-sakaka', 'icon' => '🏰'],
            ];
          @endphp
          @foreach($cities as $city)
          <a href="/{{ $city['slug'] }}" class="city-card fade-up">
            <div class="city-card-flag">{{ $city['icon'] }}</div>
            <div class="city-card-name">{{ $city['name'] }}</div>
            <div class="city-card-links">
              <span>نقل عفش</span>
              <span>نقل أثاث</span>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHY US -->
<section class="why-us">
  <div class="container">
    <div class="section-header">
      <span class="section-tag" style="background: rgba(212,160,23,0.3); color: var(--gold-light); border: 1px solid var(--gold);">لماذا نحن؟</span>
      <h2>لماذا تختار الأسطورة رونق قلب الخليج؟</h2>
      <p>نحن نفهم قيمة أثاثك وأمانتك، لذلك نقدم خدمة لا مثيل لها</p>
      <div class="divider"></div>
    </div>
    <div class="why-grid">
      <div class="why-card fade-up"><div class="why-icon">💰</div><h4>أسعار مناسبة</h4><p>أسعار تنافسية تناسب جميع الميزانيات بدون أي رسوم خفية</p></div>
      <div class="why-card fade-up"><div class="why-icon">👷</div><h4>عمالة مدربة</h4><p>فريق محترف مدرب على أعلى مستويات الكفاءة والأمانة</p></div>
      <div class="why-card fade-up"><div class="why-icon">📦</div><h4>تغليف آمن</h4><p>مواد تغليف عالية الجودة تحمي أثاثك من الخدوش والكسر</p></div>
      <div class="why-card fade-up"><div class="why-icon">🚛</div><h4>سيارات مجهزة</h4><p>أسطول من الشاحنات الحديثة المجهزة لجميع أنواع الأثاث</p></div>
      <div class="why-card fade-up"><div class="why-icon">⚡</div><h4>سرعة في التنفيذ</h4><p>ننجز المهمة في الوقت المحدد دون تأخير أو تسويف</p></div>
      <div class="why-card fade-up"><div class="why-icon">🗺️</div><h4>نقل داخل وخارج القصيم</h4><p>نغطي القصيم كاملاً وجميع مدن المملكة بكفاءة عالية</p></div>
      <div class="why-card fade-up"><div class="why-icon">🛡️</div><h4>ضمان على الخدمة</h4><p>ضمان كامل على سلامة الأثاث من لحظة الاستلام حتى التسليم</p></div>
      <div class="why-card fade-up"><div class="why-icon">📞</div><h4>خدمة عملاء سريعة</h4><p>متاحون على مدار الساعة للإجابة على جميع استفساراتك</p></div>
    </div>
  </div>
</section>

<!-- STEPS -->
<section id="about" style="background: var(--off-white);">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">طريقة العمل</span>
      <h2>كيف نعمل؟ خطوات سهلة وبسيطة</h2>
      <p>عملية نقل احترافية ومرتبة تضمن لك تجربة مريحة وخالية من القلق</p>
      <div class="divider"></div>
    </div>
    <div class="steps-wrap">
      @foreach($images['steps'] as $index => $image)
      <div class="step-card fade-up">
        <div class="step-img-wrap">
          <img src="{{ $image->url }}" alt="{{ $image->title }}" loading="lazy">
          <div class="step-num">{{ $loop->iteration }}</div>
        </div>
        <h4>{{ $image->title }}</h4>
        <p>{{ [
          'اتصل أو راسلنا عبر الواتساب لبدء رحلة النقل',
          'نحدد حجم الأثاث والمسافة لتقديم أنسب سعر',
          'إرسال فريق المعاينة أو الاتفاق عن بُعد',
          'فريق محترف يقوم بتغليف وفك جميع قطع الأثاث',
          'تحميل آمن ونقل سريع إلى الوجهة المطلوبة',
          'تنزيل وتركيب الأثاث في مكانه الجديد بإتقان'
        ][$loop->index] ?? '' }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- GALLERY -->
<section class="gallery">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">معرض الأعمال</span>
      <h2>شاهد أعمالنا</h2>
      <p>نماذج من خدماتنا الاحترافية في نقل العفش والأثاث</p>
      <div class="divider"></div>
    </div>
    <div class="gallery-grid">
      @foreach($images['gallery'] as $image)
      <div class="gallery-item">
        <img src="{{ $image->url }}" alt="{{ $image->title }}" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block;">
        <div class="gallery-overlay"><span>{{ $image->title }}</span></div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- REVIEWS -->
<section id="reviews">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">آراء العملاء</span>
      <h2>ماذا يقول عملاؤنا؟</h2>
      <p>ثقة عملائنا هي أغلى شيء نملكه وسعادتهم هي هدفنا الأول</p>
      <div class="divider"></div>
    </div>
    <div class="reviews-grid">
      <div class="review-card fade-up">
        <div class="review-stars">⭐⭐⭐⭐⭐</div>
        <p class="review-text">خدمة ممتازة جداً، نقلوا عفشي من القصيم الى الرياض بأمان تام ومن غير أي مشاكل. التغليف كان نظيف واحترافي والفريق أخذ وقته في التركيب.</p>
        <div class="reviewer">
          <div class="reviewer-avatar" style="background: var(--blue);">أ</div>
          <div class="reviewer-info">
            <div class="name">أحمد السالم</div>
            <div class="city">نقل من القصيم الى الرياض</div>
          </div>
        </div>
      </div>
      <div class="review-card fade-up">
        <div class="review-stars">⭐⭐⭐⭐⭐</div>
        <p class="review-text">أسعار مناسبة والخدمة فوق التوقعات. التغليف كان ممتاز وما كسرت أي قطعة. أنصح بهم بشدة لكل من يريد بالقصيم.</p>
        <div class="reviewer">
          <div class="reviewer-avatar" style="background: var(--red);">م</div>
          <div class="reviewer-info">
            <div class="name">محمد العتيبي</div>
            <div class="city">نقل داخل القصيم</div>
          </div>
        </div>
      </div>
      <div class="review-card fade-up">
        <div class="review-stars">⭐⭐⭐⭐⭐</div>
        <p class="review-text">نقلوا أثاثي من القصيم الى جدة بدون أي مشكلة. الشاحنة كانت كبيرة وناسبت كل العفش. التواصل كان سريع وسهل والتسليم في الموعد المحدد.</p>
        <div class="reviewer">
          <div class="reviewer-avatar" style="background: var(--gold);">ف</div>
          <div class="reviewer-info">
            <div class="name">فهد الشمري</div>
            <div class="city">نقل من القصيم الى جدة</div>
          </div>
        </div>
      </div>
      <div class="review-card fade-up">
        <div class="review-stars">⭐⭐⭐⭐⭐</div>
        <p class="review-text">جربت شركات كثيرة وهذه المن حيث الأمانة والسرعة والسعر. فريق العمل محترم ومؤدب. الله يوفقهم.</p>
        <div class="reviewer">
          <div class="reviewer-avatar" style="background: #27AE60;">ع</div>
          <div class="reviewer-info">
            <div class="name">عبدالله القحطاني</div>
            <div class="city">نقل من القصيم الى الدمام</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">الأسئلة الشائعة</span>
      <h2>أسئلة يسألها العملاء كثيراً</h2>
      <div class="divider"></div>
    </div>
    <div class="faq-wrap">
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">ما هي مناطق خدمة نقل العفش من القصيم الى كل مدن المملكة؟ <span class="arrow">▶</span></div>
        <div class="faq-a">نخدم القصيم وجميع مدن المملكة العربية السعودية بما فيها الرياض وجدة والدمام ومكة المكرمة والمدينة المنورة وحائل والطائف وغيرها من المدن.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">هل تقدمون ضمان على النقل؟ <span class="arrow">▶</span></div>
        <div class="faq-a">نعم، نقدم ضمان كامل على سلامة الأثاث أثناء النقل. نستخدم مواد التغليف للحفاظ على أثاثك من أي ضرر.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">كم تستغرق عملية نقل العفش من القصيم الى الرياض؟ <span class="arrow">▶</span></div>
        <div class="faq-a">عادةً تستغرق عملية النقل من القصيم الى الرياض يوماً واحداً، تبدأ بالتغليف والتحميل صباحاً وتنتهي بالتسليم والتركيب في الرياض مساءً.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">هل تشملون خدمة فك وتركيب غرف النوم؟ <span class="arrow">▶</span></div>
        <div class="faq-a">نعم، لدينا فنيون متخصصون في فك وتركيب جميع أنواع الأثاث بما فيها غرف النوم والمطابخ والمجالس والمكاتب.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">كيف أتواصل معكم لطلب الخدمة؟ <span class="arrow">▶</span></div>
        <div class="faq-a">يمكنك التواصل معنا عبر الاتصال المباشر على الرقم 0579796006 أو عبر الواتساب في أي وقت. نحن متاحون على مدار الساعة طوال أيام الأسبوع.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">ما هي الأسعار التقريبية لنقل العفش؟ <span class="arrow">▶</span></div>
        <div class="faq-a">تعتمد الأسعار على حجم الأثاث والمسافة. نقدم أسعار تنافسية ومناسبة لجميع الميزانيات. تواصل معنا للحصول على عرض سعر مجاني.</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section" id="contact">
  <div class="container">
    <h2>تحتاج آمن وسريع؟</h2>
    <p>تواصل معنا الآن واحصل على خدمة من القصيم إلى جميع مدن المملكة بأسعار مناسبة وضمان كامل.</p>
    <div class="cta-btns">
      <a href="tel:{{ $settings['phone'] ?? '0579796006' }}" class="btn-white">📞 اتصل الآن</a>
      <a href="https://wa.me/{{ $settings['whatsapp'] ?? '966579796006' }}" class="btn-wh-green">💬 راسلنا واتساب</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="logo-text">
          <div class="brand-name" style="color: white; font-size: 20px; font-weight: 900; margin-bottom: 8px;">🚛 الأسطورة رونق قلب الخليج</div>
        </div>
        <p class="brand-desc">من القصيم إلى جميع مدن المملكة. نقدم خدمات احترافية بأسعار مناسبة مع ضمان سلامة الأثاث وراحة البال.</p>
        <div class="footer-contact">
          <a href="tel:{{ $settings['phone'] ?? '0579796006' }}">📞 {{ $settings['phone'] ?? '0579796006' }}</a>
          <a href="https://wa.me/{{ $settings['whatsapp'] ?? '966579796006' }}">💬 واتساب مباشر</a>
          <a href="#">📍 {{ $settings['address'] ?? 'القصيم، المملكة العربية السعودية' }}</a>
        </div>
      </div>
      <div class="footer-col">
        <h4>خدماتنا</h4>
        <ul>
          <li><a href="#">مع الفك والتركيب</a></li>
          <li><a href="#">تغليف الأثاث</a></li>
          <li><a href="#">نقل بالضمان</a></li>
          <li><a href="#">تحميل وتنزيل</a></li>
          <li><a href="#">نقل بين المدن</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>نقل العفش</h4>
        <ul>
          <li><a href="naql-afsh-qaseem-riyadh">من القصيم الى الرياض</a></li>
          <li><a href="naql-afsh-qaseem-jeddah">من القصيم الى جدة</a></li>
          <li><a href="naql-afsh-qaseem-dammam">من القصيم الى الدمام</a></li>
          <li><a href="naql-afsh-qaseem-makkah">من القصيم الى مكة</a></li>
          <li><a href="naql-afsh-qaseem-hail">من القصيم الى حائل</a></li>
          <li><a href="naql-afsh-qaseem-taif">من القصيم الى الطائف</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>روابط سريعة</h4>
        <ul>
          <li><a href="#">الرئيسية</a></li>
          <li><a href="#about">من نحن</a></li>
          <li><a href="#services">خدماتنا</a></li>
          <li><a href="#cities">مناطق النقل</a></li>
          <li><a href="#reviews">آراء العملاء</a></li>
          <li><a href="#contact">اتصل بنا</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 <strong>الأسطورة رونق قلب الخليج</strong> - جميع الحقوق محفوظة</p>
      <p>{{ $settings['address'] ?? 'القصيم، المملكة العربية السعودية 🇸🇦' }}</p>
      <p>Designed and Developed by <a href="https://fourthpyramidagcy.com/" target="_blank" style="color: var(--gold-light); text-decoration: underline;">Fourth Pyramid Agency</a></p>
    </div>
  </div>
</footer>

<!-- FLOATING BUTTONS -->
<a href="https://wa.me/{{ $settings['whatsapp'] ?? '966579796006' }}" class="float-wa" title="واتساب">💬</a>
<a href="tel:{{ $settings['phone'] ?? '0579796006' }}" class="float-call" title="اتصال مباشر">📞</a>

<script>
// Mobile Nav
function toggleNav() {
  const nav = document.getElementById('mainNav');
  const overlay = document.getElementById('navOverlay');
  nav.classList.toggle('open');
  overlay.classList.toggle('open');
}

// FAQ Toggle
function toggleFaq(el) {
  const item = el.parentElement;
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}

// Scroll Animation
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

// Sticky header shadow enhancement
window.addEventListener('scroll', () => {
  const header = document.querySelector('header');
  if (window.scrollY > 10) {
    header.style.boxShadow = '0 4px 30px rgba(0,0,0,0.15)';
  } else {
    header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
  }
});
</script>
</body>
</html>




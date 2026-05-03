// ===== STATE =====
let currentModalSection = "";
let currentModalFile = null;

// Load stored images on startup
window.addEventListener("DOMContentLoaded", () => {
    showToast("👋 مرحباً بك في لوحة إدارة الصور!", "info");
});

// ===== NAVIGATION =====
function switchTab(tab, linkEl) {
    // Hide all panels
    document
        .querySelectorAll(".panel")
        .forEach((p) => p.classList.remove("active"));
    document
        .querySelectorAll(".tab-btn")
        .forEach((b) => b.classList.remove("active"));
    document
        .querySelectorAll(".sidebar-nav a")
        .forEach((a) => a.classList.remove("active"));

    // Show target panel
    const panel = document.getElementById("panel-" + tab);
    if (panel) panel.classList.add("active");

    // Activate tab button
    const tabBtn = document.getElementById("tab-" + tab);
    if (tabBtn) tabBtn.classList.add("active");

    // Activate sidebar link
    if (linkEl) linkEl.classList.add("active");

    // If no linkEl but we have the tab ID, try to find the sidebar link
    if (!linkEl) {
        const sideLink = document.getElementById("nav-" + tab);
        if (sideLink) sideLink.classList.add("active");
    }

    // Update topbar title
    const titles = {
        current: ["الصور الحالية في الموقع", "عرض وإدارة جميع صور الموقع"],
        hero: ["صورة الخلفية الرئيسية", "تغيير خلفية Hero Section"],
        services: ["صور كروت الخدمات", "إدارة صور الخدمات"],
        steps: ["صور خطوات العمل", "إدارة صور الخطوات"],
        gallery: ["معرض الأعمال", "إضافة وحذف وتغيير صور المعرض"],
        upload: ["رفع صور جديدة", "ارفع صورك من جهازك"],
        url: ["إضافة صورة برابط", "أضف صورة من الإنترنت"],
    };
    const t = titles[tab] || ["لوحة الإدارة", ""];
    document.getElementById("pageTitle").textContent = t[0];
    document.getElementById("pageSubtitle").textContent = t[1];
}

// ===== FILTERING =====
function filterImages(query) {
    query = query.toLowerCase();
    const cards = document.querySelectorAll(".current-img-card");
    cards.forEach((card) => {
        const title = card.querySelector("h4").textContent.toLowerCase();
        const section = card.dataset.section.toLowerCase();
        if (title.includes(query) || section.includes(query)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

// ===== MODAL: CHANGE IMAGE =====
function openChangeModal(id, name, currentUrl) {
    currentModalSection = id;
    currentModalFile = null;
    document.getElementById("modalSectionName").textContent = name;
    document.getElementById("modalCurrentImg").src = currentUrl;
    document.getElementById("modalUrlInput").value = "";
    document.getElementById("modalFileInput").value = "";
    document.getElementById("modalNewPreview").style.display = "none";
    document.getElementById("changeModal").classList.add("open");
}

function handleModalFile(file) {
    if (!file || !file.type.startsWith("image/")) {
        showToast("⚠️ يرجى اختيار ملف صورة صحيح", "error");
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        currentModalFile = e.target.result;
        document.getElementById("modalUrlInput").value = "";
        const box = document.getElementById("modalNewPreview");
        const img = document.getElementById("modalNewImg");
        img.src = e.target.result;
        box.style.display = "block";
    };
    reader.readAsDataURL(file);
}

function previewModalUrl(url) {
    const box = document.getElementById("modalNewPreview");
    const img = document.getElementById("modalNewImg");
    if (url && url.startsWith("http")) {
        img.src = url;
        box.style.display = "block";
    } else {
        box.style.display = "none";
    }
}

function selectSuggestion(url, el) {
    document
        .querySelectorAll(".modal img")
        .forEach((img) => (img.style.borderColor = "transparent"));
    if (el) el.style.borderColor = "var(--red)";
    document.getElementById("modalUrlInput").value = url;
    previewModalUrl(url);
}

function applyChange() {
    const url = document.getElementById("modalUrlInput").value.trim();
    const fileInput = document.getElementById("modalFileInput");
    const sectionSelect = document.getElementById("modalSectionSelect");

    const formData = new FormData();
    formData.append(
        "_token",
        document.querySelector('meta[name="csrf-token"]').content,
    );

    let hasData = false;
    if (fileInput.files.length > 0) {
        formData.append("image", fileInput.files[0]);
        hasData = true;
    } else if (url) {
        formData.append("url", url);
        hasData = true;
    }

    if (sectionSelect && sectionSelect.value) {
        formData.append("section", sectionSelect.value);
        hasData = true;
    }

    if (!hasData) {
        showToast("⚠️ يرجى اختيار صورة أو قسم جديد", "error");
        return;
    }

    fetch(`/admin/images/${currentModalSection}`, {
        method: "POST",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        body: formData,
    })
        .then(async (response) => {
            const data = await response.json();
            if (response.ok && data.success) {
                showToast("✅ تم التحديث بنجاح", "success");
                setTimeout(() => location.reload(), 1000);
            } else {
                showToast("❌ " + (data.message || "فشل التحديث"), "error");
            }
        })
        .catch((error) => {
            showToast("❌ خطأ في الاتصال", "error");
        });
}

// ===== DELETE =====
function deleteImage(id) {
    if (!confirm("هل أنت متأكد من حذف هذه الصورة؟")) return;

    const formData = new FormData();
    formData.append(
        "_token",
        document.querySelector('meta[name="csrf-token"]').content,
    );
    formData.append("_method", "DELETE");

    fetch(`/admin/images/${id}`, {
        method: "POST",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        body: formData,
    }).then(async (response) => {
        if (response.ok) {
            showToast("✅ تم الحذف بنجاح", "success");
            setTimeout(() => location.reload(), 1000);
        } else {
            showToast("❌ فشل الحذف", "error");
        }
    });
}

// ===== PREVIEW =====
function previewImg(url) {
    const modal = document.getElementById("previewModal");
    const img = document.getElementById("fullPreviewImg");
    if (modal && img) {
        img.src = url;
        modal.classList.add("open");
    }
}

function closeModal(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove("open");
}

// ===== TOAST =====
function showToast(msg, type = "success") {
    const t = document.getElementById("toast");
    if (!t) return;
    t.textContent = msg;
    t.className = "toast " + type + " show";
    setTimeout(() => {
        t.className = "toast";
    }, 3000);
}

// Close modal on overlay click
document.querySelectorAll(".modal-overlay").forEach((overlay) => {
    overlay.addEventListener("click", function (e) {
        if (e.target === this) this.classList.remove("open");
    });
});

// URL Panel Helpers
function previewUrlMain(url) {
    const box = document.getElementById("urlPreviewBoxMain");
    const img = document.getElementById("urlPreviewImgMain");
    if (!url) {
        box.style.display = "none";
        return;
    }
    img.src = url;
    box.style.display = "block";
}

function previewFileMain(input) {
    const box = document.getElementById("uploadPreviewMain");
    const img = document.getElementById("uploadPreviewImgMain");
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            img.src = e.target.result;
            box.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function setUrlMain(url) {
    const input = document.getElementById("urlInputMain");
    input.value = url;
    previewUrlMain(url);
}

// Close sidebar on main content click (mobile)
document.querySelector(".main").addEventListener("click", () => {
    if (window.innerWidth <= 900) {
        document.getElementById("sidebar").classList.remove("open");
    }
});

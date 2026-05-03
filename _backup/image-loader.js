/**
 * Image Loader & Sync Script
 * This script reads from LocalStorage (adminImagesDB) and updates the website images.
 */
function syncWebsiteImages() {
  const savedData = localStorage.getItem('adminImagesDB');
  if (!savedData) return;

  const imageDB = JSON.parse(savedData);

  Object.entries(imageDB).forEach(([section, data]) => {
    // 1. Hero Section
    if (section === 'hero') {
      const hero = document.getElementById('hero') || document.querySelector('.hero');
      if (hero) {
        hero.style.backgroundImage = `linear-gradient(135deg, rgba(26,58,107,0.92) 0%, rgba(26,26,46,0.88) 60%, rgba(146,43,33,0.85) 100%), url('${data}')`;
      }
    }

    // 2. Service Images (service-1, service-2, ...)
    if (section.startsWith('service-')) {
      const index = parseInt(section.split('-')[1]) - 1;
      const serviceCards = document.querySelectorAll('.service-card img');
      if (serviceCards[index]) serviceCards[index].src = data;
    }

    // 3. Step Images (step-1, step-2, ...)
    if (section.startsWith('step-')) {
      const index = parseInt(section.split('-')[1]) - 1;
      const stepImages = document.querySelectorAll('.step-card img');
      if (stepImages[index]) stepImages[index].src = data;
    }

    // 4. Gallery Images (gallery-1, gallery-2, ...)
    if (section.startsWith('gallery-')) {
      const index = parseInt(section.split('-')[1]) - 1;
      const galleryImages = document.querySelectorAll('.gallery-item img');
      if (galleryImages[index]) galleryImages[index].src = data;
    }
  });
}

window.addEventListener('DOMContentLoaded', syncWebsiteImages);

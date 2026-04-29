jQuery(document).on('click', '.circle-plus', function(event) {
    event.preventDefault(event);
    jQuery(this).removeClass('circle-plus').addClass('circle-minus');
    jQuery(this).parent().siblings().show();
});

jQuery(document).on('click', '.circle-minus', function(event) {
    event.preventDefault(event);
    jQuery(this).removeClass('circle-minus').addClass('circle-plus');
    jQuery(this).parent().siblings().hide();
});

function Marquee(selector, speed) {
  const container = document.querySelector(selector);
  if (!container || container.dataset.marqueeReady === '1') {
    return;
  }

  container.dataset.marqueeReady = '1';
  container.innerHTML += container.innerHTML;

  let offset = 0;

  function animate() {
    offset += speed;
    if (offset >= container.scrollWidth / 2) {
      offset = 0;
    }
    container.style.transform = `translateX(-${offset}px)`;
    requestAnimationFrame(animate);
  }

  animate();
}


document.addEventListener('DOMContentLoaded', function() {
  Marquee('.marquee', 0.7);

  const trigger = document.querySelector('.next-arrow');
  const target  = document.querySelector('.hero-block-step');

  if (trigger && target) {
    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    });
  }

  const content = document.querySelector('.innovations-content');
  const prevBtn = document.querySelector('.slider-arrows .prev');
  const nextBtn = document.querySelector('.slider-arrows .next');

  if (content && prevBtn && nextBtn) {
    let index = 0;
    const items = document.querySelectorAll('.innovations-content a');
    const visibleCount = 3;

    function updateSlider() {
      if (!items.length) {
        return;
      }

      const itemWidth = items[0].offsetWidth + 32;
      content.style.transform = `translateX(-${index * itemWidth}px)`;
    }

    nextBtn.addEventListener('click', () => {
      if (items.length <= visibleCount) {
        return;
      }

      if (index < items.length - visibleCount) {
        index++;
        updateSlider();
      }
    });

    prevBtn.addEventListener('click', () => {
      if (index > 0) {
        index--;
        updateSlider();
      }
    });
  }

  document.querySelectorAll('[data-ai-scroll]').forEach((button) => {
    const target = document.querySelector(button.dataset.aiScroll);

    if (!target) {
      return;
    }

    button.addEventListener('click', () => {
      const direction = Number(button.dataset.direction || 1);
      const firstCard = target.querySelector('a, .ai-case-card');
      const step = firstCard ? firstCard.getBoundingClientRect().width + 20 : 420;

      target.scrollBy({
        left: direction * step,
        behavior: 'smooth'
      });
    });
  });
});

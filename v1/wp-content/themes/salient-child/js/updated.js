jQuery(document).on('click', '.circle-plus', function(event) {
    event.preventDefault(event);
    jQuery(this).removeClass('circle-plus').addClass('circle-minus');
    console.log(jQuery(this).parent().siblings());
    jQuery(this).parent().siblings().show();
});

jQuery(document).on('click', '.circle-minus', function(event) {
    event.preventDefault(event);
    jQuery(this).removeClass('circle-minus').addClass('circle-plus');
    jQuery(this).parent().siblings().hide();
});

function Marquee(selector, speed) {
  const container = document.querySelector(selector);
  if (!container) {
    return;
  }

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

  let index = 0;
  const items = document.querySelectorAll('.innovations-content a');
  const visibleCount = 3;
  function updateSlider() {
    const itemWidth = items[0].offsetWidth + 32;
    content.style.transform = `translateX(-${index * itemWidth}px)`;
  }

  nextBtn.addEventListener('click', () => {
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
});

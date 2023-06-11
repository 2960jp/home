import Swiper, {Autoplay, EffectFade, Navigation, Pagination} from 'swiper'
// import Swiper styles
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import {mediaMaxWidth} from '../utils/_matchMedia'
// import 'swiper/css/a11y'
import 'swiper/css/effect-fade'

// const thumbs = new Swiper('.slider-thumbs', {
//   slidesPerView: 'auto',
//   freeMode: true,
//   // watchSlidesProgress: true,
//   slideClass: 'js-thumb-item',
// })

const swiperList = new Swiper('#js-slider', {
  effect: 'fade',
  spaceBetween: 0,
  speed: 100,
  modules: [EffectFade],
})

const thumbButtons = document.querySelectorAll('.js-thumb-button')
if (thumbButtons.length) {
  thumbButtons.forEach((thumbButton) => {
    let i = thumbButton.dataset.slideIndex
    thumbButton.addEventListener('click', () => {
      swiperList.slideTo(i)
    })
  })
}

const elSwiperFront = document.getElementById('swiper-front')

if (elSwiperFront) {
  let resizeFlg
  let swiperFront

  function enableSwiperFront() {
    swiperFront = new Swiper('#swiper-front', {
      modules: [Navigation, Pagination, Autoplay],
      loop: true,
      // slidesPerView: 1.5,
      slidesPerView: 'auto',
      slidesPerGroup: 1,
      centeredSlides: true,
      spaceBetween: 64,
      speed: 800,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        768: {
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        },
      },
    })

    if (elSwiperFront.classList.contains('is-three')) {
      Object.assign(swiperFront.params, {
        loopedSlides: 1,
        lazyPreloadPrevNext: 1,
      })

      swiperFront.update()
    }
  }

  function swiperFrontDestroy() {
    if (swiperFront !== undefined) {
      swiperFront.destroy(true, true)
      // console.log('swiper destroyed')
    }
  }

  function windowResizeFunc() {
    if (resizeFlg !== false) {
      clearTimeout(resizeFlg)
    }
    resizeFlg = setTimeout(() => {
      swiperFrontDestroy()
      enableSwiperFront()
      if (mediaMaxWidth.matches) {
        swiperFrontDestroy()
        enableSwiperFront()
      }
    }, 100)
  }

  window.addEventListener('resize', windowResizeFunc)

  enableSwiperFront()
}

const beforeAfterSlider = document.querySelectorAll('.js-before-after-swiper')
for (let i = 0; i < beforeAfterSlider.length; i++) {
  let prev = beforeAfterSlider[i].querySelector('.swiper-button-prev')
  let next = beforeAfterSlider[i].querySelector('.swiper-button-next')
  let pagination = beforeAfterSlider[i].querySelector('.swiper-pagination')

  const beforeAfterSwiper = new Swiper(beforeAfterSlider[i], {
    modules: [Navigation, Pagination],
    // slidesPerView: 1,
    // spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: next,
      prevEl: prev,
    },
    pagination: {
      el: pagination,
      clickable: true,
    },
  })
}

const elFrontSteps = document.getElementById('front-steps')
if (elFrontSteps) {
  let swiperFrontSteps

  function enableSwiperFrontSteps() {
    swiperFrontSteps = new Swiper('#front-steps', {
      modules: [Navigation, Pagination, Autoplay],
      loop: true,
      slidesPerView: 'auto',
      slidesPerGroup: 1,
      centeredSlides: true,
      spaceBetween: 32,
      speed: 800,
      // autoplay: {
      //   delay: 5000,
      //   disableOnInteraction: false,
      // },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        1024: {
          enabled: false,
        },
      },
    })
  }

  function swiperDestroy() {
    if (swiperFrontSteps !== undefined) {
      swiperFrontSteps.destroy(true, true)
    }
  }

  function windowResizeFunc() {
    swiperDestroy()
    if (window.matchMedia('(max-width: 1023px)').matches) {
      enableSwiperFrontSteps()
    }
  }

  window.addEventListener('resize', windowResizeFunc)

  if (elFrontSteps && window.matchMedia('(max-width: 1023px)').matches) {
    enableSwiperFrontSteps()
  }
}

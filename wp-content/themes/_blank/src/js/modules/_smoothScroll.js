import {mediaMinWidthLg} from '../utils/_matchMedia'
const Ease = {
  easeInOut: function (t) {
    return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1
  },
}

let fixedHeader = undefined
let gnav = undefined

const duration = 400
window.addEventListener('DOMContentLoaded', function () {
  const smoothScrollTriggers = [].slice.call(document.querySelectorAll('a[href^="#"]:not([data-scroll-ignore])'))
  smoothScrollTriggers.forEach(function (smoothScrollTrigger) {
    smoothScrollTrigger.addEventListener('click', function (e) {
      const href = smoothScrollTrigger.getAttribute('href')
      const currentPosition = document.documentElement.scrollTop || document.body.scrollTop
      const targetElement = document.getElementById(href.replace('#', ''))
      if (targetElement) {
        e.preventDefault()
        e.stopPropagation()

        // fixedHeader = document.getElementById('masthead')
        gnav = document.getElementById('gnav')
        let targetPosition = window.pageYOffset + targetElement.getBoundingClientRect().top

        if (fixedHeader) {
          // console.log(fixedHeader.offsetHeight)
          targetPosition = targetPosition - fixedHeader.offsetHeight
        }

        if (gnav) {
          if (mediaMinWidthLg.matches) {
            targetPosition = targetPosition - gnav.offsetHeight
          }
        }
        const startTime = performance.now()
        const loop = function (nowTime) {
          const time = nowTime - startTime
          const normalizedTime = time / duration
          if (normalizedTime < 1) {
            window.scrollTo(0, currentPosition + (targetPosition - currentPosition) * Ease.easeInOut(normalizedTime))
            requestAnimationFrame(loop)
          } else {
            window.scrollTo(0, targetPosition)
          }
        }
        requestAnimationFrame(loop)
      }
    })
  })
})

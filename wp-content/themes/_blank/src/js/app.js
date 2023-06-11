import './modules/_isScrolled'
import {linkExternal} from './modules/_linkExternal'
import {mainNav} from './modules/_mainNavToggle'
import './modules/_smoothScroll'
// import './modules/_swiper'
mainNav()
linkExternal()

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('a[href^="http://"], a[href^="https://"]').forEach(function (link) {
    const currentDomain = window.location.hostname
    const linkDomain = new URL(link.href).hostname

    if (currentDomain === linkDomain) {
      link.addEventListener('click', function (event) {
        event.preventDefault()

        const target = document.querySelector(link.hash)
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
          })
        } else {
          window.location.href = link.href
        }
      })
    }
  })
})

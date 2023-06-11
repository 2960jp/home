import {backfaceFixed} from '../utils/_backfaceFixed'
const elNavLinks = document.querySelectorAll('.js-navtrigger')
const elBody = document.querySelector('body')
const classActive = 'is-active'
const classMainNavOpen = 'is-mainnav-open'

const elHamburger = document.querySelector('.js-hamburger')
const elMainNavClose = document.querySelectorAll('.js-mainnav-close')

const subNavToggles = document.querySelectorAll('.js-sub-nav-toggle')

// init
export const mainNav = () => {
  let flg = false

  function _reset() {
    if (elBody.classList.contains(classMainNavOpen)) {
      elBody.classList.remove(classMainNavOpen)
      elHamburger.classList.remove(classActive)
      elHamburger.setAttribute('aria-expanded', 'false')
      backfaceFixed(false)
      flg = false
    }
  }

  if (elHamburger) {
    elHamburger.addEventListener(
      'click',
      (e) => {
        e.currentTarget.classList.toggle(classActive)
        // elHamburger.classList.toggle(classActive)
        elBody.classList.toggle(classMainNavOpen)

        if (flg) {
          elHamburger.setAttribute('aria-expanded', 'false')
          elHamburger.focus()
          backfaceFixed(false)

          subNavToggles.forEach((toggle) => {
            const parent = toggle.parentElement
            parent.classList.remove('is-active')
          })

          flg = false
        } else {
          elHamburger.setAttribute('aria-expanded', true)
          backfaceFixed(true)

          subNavToggles.forEach((toggle) => {
            const parent = toggle.parentElement
            parent.classList.remove('is-active')
          })

          flg = true
        }
      },
      false
    )
  }

  ;[...elMainNavClose].forEach((el) => {
    el &&
      el.addEventListener(
        'click',
        () => {
          _reset()
        },
        false
      )
  })
}

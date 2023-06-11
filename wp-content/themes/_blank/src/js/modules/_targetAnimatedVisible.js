import {fadeInUp} from '../utils/_fadeInUp'
const toggleLists = document.querySelectorAll('.js-visible-toggle-lists [data-visible-target]')

if (toggleLists.length) {
  toggleLists.forEach((toggle) => {
    toggle.addEventListener('click', () => {
      const target = toggle.dataset.visibleTarget

      if (target === 'all') {
        const allTargets = document.querySelectorAll('.js-visible-target')
        allTargets.forEach((target) => {
          fadeInUp(target)
        })
      } else {
        const targetElement = document.querySelector(target)
        if (targetElement) {
          fadeInUp(targetElement)
          const siblings = getSiblings(targetElement)
          siblings.forEach((sibling) => {
            sibling.style.display = 'none'
          })
        }
      }
    })
  })
}

function getSiblings(element) {
  const siblings = Array.from(element.parentNode.children)
  return siblings.filter((sibling) => sibling !== element)
}

function isScrolled() {
  const scrollTop = document.documentElement.scrollTop || document.body.scrollTop
  const root = document.getElementsByTagName('html')[0]
  const CLASSNAME = 'is-scrolled'

  if (scrollTop === 0) {
    root.classList.remove(CLASSNAME)
  } else {
    root.classList.add(CLASSNAME)
  }
}

window.addEventListener('DOMContentLoaded', isScrolled)
window.addEventListener('scroll', isScrolled)

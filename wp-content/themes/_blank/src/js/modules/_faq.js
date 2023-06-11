const faqEl = document.querySelectorAll('.js-faq')
faqEl.forEach((el) => {
  const trigger = el.querySelector('button')
  const controls = trigger.getAttribute('aria-controls')
  const panel = document.getElementById(controls)

  trigger.addEventListener('click', (e) => {
    const target = e.currentTarget
    const isOpen = target.getAttribute('aria-expanded') === 'true'

    if (isOpen) {
      // アコーディオンを閉じる
      target.setAttribute('aria-expanded', 'false')
      el.classList.remove('is-active')
    } else {
      // アコーディオンを開く
      target.setAttribute('aria-expanded', 'true')
      el.classList.add('is-active')
    }
  })
})

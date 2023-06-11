// 監視する要素を取得
const targetElements = document.querySelectorAll('.js-target')

if (targetElements.length) {
  // 監視の設定
  const observerOptions = {
    rootMargin: '0px',
    threshold: 0.5,
  }

  // 監視
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // 可視範囲に入った場合、classlistに'is-visible'を追加
        entry.target.classList.add('is-visible')
        // 監視を解除
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  // 監視する要素を設定
  targetElements.forEach((targetElement) => {
    observer.observe(targetElement)
  })
}

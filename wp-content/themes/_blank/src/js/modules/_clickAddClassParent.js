// 要素を取得する
const elements = document.querySelectorAll('.js-clickable')

if (elements.length) {
  // 各要素にクリックリスナーを追加する
  elements.forEach((element) => {
    element.addEventListener('click', () => {
      // 親要素のclassListに「is-active」クラスがあるかどうかを判別する
      if (element.parentNode.classList.contains('is-active')) {
        // 「is-active」クラスがある場合、削除する
        element.parentNode.classList.remove('is-active')
      } else {
        // 「is-active」クラスがない場合、追加する
        element.parentNode.classList.add('is-active')
      }
    })
  })
}

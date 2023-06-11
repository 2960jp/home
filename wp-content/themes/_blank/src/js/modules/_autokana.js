const condition = document.getElementById('your-name') != null
if (condition) {
  document.addEventListener('DOMContentLoaded', function () {
    // AutoKana.bind('#name', '#furigana')
    // ↓ふりがなをカタカナで入力したい場合
    AutoKana.bind('#your-name', '#your-name-kana', {katakana: true})
  })
}

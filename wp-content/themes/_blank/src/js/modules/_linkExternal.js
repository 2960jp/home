const linkExternal = () => {
  function ready(fn) {
    if (document.readyState != 'loading') {
      fn()
    } else if (document.addEventListener) {
      document.addEventListener('DOMContentLoaded', fn)
    } else {
      document.attachEvent('onreadystatechange', function () {
        if (document.readyState != 'loading') fn()
      })
    }
  }
  ready(function () {
    const domain = document.domain
    const regexp = new RegExp(domain)

    var anchorEls = document.querySelectorAll('a:not([href^="#"],[href^="tel:"])')
    var anchorElsLength = anchorEls.length
    // console.log(anchorEls)
    // console.log(anchorElsLength)

    for (var i = 0; i < anchorElsLength; i++) {
      var anchorEl = anchorEls[i]
      var href = anchorEl.getAttribute('href')
      if (!regexp.test(href)) {
        anchorEl.setAttribute('target', '_blank')
        anchorEl.setAttribute('rel', 'noopener nofollow')
      }
    }
  })
}

export {linkExternal}

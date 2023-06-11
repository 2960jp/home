const fadeInUp = (element) => {
  element.style.opacity = 0
  element.style.transform = 'translateY(30px)'
  element.style.visibility = 'visible'
  element.style.display = 'block'

  const animation = element.animate(
    [
      {opacity: 0, transform: 'translateY(30px)'},
      {opacity: 1, transform: 'translateY(0)'},
    ],
    {
      duration: 400,
      fill: 'both',
    }
  )

  animation.onfinish = () => {
    element.style.opacity = 1
    element.style.transform = 'translateY(0)'
  }
}

export {fadeInUp}

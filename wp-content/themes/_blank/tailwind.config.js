let plugin = require('tailwindcss/plugin')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ['./*.php', './**/*.php', './src/css/**/*.css', './src/js/**/*.js', './safelists/**/*.{html,php,txt,js,md}'],
  theme: {
    screens: {
      xs: '475px',
      ...defaultTheme.screens,
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
      },
      screens: {
        xs: '475px',
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1280px',
        // '2xl': '1536px',
      },
    },
    extend: {
      fontSize: {
        xxs: '0.625rem', //10px,
      },
      fontFamily: {
        nunito: ['Open Sans', 'sans-serif'],
      },
      colors: {
        text: '#000000',
        dark: '#3e3a39',
        primary: '#108180',
        secondary: '#bf9c46',
        'gray-custom': '#dcdcdc',
      },
    },
  },
  mode: 'jit',
  plugins: [
    plugin(function ({addVariant}) {
      addVariant('is-mainnav-open', '.is-mainnav-open &')
      addVariant('admin-bar', '.admin-bar &')
      addVariant('is-active', '&.is-active')
      addVariant('is-active-parent', '.is-active &')
      addVariant('is-scrolled', '.is-scrolled &')
    }),
  ],
}

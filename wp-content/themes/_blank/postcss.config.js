module.exports = (ctx) => ({
  syntax: 'postcss-scss',
  plugins: {
    'postcss-import-ext-glob': {},
    'postcss-import': {},
    'postcss-simple-vars': {},
    'postcss-hexrgba': {},
    'postcss-strip-inline-comments': {},
    'tailwindcss/nesting': {},
    tailwindcss: {},
    autoprefixer: {},
    cssnano: ctx.env === 'production' ? {preset: 'default'} : false,
  },
})

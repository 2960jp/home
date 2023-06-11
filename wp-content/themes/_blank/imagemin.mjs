import imageminGifsicle from 'imagemin-gifsicle'
import imagemin from 'imagemin-keep-folder'
import imageminMozjpeg from 'imagemin-mozjpeg'
import imageminPngquant from 'imagemin-pngquant'
import imageminSvgo from 'imagemin-svgo'
import imageminWebp from 'imagemin-webp'

const srcFiles = './src/img/**/*.{jpg,jpeg,png,gif,svg}'
const outDir = './assets/img/**/*'

const convertWebp = (targetFiles) => {
  imagemin([targetFiles], {
    use: [imageminWebp({quality: 75})], // qualityを指定しないと稀にwebpが走らない場合がある
  })
}

imagemin([srcFiles], {
  plugins: [
    imageminMozjpeg(),
    imageminPngquant({quality: [0.75, 0.8]}),
    imageminGifsicle(),
    imageminSvgo({
      plugins: [
        {
          name: 'removeViewBox',
          active: false,
        },
      ],
    }),
  ],
  replaceOutputDir: (output) => {
    return output.replace(/img\//, '../assets/img/')
  },
}).then(() => {
  convertWebp(outDir)
  console.log('Images optimized')
})

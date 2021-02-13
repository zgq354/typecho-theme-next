const gulp = require("gulp");
const stylus = require("gulp-stylus");
const fs = require("fs");
const YAML = require("yaml");

function getThemeConfig() {
  const text = fs.readFileSync("./src/_config.yml", "utf-8");
  return YAML.parse(text);
}

// 获取参数
// https://github.com/hexojs/hexo-renderer-stylus/blob/5af594e725ca5f71fbca67f82904ce8a31daf10a/lib/renderer.js
function getProperty(obj, name) {
  name = name.replace(/\[(\w+)\]/g, '.$1').replace(/^\./, '');

  const split = name.split('.');
  let key = split.shift();

  if (!Object.prototype.hasOwnProperty.call(obj, key)) return '';

  let result = obj[key];
  const len = split.length;

  if (!len) return result || '';
  if (typeof result !== 'object') return '';

  for (let i = 0; i < len; i++) {
    key = split[i];
    if (!Object.prototype.hasOwnProperty.call(result, key)) return '';

    result = result[split[i]];
    if (typeof result !== 'object') return result;
  }

  return result;
}

const themeConfig = getThemeConfig();

// 重写内部使用的 define config 方法
function defineConfig(style) {
  style.define('hexo-config', data => {
    return getProperty(themeConfig, data.val);
  });
}

// 处理 Hexo 移植过来的部分
function baseCss() {
  return gulp
    .src("./src/css/main.styl")
    .pipe(stylus({
      use: defineConfig,
      'include css': true,
    }))
    .pipe(gulp.dest("./dist/css"));
}

// 为 Typecho 定制的样式
function typechoCss() {
  return gulp
    .src("./src/css/typecho.styl")
    .pipe(stylus())
    .pipe(gulp.dest("./dist/css"));
}

exports.default = gulp.parallel([baseCss, typechoCss]);

## 说明
src 中代码从原 [next 主题](https://github.com/theme-next/hexo-theme-next/tree/d24c48efb1ff1182b23926a3835e350f9c3ab6eb) 项目拷贝过来。

Typecho 的页面 HTML 由 PHP 生成，而 Hexo 是在生成静态网站时才会编译涉及到的静态资源，移植主题的关键，在于把 HTML 结构翻译到 PHP 的语境，然后引用原主题生成的 css 和 js，因此这里也会针对 Typecho 环境做一个构建的兼容。


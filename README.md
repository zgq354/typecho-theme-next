# typecho-theme-next
Hexo 主题 [Next](https://github.com/theme-next/hexo-theme-next) 的 Typecho 移植版。

## 新版本重构

计划与 Hexo 版本保持同步，支持所有的 Schemes，可通过主题设置配置:

 - [ ] Next.Mist (以这个为基础)
 - [ ] Next.Muse
 - [ ] Next.Pisces
 - [ ] Next.Gemini


正在做的：

 - [x] 代码格式化
 - [x] 去掉逝去的多说评论
 - [x] 引入 next 的 stylus 样式，gulp 构建
 - [ ] 基础 css 样式、HTML 重构(doing)
 - [ ] 新评论框适配
 - [ ] 基础 js 适配
 - [ ] 完善各子页面配置
 - [ ] 支持其他 scheme


以下是旧版的介绍：

-------

## 特性
1. 支持typecho原生评论(评论样式来自cho的Navy主题)
2. 侧边栏显示友情链接，友情链接在启用 [Hanny](http://www.imhan.com/) 的 [Links插件](http://www.imhan.com/tag/%E5%8F%8B%E6%83%85%E9%93%BE%E6%8E%A5/) 才会显示
3. 自带分类、归档、标签页面模板

## 使用方法
1. 点击 download zip 下载最新源码，解压，将其中文件夹重命名为 next 并上传至博客的 `usr/themes` 目录下
2. 在 Typecho 后台启用主题
3. 新建分类页，缩略名为 `categories`，自定义模板选择 `categories` 
4. 新建归档页，缩略名为 `archive`，自定义模板选择 `archive`
5. 新建标签页，缩略名为 `tags`，自定义模板选择 `tags`
6. 前往外观设置设置头像，昵称等等

## 相关项目
* NexT.Pisces：[NexT.Pisces](https://github.com/newraina/typecho-theme-NexTPisces)

## License

Open sourced under the MIT license.

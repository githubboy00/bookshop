自制网上书店 Beta 0.01版 不断更新中

核心技术

*必备得增删改查
*上传图片与自动删除图片
*用户登陆验证模块
*css与div的排版
*ajax无刷新更新内容

核心项目代码只有300+kb，轻量级，简洁不简陋，麻雀虽小五脏俱全


网站所用到的框架

*前端是yahoo的pure库，有响应式布局，简洁，高端，大气
*后端是thinkphp，国产的优质php框架，经典MVC结构
*javascript是用jquery，一个最流行的库，可以更方便使用ajax或其他特效
*数据库是mysql，这个不用多说，大家都懂

网站测试环境

*ubuntu+xampp

使用网上书店的具体用法

*把bookshop与thinkphp放到xampp的根目录里面，在xampp里面文件夹名是htdocs，如果是普通的apache文件夹是www
*之后在mysql创建名为thinkbookshop的数据库，导入thinkbookshop.sql
*修改项目的config.php，msql用户名为root，密码为空
*访问http://localhost/bookshop/
*后台http://localhost/bookshop/index.php/Admin/login   账号admin密码admin

可能遇到的bug

*首次访问http://localhost/bookshop/可能会遇到xxxx xxx mdir（） xxxxxx  runtime/cache之类的错误提示
*是因为bookshop权限问题，打开bookshop这项目的时候会产生缓存文件，在项目的runtime文件夹里面，权限不够的话
*会导致写入文件异常，从而抛出这个bug。

*windows版现在还不支持，网站路径与linux版有差别，有时间再做个windows版吧

留言邮箱bshuida0@163.com







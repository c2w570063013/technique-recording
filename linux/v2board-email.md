##laravel 配置gmail IMAP service

### Basic - Gmail IMAP Service Setting#
登录你的 Gmail

进入配置页面 Settings

进入 Forwarding and POP/IMAP

选择 Enable the IMAP Access

通常有人以为，至此 Gmail 配置完成了，我想说的是:
Too young, too simple.

### Advanced - 2-Step Verification and App Password#
好的，坑点来了。
现在简要介绍一下在 Gmail 配置中经常被忽略的两个配置点。

### 2-Step Verification
登录你的 Google Account

点击左侧导航栏的 Security

在 Signing in to Google 栏下，点击 2-Step Verification

点击 Get started

根据提示完成接下来的步骤

### App Password
承上，返回 Security 页面

在 Signing in to Google 栏下，点击 App passwords

根据提示完成接下来的步骤

Select app: 选择 Mail

Select device: 选择 Other (Custom name)，稍后可以自行设置一个便于自己识别的名称 (eg. something.com, or some server, etc.)

点击 GENERATE: 生成随机 16 位 App password

请确保在关闭此弹出窗口前，及时妥善保存好当前生成的 16 位 App password，因为在弹出窗口关闭后，你不会再有机会查看该 App password，切记，切记！

至此，Gmail IMAP 服务配置完成。

### 总结
常言道，难者不会，会者不难。Gmail 与国内常见的 Email 服务相比，存在一定的区别，有时正是这些不为我等熟知区别成为开发人员对接业务中的技术壁垒。

该帖本身的技术分量不重，笔者在创作该贴时，初衷也不过是介绍一下这个 Gmail 配置坑点，以期为其他开发人员在对接业务过程中铺平道路。

最后，附上一份简要的 Laravel .env 文件的片段，以供诸位观赏:

```shell script
# Gmail
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your.gmail.account@gmail.com
MAIL_PASSWORD=your.app.password ####这个地方要注意，不是你的email 密码
MAIL_FROM_NAME=Your.Name
MAIL_FROM_ADDRESS=your.gmail.account@gmail.com
MAIL_ENCRYPTION=ssl

```
然后laravel这边清除配置缓存，并重启队列
```shell script
# 清除配置缓存
php artisan config:clear
# 重启队列(根据自己队列的重启方式进行重启)
```

原文连接:https://learnku.com/articles/32693
##简介
xieblog，一个基于Markdown文件的PHP微型博客。

作者: hiphper at 163 dot com

##授权协议
[GNU/GPL V2](http://www.gnu.org/licenses/gpl-2.0.html)

[项目地址](https://github.com/hi-phper/xieblog)

##使用说明
在posts目录中，新建以日期为前缀，以md为扩展名的文件，如2015-01-01-readme.md，每一个md文件就是一篇博客文章。

###md文件的格式


    title: 第一篇文章
    date: 2015-01-02 09:10:05
    ---
    第一篇文章的内容

* 在title:后面填写文章标题。
* date:后面填写文章的发表时间。
* date行的下面是三个中划线,注意是三个。
* 下面一行就是文章的正文，正文使用Markdown语法书写。

###博客配置
配置文件为网站目录中的config.json文件，其中的配置内容如下。

    {
        "base_url" : "",
        "title" : "xie blog",
        "subtitle" : "写博客",
        "description" : "一个使用Markdown文件的微型博客",
        "per_page" : 5,
        "template" : "default"
    }

* base_url为博客的访问网址，如http://www.domain.com/ 注意网址后面要加斜杠，如果为空，则程序自动判断。
* title为博客标题。
* subtitle为博客子标题。
* description为博客说明。
* per_page表示在博客列表页面中每页显示的博客数目。
* template设置博客使用的是哪个模板。

###博客模板
模板位于templates下面的文件夹中，每个模板为一个单独的文件夹。

###继续阅读功能
在内容中插入以下标记可以使用继续阅读功能。

    <!-- more -->
    

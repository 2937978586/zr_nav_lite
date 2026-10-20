# @Author : 孜然
# @Url : zrv7.com
# @Qq : 2937978586
# @Copyright (c) Cumin All Rights Reserved.

# 孜然导航系统 V1.0

一套轻量的 PHP 网址导航（目录站）系统，自带前后台、分类管理、站点收录审核、置顶位、公告与友链。

- 前台：首页置顶推荐、分类列表、站点详情、全站搜索、收录申请、关于页、跳转计数
- 后台：导航管理、分类管理、站点管理、收录审核、公告管理、系统设置、账号管理、图片上传
- 模板：`templates/antidote`，改样式不影响主体逻辑

## 运行环境

| 项 | 要求 | 说明 |
|---|---|---|
| PHP | **5.6** | 代码直接使用 `mysql_*` 系列函数（PHP 7.0 已移除），并含有 `$str{0}` 花括号取下标语法（PHP 8 已移除） |
| MySQL | 5.5+ | 字符集 utf8 / utf8mb4 |
| Web 服务器 | Apache 或 Nginx | Apache 用自带 `.htaccess`；Nginx 用下文伪静态 |

> 想在 PHP 7.2 / 8 上运行，需要先把全站约 60 处 `mysql_*` 改为 `inc/db.class.php` 的 `$DB->query()`，并修复 `inc/function.php` 中的 `$seed{...}` 写法。

## 安装步骤

1. 上传全部文件到网站根目录并解压
2. 导入数据库：`zrdh/zrdh.sql`（默认表前缀 `zzdh_`）
3. 复制 `config.sample.php` 为 `config.php`，填写数据库地址、账号、密码、库名
4. 访问站点首页即可；后台地址：`/admin/login.php`

默认管理员：`admin` / `123456` —— **上线前务必在后台「系统设置 → 账号信息」修改。**

### Nginx 伪静态

```nginx
rewrite ^/index.html$ /index.php;
rewrite ^/about.html$ /about.php;
rewrite ^/search.html$ /search.php;
rewrite ^/ranking.html$ /ranking.php;
rewrite ^/apply.html$ /apply.php;
rewrite ^/404.html$ /404.php;
rewrite ^/sort([0-9]+).html$ /sort.php?id=$1;
rewrite ^/sort([a-zA-Z]+).html$ /sort.php?alias=$1;
rewrite ^/site_([0-9]+).html$ /site.php?id=$1;
```

使用 Nginx 时请删除 `.htaccess`。

## 目录结构

```
├── config.php          数据库配置（不入库，见 .gitignore）
├── config.sample.php   配置模板
├── index.php           首页（置顶 + 分类入口）
├── sort.php            分类列表页
├── site.php            站点详情页
├── search.php          搜索结果页
├── apply.php           收录申请页
├── about.php           关于我们
├── go.php              跳转与点击计数
├── 404.php             404 页
├── header.php          公共头部
├── footer.php          公共尾部
├── module.php          板块渲染
├── inc/
│   ├── common.php      引导：常量、session、连库、读取配置
│   ├── db.class.php    数据库类（MySQL / MySQLi / SQLite）
│   ├── function.php    工具函数（curl、IP 归属地、authcode、随机串等）
│   ├── lang.php        前后台文案语言包
│   ├── member.php      后台登录态校验
│   ├── submit.php      收录申请提交
│   └── webdata.php     站点数据聚合
├── admin/              后台
├── templates/antidote/ 前台模板
├── assets/             公共静态资源
└── zrdh/zrdh.sql       建库脚本
```

## 数据表

| 表 | 用途 |
|---|---|
| `zzdh_config` | 全站配置（站点信息、管理员账号密码） |
| `zzdh_sort` | 分类 |
| `zzdh_list` | 收录站点 |
| `zzdh_nav` | 导航栏 |
| `zzdh_notice` | 公告 |
| `zzdh_apply` | 收录申请 |

## 已知问题

- 仅支持 PHP 5.6（见「运行环境」）
- 后台密码以明文存于 `zzdh_config`，登录态由 `md5(用户名+密码)` 生成，加密密钥 `SYS_KEY` 硬编码在 `inc/common.php`
- `header.php` 存在基于 `HTTP_REFERER` 的 SQL 拼接，公网部署前建议移除该段逻辑
- 全站 SQL 为字符串拼接，未使用预处理

## 版权

本程序版权归作者**孜然**所有，详见 [CopyrightZR.md](CopyrightZR.md)。

```
@Author    : 孜然
@Url       : zrv7.com
@Qq        : 2937978586
@Copyright : (c) Cumin All Rights Reserved.
```

# Laravel - SharePost

## 網站簡介

利用 Laravel 和 Bootstrap Template 實作一個能夠發佈生活文章的部落格系統。

[SharePost Demo](http://yangsirweb.com/SharePost/)

## 運用技術

1. PHP
2. Laravel Framework
3. MySQL 
4. Bootstrap Template
5. HTML/CSS


## 主要功能

1. 註冊與登入
2. 個人檔案編輯與大頭貼設定
3. 發布文章與編輯文章
4. 回覆文章
5. 權限控管，管理員 (admin) 能夠管理所有文章與留言，一般使用者可以管理自己的文章與留言

## 使用說明

**首頁圖示**

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/sharepost.png)

**Step 1.** 點擊右上角 Register 按鈕，填寫資料後按下送出。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/register.png)

**Step 2.** 成功註冊後會立即跳轉到後台 Dashboard 頁面。

*Dashboard 介紹*
* 上方功能列由左至右為回到貼文主頁面、新增貼文、大頭貼顯示、下拉選單（內含帳號設定、登出）
* 左方功能列能夠編輯管理貼文、查看貼文留言，若權限為管理員則能夠查看與管理所有使用者貼文。


![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/dashboard.png)


**Step 3.** 點擊右上角下拉選單，選擇 Manage Account 能夠到設定頁面設定大頭貼、使用者角色等帳戶資訊。

* 圖為上傳大頭貼後，大頭貼測試可參考[大頭貼圖片](https://github.com/YangYangXun/ProjectImage/tree/master/SharePost/faces)

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/profile.png)

**Step 4.** 點擊功能列 New Post 能夠新增貼文。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/create-post.png)

**Step 5.** 發文後跳轉到首頁能夠看到剛剛發佈的文章。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/newpost-at-home.png)

**Step 6.** 能夠回覆自己與別人的文章。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/reply.png)


**管理員權限**  管理員能夠看到所有使用者、所有貼文。

* 查看所有使用者

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/admin-user.png)

* 查看所有貼文
 
 ![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/SharePost/readme/admin-post.png)
 
 
 
 ## 參考資料
 
 
 [StarAdmin-Template](https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template)
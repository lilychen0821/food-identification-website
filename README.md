# food-identification-website

----------基本操作----------

1. 需要安裝並啟動MySQL Database及Apache Web Server。
2. 把所有檔案放到網站根目錄。
3. 將foodidentification.sql匯入至phpMyAdmin。
4. 編輯login/connectMYSQL.php資料庫相關資料（$db_host、$db_username、$db_password、$db_name）。

----------檔案說明----------

1. 網站首頁為index.php，可以自行建立帳號並登入查看會員專區。
2. analysis資料夾：顯示分析結果。
3. fooddetect資料夾：存放辨識紀錄（records資料夾）、辨識食物（detectobjects.php），包含計算使用者BMI值、獲取食物重量（getAmount.php）、顯示紀錄等。
4. images資料夾：存放網頁所有的圖片。
5. login資料夾：包含登入、建立帳號、修改基本資料、登出、刪除帳號等。
      
        forgotpassword資料夾：「忘記密碼」功能相關設定。
      
        openid資料夾：「google登入」相關設定。
        
6. uploads資料夾：上傳圖片後存放於此。
7. vendor資料夾：首頁下方「Contact Us」表單寄信功能相關設定（PHPmailer）。
8. visitor資料夾：未登入的使用者可以瀏覽的頁面以及使用的功能。

<!DOCTYPE HTML>
<html lang='tr-TR'>
<head>
    <meta charset='UTF-8'>
    <title>Yönetim Paneli</title>
    <base href='<?=base_url()?>'>
    <style>#uyari { color:#f22; padding:20px; border:1px solid #f22; margin:20px; }</style>
</head>
<body>
    <?= ( $uyari ) ? '<div id="uyari">' . $uyari . '</div>' : ' ' ?>
    <form method='post'>
        <input type='text' name='username' placeholder='Kullanıcı Adı' />
        <input type='text' name='password' placeholder='Şifre' />
        <input type='submit' value='Oturum Aç' />
    </form>
    <div><a href='anasayfa'>Siteye Dön</a></div>
</body>
</html>
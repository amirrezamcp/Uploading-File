<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITLE ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/upload.css">
</head>
<body>
    <div class="container">
        <?php if(isset($_SESSION['msg']) && $_SESSION['msg'] == true) : ?>
            <p class="msg"><?= $_SERVER['msg'] ?> </p>
            <?php unset($_SESSION['msg']) ?>
        <?php endif ?>
        <form method="post" action="tpl/tpl-upload.php" enctype="multipart/form-data">
            <div class="upload-warapper">
                <span class="file-name">Choose a file . . .</span>
                    <label for="file-upload">Browse 
                        <input type="file" id="file-upload" name="uploadedFile">
                    </label>
            </div>
            <input type="submit" name="uploadBtn" value="Upload">
        </form>
    </div>
</body>
</html>

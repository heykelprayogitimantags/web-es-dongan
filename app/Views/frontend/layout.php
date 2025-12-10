<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Es Dongan' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    
    <main class="min-h-screen">
        <?= $this->renderSection('content') ?>
    </main>

</body>
</html>

<?php
$amount = 600;
$currency = 'INR';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loading Transfer Requisites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="page-loading">
    <div class="mobile-shell">
        <header class="topbar d-flex align-items-center gap-3 justify-content-between">
            <div class="d-flex align-items-center gap-3 flex-grow-1">
                <i class="bi bi-house fs-3"></i>
                <div class="browser-pill flex-grow-1">
                    <i class="bi bi-sliders"></i>
                    <span class="small text-truncate"><?php echo htmlspecialchars($merchantHost, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 fs-4 ms-3">
                <i class="bi bi-plus-lg"></i>
                <i class="bi bi-three-dots-vertical"></i>
            </div>
        </header>

        <div class="hero-controls d-flex justify-content-end gap-3">
            <div class="ghost-chip">Menu</div>
            <div class="ghost-chip px-3"><i class="bi bi-globe-central-south-asia"></i></div>
        </div>

        <main class="loading-panel">
            <div>
                <div class="spinner-border text-secondary loading-spinner" role="status" aria-hidden="true"></div>
                <p class="loading-copy mb-0">Loading requisites for transfer</p>
                <p class="text-secondary small mt-3 mb-0">Amount: <?php echo number_format($amount); ?> <?php echo htmlspecialchars($currency, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </main>
    </div>

    <script>
        window.setTimeout(function () {
            window.location.href = 'payment.php';
        }, 2200);
    </script>
</body>
</html>
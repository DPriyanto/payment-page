<?php
$status = isset($_GET['status']) ? strtolower((string) $_GET['status']) : 'success';
$isSuccess = $status === 'success';
$isExpired = $status === 'expired';

$page = $isSuccess
    ? [
        'title' => 'Payment Successful',
        'icon' => 'bi-check-circle-fill',
        'accent' => '#479d57',
        'message' => 'Your transfer has been received and is now being verified.',
        'subcopy' => 'A confirmation message will appear in your account history shortly.',
        'button' => 'Back to payment',
    ]
    : ($isExpired
    ? [
        'title' => 'Payment Session Expired',
        'icon' => 'bi-clock-history',
        'accent' => '#f0ad4e',
        'message' => 'Your payment time window has ended.',
        'subcopy' => 'Restart payment to generate a fresh session and complete the transfer.',
        'button' => 'Start new session',
    ]
    : [
        'title' => 'Payment Failed',
        'icon' => 'bi-x-circle-fill',
        'accent' => '#d9534f',
        'message' => 'We could not confirm the transfer from this session.',
        'subcopy' => 'Check the payment details and try again, or choose another app.',
        'button' => 'Try again',
    ]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="page-result <?php echo $isSuccess ? 'status-success' : ($isExpired ? 'status-expired' : 'status-failure'); ?>">
    <main class="status-wrap">
        <section class="status-card">
            <div class="status-icon">
                <i class="bi <?php echo htmlspecialchars($page['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
            </div>
            <h1 class="status-title mb-0"><?php echo htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="status-copy"><?php echo htmlspecialchars($page['message'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="status-copy small"><?php echo htmlspecialchars($page['subcopy'], ENT_QUOTES, 'UTF-8'); ?></p>

            <div class="meta-row">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="meta-label">Reference</div>
                        <div class="meta-value">TRX-<?php echo date('YmdHis'); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="meta-label">Status</div>
                        <div class="meta-value"><?php echo $isSuccess ? 'Verified' : ($isExpired ? 'Expired' : 'Pending retry'); ?></div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-3 mt-4">
                <a class="btn btn-lg text-white rounded-4 py-3 status-action" href="payment.php"><?php echo htmlspecialchars($page['button'], ENT_QUOTES, 'UTF-8'); ?></a>
                <a class="btn btn-outline-dark rounded-4 py-3" href="index.php">Start over</a>
            </div>
        </section>
    </main>
</body>
</html>
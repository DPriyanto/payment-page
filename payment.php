<?php
$upiId = 'r-sajith@ptyes';
$amount = 600;
$currency = 'INR';
$confirmWindow = '10:00';

$confirmWindowSeconds = 0;
if (preg_match('/^(\d{1,2}):(\d{2})$/', $confirmWindow, $matches)) {
    $confirmWindowSeconds = ((int) $matches[1] * 60) + (int) $matches[2];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TITLE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body class="page-payment">
    <div class="mobile-shell">
        

        <main class="page-wrap">
            <section class="text-center px-md-4">
                <h1 id="paymentHeading" class="fw-bold mb-3">Pay with PhonePE</h1>
                <div class="d-flex align-items-center justify-content-center mb-3">
                    Payment expires in
                    <span id="confirmTimer" class="timer-value ml-2" data-seconds="<?php echo (int) $confirmWindowSeconds; ?>" data-expire-url="result.php?status=expired"><?php echo htmlspecialchars($confirmWindow, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <div class="row g-2" id="paymentOptions">
                    <div class="col-3">
                        <button type="button" class="pay-option is-selected" data-app-name="PhonePE" aria-pressed="true">
                            <img src="/img/logo/phonepe-80.png" alt="PhonePE" class="img-fluid" />
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="pay-option" data-app-name="UPI" aria-pressed="false">
                            <img src="/img/logo/paytm-80.png" alt="PayTM" class="img-fluid" />
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="pay-option" data-app-name="GPay" aria-pressed="false">
                            <img src="/img/logo/gpay-80.png" alt="GPay" class="img-fluid" />
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="pay-option" data-app-name="PayTM" aria-pressed="false">
                            <img src="/img/logo/upi-80.png" alt="UPI" class="img-fluid" />
                        </button>
                    </div>
                </div>
            </section>

            <section class="payment-card">
                <div class="row g-4 align-items-start">
                    <div class="col-6">
                        <p class="text-secondary mb-2">Pay to these details only once</p>
                        <a class="download-link" href="#" download>Download QR</a>
                    </div>
                    <div class="col-6">
                        <div class="" aria-label="UPI QR code">
                            <img src="img/QR_code_for_mobile_English_Wikipedia.svg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="detail-row d-flex justify-content-between align-items-center gap-3">
                    <div>
                        <div class="detail-label">UPI ID to pay manually</div>
                        <div class="detail-value" id="upiValue"><?php echo htmlspecialchars($upiId, ENT_QUOTES, 'UTF-8'); ?></div>
                    </div>
                    <button class="copy-btn" type="button" data-copy-target="upiValue" aria-label="Copy UPI ID">
                        <i class="bi bi-copy"></i>
                    </button>
                </div>

                <div class="detail-row cannot-pay-row justify-content-between">
                    <div class="row">
                        <div class="col-6 font-weight-bold">
                            Cannot pay?
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-primary btn-sm" href="#">Get new details</a>
                        </div>
                    </div>
                </div>

                <div class="detail-row d-flex justify-content-between align-items-center gap-3">
                    <div>
                        <div class="detail-label">Amount</div>
                        <div class="detail-value" id="amountValue"><?php echo number_format($amount); ?> <?php echo htmlspecialchars($currency, ENT_QUOTES, 'UTF-8'); ?></div>
                    </div>
                    <button class="copy-btn" type="button" data-copy-target="amountValue" aria-label="Copy amount">
                        <i class="bi bi-copy"></i>
                    </button>
                </div>
            </section>

            <section class="info-card mt-4">
                <a class="watch-link" href="https://www.youtube.com/results?search_query=how+to+pay+with+upi" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-play-circle-fill me-2"></i>Watch how to deposit
                </a>
            </section>

            <div class="mt-3">
                <a class="btn btn-outline-secondary btn-block py-3" href="#">Cancel Payment</a>
            </div>
            
        </main>
    </div>

    <script src="payment.js"></script>
</body>

</html>
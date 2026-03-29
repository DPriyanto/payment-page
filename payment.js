(function() {
    var optionButtons = document.querySelectorAll('.pay-option');
    var payAppLabel = document.getElementById('payAppLabel');
    var paymentHeading = document.getElementById('paymentHeading');

    if (!optionButtons.length || !payAppLabel || !paymentHeading) {
        return;
    }

    optionButtons.forEach(function(optionButton) {
        optionButton.addEventListener('click', function() {
            var appName = optionButton.getAttribute('data-app-name') || 'PhonePE';

            optionButtons.forEach(function(button) {
                button.classList.remove('is-selected');
                button.setAttribute('aria-pressed', 'false');
            });

            optionButton.classList.add('is-selected');
            optionButton.setAttribute('aria-pressed', 'true');

            payAppLabel.textContent = 'Pay with ' + appName;
            paymentHeading.textContent = 'Pay with ' + appName;
        });
    });
})();

(function() {
    var timerNode = document.getElementById('confirmTimer');

    if (!timerNode) {
        return;
    }

    var expireUrl = timerNode.getAttribute('data-expire-url') || 'result.php?status=expired';

    var remaining = parseInt(timerNode.getAttribute('data-seconds'), 10);
    if (isNaN(remaining) || remaining < 0) {
        remaining = 0;
    }

    var endAt = Date.now() + (remaining * 1000);

    function formatTime(totalSeconds) {
        var minutes = Math.floor(totalSeconds / 60);
        var seconds = totalSeconds % 60;
        return String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
    }

    function expireCountdown() {
        timerNode.textContent = '00:00';
        window.location.href = expireUrl;
    }

    function updateCountdown() {
        var secondsLeft = Math.max(0, Math.floor((endAt - Date.now()) / 1000));

        if (secondsLeft <= 0) {
            expireCountdown();
            return true;
        }

        timerNode.textContent = formatTime(secondsLeft);
        return false;
    }

    if (updateCountdown()) {
        return;
    }

    var intervalId = window.setInterval(function() {
        if (updateCountdown()) {
            window.clearInterval(intervalId);
        }
    }, 250);
})();

document.querySelectorAll('[data-copy-target]').forEach(function(button) {
    button.addEventListener('click', function() {
        var target = document.getElementById(button.getAttribute('data-copy-target'));
        if (!target) {
            return;
        }

        navigator.clipboard.writeText(target.textContent.trim()).then(function() {
            var icon = button.querySelector('i');
            if (icon) {
                icon.className = 'bi bi-check2';
            }

            window.setTimeout(function() {
                if (icon) {
                    icon.className = 'bi bi-copy';
                }
            }, 1400);
        }).catch(function() {
            window.alert('Unable to copy automatically.');
        });
    });
});
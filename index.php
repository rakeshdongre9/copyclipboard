<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy to Clipboard Example</title>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
</head>
<body>
    <div class="copy-content">This is the first text you can copy.</div>
    <button class="copy-button" data-target=".copy-content:nth-of-type(1)">Copy Text 1</button>

    <div class="copy-content">This is the second text you can copy.</div>
    <button class="copy-button" data-target=".copy-content:nth-of-type(2)">Copy Text 2</button>

    <div class="copy-content">This is the third text you can copy.</div>
    <button class="copy-button" data-target=".copy-content:nth-of-type(3)">Copy Text 3</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clipboard = new ClipboardJS('.copy-button', {
                target: function(trigger) {
                    // Get the selector from the data-target attribute
                    const targetSelector = trigger.getAttribute('data-target');
                    return document.querySelector(targetSelector);
                }
            });

            clipboard.on('success', function(e) {
                alert('Copied "' + e.text + '" to clipboard!');
                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                console.error('Action:', e.action);
                console.error('Trigger:', e.trigger);
            });
        });
    </script>
</body>
</html>

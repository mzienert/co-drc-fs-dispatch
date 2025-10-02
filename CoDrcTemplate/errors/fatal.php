<?php
// Decode error details if provided
$error_details = $error_details ?? null;
if ($error_details) {
    $error_info = json_decode(base64_decode($error_details), true);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 100px auto; text-align: center; }
        h1 { color: #d32f2f; }
        .details { margin-top: 20px; padding: 15px; background: #f5f5f5; border-radius: 4px; text-align: left; font-size: 12px; font-family: monospace; }
    </style>
</head>
<body>
    <h1>Something went wrong</h1>
    <p>We encountered an error while processing your request. Please try again later.</p>
    <?php if (isset($error_info) && ini_get('display_errors')): ?>
        <div class="details">
            <strong>Error:</strong> <?= htmlspecialchars($error_info['message']) ?><br>
            <strong>File:</strong> <?= htmlspecialchars($error_info['file']) ?><br>
            <strong>Line:</strong> <?= htmlspecialchars($error_info['line']) ?>
        </div>
    <?php endif; ?>
</body>
</html>

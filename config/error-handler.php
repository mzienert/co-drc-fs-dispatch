<?php
/**
 * Error Handler
 * Handles fatal errors and cleans up output buffers
 */

// Register error handler to clean buffers on fatal errors
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        // Fatal error occurred - clean up any open buffers
        while (ob_get_level() > 0) {
            ob_end_clean();
        }

        // Log the error
        error_log("Fatal error: {$error['message']} in {$error['file']}:{$error['line']}");

        // Show user-friendly error page
        http_response_code(500);
        $error_details = base64_encode(json_encode([
            'message' => $error['message'],
            'file' => $error['file'],
            'line' => $error['line']
        ]));
        require __DIR__ . '/../errors/fatal.php';
    }
});
?>

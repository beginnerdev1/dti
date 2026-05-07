<?php

// Basic CLI exception output for CodeIgniter.
$title = $title ?? 'Application Error';
$exceptionClass = isset($exception) ? $exception::class : 'Error';
$exceptionCode = isset($exception) ? $exception->getCode() : 0;
$exceptionMessage = isset($exception) ? $exception->getMessage() : 'Unknown error';
$exceptionFile = isset($exception) ? $exception->getFile() : 'unknown';
$exceptionLine = isset($exception) ? $exception->getLine() : 0;
$trace = $trace ?? [];

$cleanPath = static function (string $path): string {
    if (function_exists('clean_path')) {
        return clean_path($path);
    }

    return str_replace('\\', '/', $path);
};

fwrite(STDERR, "{$title}\n");
fwrite(STDERR, str_repeat('=', strlen($title)) . "\n\n");

fwrite(STDERR, "Exception: " . $exceptionClass);
if ($exceptionCode) {
    fwrite(STDERR, " #" . $exceptionCode);
}
fwrite(STDERR, "\n");

fwrite(STDERR, "Message: " . $exceptionMessage . "\n");
fwrite(STDERR, "File: " . $cleanPath($exceptionFile) . "\n");
fwrite(STDERR, "Line: " . $exceptionLine . "\n\n");

if (! empty($trace) && is_array($trace)) {
    fwrite(STDERR, "Stack trace:\n");
    foreach ($trace as $index => $row) {
        $location = isset($row['file'], $row['line'])
            ? $cleanPath($row['file']) . ':' . $row['line']
            : '{internal function}';

        $function = isset($row['class'], $row['type'], $row['function'])
            ? $row['class'] . $row['type'] . $row['function']
            : ($row['function'] ?? '{closure}');

        fwrite(STDERR, sprintf("  #%d %s(): %s\n", $index, $function, $location));
    }
}

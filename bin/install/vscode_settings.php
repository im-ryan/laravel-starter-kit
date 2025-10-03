<?php

declare(strict_types=1);

/**
 * Description: Install VS Code settings, xDebugger, and tasks for use within a dev container.
 * Usage: After launching the dev container.
 */
$srcFiles = [
    __DIR__ . '/../../docker/.vscode/launch.json',
    __DIR__ . '/../../docker/.vscode/settings.json',
    __DIR__ . '/../../docker/.vscode/tasks.json',
];

foreach ($srcFiles as $src) {
    if ( ! file_exists($src)) {
        fwrite(STDERR, "Missing VSCode configuration file: {$src}\n");

        exit(1);
    }
}

$destDir = __DIR__ . '/../../.vscode';

if ( ! is_dir($destDir) && ! mkdir($destDir, 0777, true) && ! is_dir($destDir)) {
    fwrite(STDERR, "Failed to create {$destDir}\n");

    exit(1);
}

foreach ($srcFiles as $src) {
    $dest = $destDir . '/' . basename($src);

    if ( ! file_exists($dest)) {
        if ( ! copy($src, $dest)) {
            fwrite(STDERR, "Copy failed for {$src}.\n");

            exit(1);
        }

        fwrite(STDOUT, "Copy successful!\nSource: `{$src}`\nDestination:`{$dest}`\n");
    } else {
        file_put_contents($dest, file_get_contents($src));
        fwrite(STDOUT, "Existing VSCode file overwritten!\nSource: `{$src}`\nDestination:`{$dest}`\n");
    }
}

exit(0);

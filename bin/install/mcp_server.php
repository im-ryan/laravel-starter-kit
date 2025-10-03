<?php

declare(strict_types=1);

/**
 * Description: Install Laravel Boost MCP server for Cline.
 * Usage: After launching the dev container.
 */
$src = __DIR__ . '/../../docker/.vscode/cline_mcp_settings.json';

if ( ! file_exists($src)) {
    fwrite(STDERR, "Missing MCP configuration file.\n");

    exit(1);
}

$home = getenv('HOME');

if ( ! $home) {
    fwrite(STDERR, "HOME not found.\n");

    exit(1);
}

if ($home !== '/home/sail') {
    fwrite(STDERR, "Attempting to install MCP servers outside of Sail is not supported.\n");

    exit(1);
}

$destDir = $home . '/.vscode-server/data/User/globalStorage/saoudrizwan.claude-dev/settings';

if ( ! is_dir($destDir) && ! mkdir($destDir, 0777, true) && ! is_dir($destDir)) {
    fwrite(STDERR, "Failed to create {$destDir}\n");

    exit(1);
}

$dest = $destDir . '/cline_mcp_settings.json';

if ( ! file_exists($dest)) {
    if ( ! copy($src, $dest)) {
        fwrite(STDERR, "Copy failed.\n");

        exit(1);
    }

    fwrite(STDOUT, "Copy successful!\nSource: `{$src}`\nDestination:`{$dest}`\n");
} else {
    file_put_contents($dest, file_get_contents($src));
    fwrite(STDOUT, "Existing MCP server file overwritten!\nSource: `{$src}`\nDestination:`{$dest}`\n");
}

exit(0);

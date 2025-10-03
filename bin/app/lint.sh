#!/usr/bin/env bash
#
# Description: Lint dirty project files only.
# Usage: During Continuous Integration or local development.
#
set -eu pipefail

git diff --name-only --diff-filter=AM -- '*.php' ':!tests/*' \
    | xargs -r ./vendor/bin/phpstan analyse --ansi

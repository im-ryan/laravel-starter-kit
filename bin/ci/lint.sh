#!/usr/bin/env bash
#
# Description: Check if dirty project files have been linted.
#
set -eu pipefail

git diff --name-only --diff-filter=AM -- '*.php' ':!tests/*' \
    | xargs -r ./vendor/bin/phpstan analyse --ansi --no-progress

git diff --name-only --diff-filter=AM -- '*.js' '*.jsx' '*.ts' '*.tsx' ':!tests/*' \
  | xargs -r npx eslint --fix-dry-run --color

#!/usr/bin/env bash
#
# Description: Check if dirty project files have been formatted.
#
set -eu pipefail

git diff --name-only --diff-filter=AM -- '*.js' '*.jsx' '*.ts' '*.tsx' '*.json' '*.css' '*.md' ':!tests/*' \
  | xargs -r npx prettier --check

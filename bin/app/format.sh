#!/usr/bin/env bash
#
# Description: Lint dirty project files only.
#
set -eu pipefail

git diff --name-only --diff-filter=AM -- '*.js' '*.jsx' '*.ts' '*.tsx' '*.json' '*.css' '*.md' ':!tests/*' \
  | xargs -r npx prettier --write

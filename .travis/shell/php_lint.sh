#!/bin/bash

IGNORE_PATTERN="vendor"
RESULT=$(find . -name "*.php" | grep -Ev "${IGNORE_PATTERN}" | xargs -I{} php -l {})

if [ $? -eq 0 ]; then
  echo "Success"
  exit 0
else
  echo "${RESULT}"
  exit 1
fi

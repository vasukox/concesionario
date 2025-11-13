<?php
// Entry point for Vercel PHP runtime. We forward to the public front controller.
// Keep this file in `api/` so Vercel recognizes it as a Serverless Function.

// Adjust working directory so includes in public/index.php work as expected
chdir(__DIR__ . '/../');
require_once __DIR__ . '/../public/index.php';

<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Bootstrap the application (No HTTP Middleware involved)
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo "<h1>Running Migrations...</h1>";
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    echo "<pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";
    echo "<br><strong style='color:green'>✅ Migration complete! You can now use the website.</strong>";
    echo "<br><br><strong style='color:red'>⚠️ IMPORTANT: Please delete this file (public/migrate.php) immediately!</strong>";
} catch (\Exception $e) {
    echo "<pre style='color:red'>❌ Error: " . $e->getMessage() . "</pre>";
}

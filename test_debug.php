<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $user = User::create([
        'name' => 'TestUser' . rand(1000,9999), // Randomize to avoid unique constraint
        'email' => 'test' . rand(1000,9999) . '@example.com',
        'password' => Hash::make('password'),
        'user_type' => 'user',
    ]);
    
    echo "Result type: " . gettype($user) . "\n";
    if (is_object($user)) {
        echo "User ID: " . $user->id . "\n";
        echo "User Type: " . $user->user_type . "\n";
    } else {
        var_dump($user);
    }
} catch (\Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}

<?php

namespace App\Console\Commands;

use App\Models\Color;
use Illuminate\Console\Command;

class GenerateColors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-colors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startTime = microtime(true);

        for ($i = 0; $i < 100000; $i++) {
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);
            $hex = sprintf("#%02x%02x%02x", $red, $green, $blue);

            if (Color::where('hex_code', $hex)->exists()) {
                $i--;  // Decrement the counter to ensure the loop generates the full unique colors
                continue;  // Skip this iteration if the color already exists
            }

            Color::create([
                'hex_code' => $hex,
                'red' => $red,
                'green' => $green,
                'blue' => $blue
            ]);

            $this->info("Color {$hex} generated successfully!");
        }

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;
        $this->info("One million colors generated successfully in {$executionTime} seconds!");
    }
}

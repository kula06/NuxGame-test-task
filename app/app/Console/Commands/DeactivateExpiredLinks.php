<?php

namespace App\Console\Commands;

use App\Models\AccessLink;
use Illuminate\Console\Command;

class DeactivateExpiredLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deactivate-expired-links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate all expired links';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $updatedRows = AccessLink::query()
            ->where('is_active', true)
            ->where('expires_at', '<=', now())
            ->update(['is_active' => false]);

        $this->info('Deactivated expired links: '.$updatedRows);

        return self::SUCCESS;
    }
}

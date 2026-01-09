<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

use function Symfony\Component\Translation\t;

class FakeExternalAPICall implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels;

    public Order $order;

    /**
     * Create a new job instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // delay 5s
        sleep(5);

        Log::info("Order #" . $this->order->id . " Processed");
    }
}

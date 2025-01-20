<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use App\Models\Sale;

class ProcessSale implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $saleData;

    public function __construct($saleData)
    {
        $this->saleData = $saleData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Dados da venda
        $productId = $this->saleData['product_id'];
        $quantity = $this->saleData['quantity'];
        $totalPrice = $this->saleData['total_price'];

        // Atualiza o estoque do produto
        $product = Product::find($productId);
        if ($product) {
            $product->decrement('quantity', $quantity);
        }

        // Registra a venda no banco de dados
        Sale::create([
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ]);
    }
}

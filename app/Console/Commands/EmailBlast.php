<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

use App\Entities\FrontPage\LogClick;

class EmailBlast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emailblastcustomer:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email Blast Customer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();

        $customer = LogClick::where('tanggal', date('Y-m-d'))->get();
        
        foreach($customer as $key => $item){

            $response = $client->request('POST', 'http://103.11.135.246:1506/blast', ['query' => [
                'recipient_id' => $item->customer_id,
                'recipient_name' => $item->customer_name,
                'recipient_email' => $item->customer_email,
                'nama_product' => $item->nama_product,
                'gambar_url' => env('APP_URL').'/assets/admin/assets/media/derma_produk/'.$item->url_product

            ]])->getBody();
            $data = json_decode($response);

            $update = LogClick::find($item->id);
            $update->status = 1;
            $update->save();
        }

        \Log::info("Cron Blast Email Customer is success !");
    }
}

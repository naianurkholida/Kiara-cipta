<?php

namespace App\Mail\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailKonfirmasiPembayaran extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $nama;
    public $token;
    public $total;
    public $metode_pembayaran;
    public $no_telepon;
    public $alamat;
    public $triger;
    public $bank;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $token, $nama, $total, $metode_pembayaran, $no_telepon, $alamat, $triger, $bank)
    {
        $this->email             = $email;
        $this->token             = $token;
        $this->nama              = $nama;
        $this->total             = $total;
        $this->metode_pembayaran = $metode_pembayaran;
        $this->no_telepon        = $no_telepon;
        $this->alamat            = $alamat;
        $this->triger            = $triger;
        $this->bank              = $bank;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        if($this->triger == "konfirmasi_pembayaran"){
            return $this->subject('Konfirmas Pembayaran Donasi')->view('front_page.email.konfirmasi_pembayaran');
        }
    }
}

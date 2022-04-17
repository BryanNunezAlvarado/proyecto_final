<?php

namespace App\Mail;

use App\Models\Producto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;





class Reporte extends Mailable
{
    use Queueable, SerializesModels;
    public $productos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->productos = Producto::all();
        
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reporte');
        
    }
}

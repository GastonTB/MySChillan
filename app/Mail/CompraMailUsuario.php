<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\OrdenCompra;
use App\Models\Producto;

class CompraMailUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $productos;
    public $orden;
    public $total;
    public $meta;
    public $comuna;
    public $region;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $orden, $productos, $total, $meta, $comuna, $region)
    {
        $this->user = $user;
        $this->orden = $orden;
        $this->productos = $productos;
        $this->total = $total;
        $this->meta = $meta;
        $this->comuna = $comuna;
        $this->region = $region;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.compra.usuario')
                    ->from('ventas@mysplantaschillan.cl', 'MyS Plantas y Suculentas Chillán')
                    ->to($this->user->email, $this->user->name)
                    ->subject('Su compra se ha realizado con exito!');
                    
    }
}
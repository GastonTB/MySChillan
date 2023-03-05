<?php

namespace App\Mail;

use App\Models\OrdenCompra;
use App\Models\User;
use App\Models\Producto;
use App\Models\UserMetadata;
use App\Models\Comuna;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioMailUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $ordenCompra;
    public $user;
    public $productos;
    public $total;
    public $meta;
    public $comuna;
    public $region;
    public $id_compra;
    public $codigo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrdenCompra $ordenCompra, User $user, $productos, $total, UserMetadata $meta, Comuna $comuna, Region $region, $id_compra, $codigo)
    {
        $this->ordenCompra = $ordenCompra;
        $this->user = $user;
        $this->productos = $productos;
        $this->total = $total;
        $this->meta = $meta;
        $this->comuna = $comuna;
        $this->region = $region;
        $this->id_compra = $id_compra;
        $this->codigo = $codigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.compra.envio')
                    ->to($this->user->email, $this->user->name)
                    ->subject('Confirmación de Compra')
                    ->with([
                        'user' => $this->ordenCompra,
                        'orden' => $this->user,
                        'productos' => $this->productos,
                        'total' => $this->total,
                        'meta' => $this->meta,
                        'comuna' => $this->comuna,
                        'region' => $this->region,
                        'id_compra' => $this->id_compra,
                        'codigo' => $this->codigo,
                    ]);
    }
}
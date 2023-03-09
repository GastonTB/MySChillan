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

class RetiroMailUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $ordenCompra;
    public $user;
    public $productos;
    public $total;
    public $meta;
    public $id_compra;

    public $correo;

    public $telefono;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrdenCompra $ordenCompra, User $user, $productos, $total, UserMetadata $meta,$id_compra, $correo, $telefono)
    {
        $this->ordenCompra = $ordenCompra;
        $this->user = $user;
        $this->productos = $productos;
        $this->total = $total;
        $this->meta = $meta;

        $this->id_compra = $id_compra;
        $this->correo = $correo;
        $this->telefono = $telefono;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.compra.retiro')
                    ->to($this->user->email, $this->user->name)
                    ->subject('Su pedido ha sido retirado')
                    ->with([
                        'user' => $this->ordenCompra,
                        'orden' => $this->user,
                        'productos' => $this->productos,
                        'total' => $this->total,
                        'meta' => $this->meta,
                        'telefono' => $this->telefono,
                        'correo' => $this->correo,
                        'id_compra' => $this->id_compra,
                    ]);
    }
}
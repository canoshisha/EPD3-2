<?php

namespace App\Mail;

use App\Models\Address;
use App\Models\CreditCard;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $ticket;
    public $user;
    public $creditCard;
    public $address;

    public function __construct(User $user,Order $order, Ticket $ticket,CreditCard $creditCard , Address $address)
    {
        $this->user = $user;
        $this->order = $order;
        $this->ticket = $ticket;
        $this->creditCard = $creditCard;
        $this->address = $address;
    }

    public function build()
    {
        return $this->view('emails.order-confirmation')
                    ->with([
                        'user'=>$this->user,
                        'order' => $this->order,
                        'ticket' => $this->ticket,
                    ]);
    }
}
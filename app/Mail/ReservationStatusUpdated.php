<?php

namespace App\Mail;

use App\Models\ReservationPlace;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $reservationPlace;
    public $status;

    /**
     * Create a new message instance.
     *
     * @param ReservationPlace $reservationPlace
     * @param string $status
     * @return void
     */
    public function __construct(ReservationPlace $reservationPlace, $status)
    {
        $this->reservationPlace = $reservationPlace;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Estado de tu reserva')
                    ->view('emails.reservation_status'); 
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;

class KontrakanBuniEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        // return $this->view('view.name');
        return $this->from('abdurrahmangrahadimaulana@gmail.com')
                   ->view('mail')
                   ->with(
                    [
                        'name' => 'Hadoy',
                        'website' => 'www.kontrakanbuni.com',
                        'message' => 'saya mau pesen kamar bisa?',
                        // 'name' => $request->name,
                        // 'email' => $request->email,
                        // 'message' => $request->message,
                    ]);
                    // ->attach(public_path('/hubungkan-ke-lokasi-file').'/demo.jpg', [
                    //   'as' => 'demo.jpg',
                    //   'mime' => 'image/jpeg',
                    // ]);
    }
}

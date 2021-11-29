<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;

class KontrakanBuniEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // dd($data);
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this
                    ->view('mail')
                    ->with('data', $this->data);
                    // ->from('abdurrahmangrahadimaulana@gmail.com', 'Example')
                    // ->with([
                    //     'name' => $this->name,
                    //     'email' => $this->email,
                    //     'subject' => $this->subject,
                    //     'message' => $this->message,
                    // ]);
        // return $this->from('abdurrahmangrahadimaulana@gmail.com')
        //            ->view('mail')
        //            ->with(
        //             [
        //                 'name' => 'Hadoy',
        //                 'website' => 'www.kontrakanbuni.com',
        //                 'message' => 'saya mau pesen kamar bisa?',
                        // 'name' => $request->name,
                        // 'email' => $request->email,
                        // 'message' => $request->message,
                    // ]);
                    // ->attach(public_path('/hubungkan-ke-lokasi-file').'/demo.jpg', [
                    //   'as' => 'demo.jpg',
                    //   'mime' => 'image/jpeg',
                    // ]);
    }
}

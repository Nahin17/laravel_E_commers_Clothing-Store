<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#notifable edited user.php theke ansi
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    // use noti..... aita o user.php theke ansi
    use Notifiable;
}

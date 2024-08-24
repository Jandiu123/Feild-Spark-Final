<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedAppointment extends Model
{
    use HasFactory;

    // Specify which fields are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'date',
        'time',
        'instructor_id',
        // Add other fields as necessary
    ];

    // Optionally, you can specify any relationships or additional methods here
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}

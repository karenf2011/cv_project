<?php

namespace App\Models;

class UserModel extends Model
{
    // Name of the table
    protected static $table = "users";

    // Max number of records when fetching all records from table
    protected static $limit;

    // Non writable fields
    protected static $guarded = [
        'id',
        'updated',
        'deleted',
        'updated_by',
        'deleted_by',
    ];
}
<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * UserTypes Class
 */
class UserType extends Model
{
    use HasFactory;

    /** vendor type for users */

    const VENDOR_TYPE = 'vendor';

    /** buyer typer for users  */
    const BUYER_TYPE = 'buyer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description'
    ];
}

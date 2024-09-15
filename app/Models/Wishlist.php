<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    public $timestamps = false;
    protected $guarded = [];
    protected $fillable = ['userID', 'courseId','title','namelocation','universityname','programmename','ranking','level','courseranking','tuitionfee','location','IELTSTOFELRequirement','GREGMATSATRequirement','Applicationopen','ApplicationDeadline','URL'];
}

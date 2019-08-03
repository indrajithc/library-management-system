<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{


    protected $fillable = [
        
			"category",

			"shelf",

			"book_id",

			"name",
			"author",

			"edition",

			"description" 
   ];
}



    
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_book extends Model
{
   
    protected $fillable = [
        
			"student",

			"book",

			"days",

			"description"
			 
   ];
}

            
       
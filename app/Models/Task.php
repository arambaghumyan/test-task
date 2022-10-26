<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function status() {
    	switch ($this->status) {
    		case 'accepted':
    			return 'Принято';
    			break;
			case 'declined':
				return 'Отклонено';
				break;
    		
    		default:
    			return 'В ожидании';
    			break;
    	}
    }

    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\APIModels\APIComentario;

class CommentController extends Controller
{
    public function __construct(APIComentario $comment)
	{
		$this->comment = $comment;
	}

    public function read(Request $request)
    {   
        $data['_id'] = $request->_id;
        $result = $this->comment->read(['json' => $data]);
        
        return response()->json($result);
    }
}

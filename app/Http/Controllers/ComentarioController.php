<?php
namespace App\Http\Controllers;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ComentarioController extends Controller
{
public function store(Request $request)
{
$this->validate($request, [
'body' => 'required'
]);
$comentario = new Comentario();
$user = Auth::user();
$comentario->user_id = $user->id;
$comentario->body = $request->input('body');
$comentario->video_id = $request->input('video_id');
$comentario->save();
return redirect()->route('videos.show', $comentario->video_id)
->with(array('message' => 'Comentario publicado correctamente'));
}
}

<hr/>
<h4>Comentarios</h4>
<hr/>
@if(isset($comentarios))
<div id="comments-list">
@foreach($comentarios as $comment)
<div class="comment-item col-md-12 pull-left">
<div class="panel panel-default comment-data">
<div class="panel-heading">
<div class="panel-title">
{{-- {{$comment}} --}}
<strong>{{ $comment->name }}</strong> {{ $comment->created_at}}
</div>
</div>
<div class="panel-body">
{{$comment->body}}
</div>
</div>
</div>
@endforeach
</div>
@endif
@if(Auth::check())
<form class="col-md-4" method="post" action="{{ route('comentarios.store') }}">
{!! csrf_field() !!}
<input type="hidden" name="video_id" value="{{$video->id}}" required>
<p>
<textarea class="form-control text-area" name="body" required ></textarea>
</p>
<input type="submit" value="Comentar" class="btn btn-success">
</form>
<div class="clearfix"></div>
<hr/>
@endif

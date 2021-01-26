<h1>posts guest</h1>
@foreach ($posts as $post)
<p>{{$post->id}}</p>
<p>{{$post->author}}</p>
<p>{{$post->title}}</p>
<p>{{$post->slug}}</p>
<p>{{$post->date}}</p>
<p>{{$post->text}}</p>

@endforeach

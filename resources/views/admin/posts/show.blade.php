<dt>Categoria</dt>
<dd>{{ $post->category ? $post->category->name : '-' }}</dd>
</dl>
<a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
class="btn btn-warning">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg> Modifica
</a>
<form class="d-inline-block" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Elimina
</button>
</form>
</div>
</div>
</div>
@endsection

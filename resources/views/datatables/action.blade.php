@if(isset($view_url))
<a uk-icon="icon: pencil"
   href="{{ $view_url }}"></i>
</a>
@endif
@if(isset($edit_url))
<a uk-icon="icon: pencil"
   href="{{ $edit_url }}">
</a>
@endif
@if(isset($delete_url))
<a uk-icon="icon: trash"
   href="{{ $delete_url }}"
   data-method="delete"
   data-confirm="Anda yakin menghapus data ini?">
</a>
@endif
@if(isset($download_url))
<a uk-icon="icon: download"
   href="{{ $download_url }}" target="_blank" data-method="post">
</a>
@endif



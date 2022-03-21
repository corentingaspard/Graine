<a href="/graine/create">
    <button>Création graine</button>
</a>
<script>
    function exportTasks(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
</script>
<table>
    <tr>
        <td>id</td>
        <td>nom </td>
        <td>famille </td>
        <td>période de plantation</td>
        <td>période de récolte</td>
        <td>conseils de jardinage</td>
        <td>visuel</td>
        <td>quantité</td>
    </tr>
@foreach($graines -> all() as $g)
    <tr>
    <td>
       <a href="/graine/{{$g->id}}"><button>{{$g->id}}</button></a>
    </td>
    <td>
        <p>{{$g ->nom}}</p>
    </td>
    <td>
        <p>{{$g->famille}}</p>
    </td>
    <td>
        <p>{{$g->periode_plantation}} </p>
    </td>
    <td>
        <p>{{ $g->periode_recolte}}</p>
    </td>
    <td>
       <p>{{$g->conseil}}</p>
    </td>
    <td>
        <img src="{{$g->visuel}}" width="50" height="50">
    </td>
    <td>
        <p>{{ $g->quantite}}</p>
    </td>
</tr>
@endforeach
</table>
<button data-href="/graine" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</button>

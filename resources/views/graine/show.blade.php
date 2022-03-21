<div>
    <p><strong>nom : </strong>{{$graine ->nom}}</p>
</div>
<div>
    <p><strong>famille : </strong>{{$graine->famille}}</p>
</div>
<div>
    <p><strong>Periode de plantation : </strong>{{$graine ->periode_plantation}} </p>
</div>
<div>
    <p><strong>Periode de Recolte:</strong>{{ $graine->periode_recolte}}</p>
</div>
<div>
    <p><strong>Conseil :</strong>{{ $graine->conseil}}</p>
</div>
<div>
    <p><strong>Visuel :</strong><img src="{{$graine->visuel}}" width="50" height="50"></p>
</div>
<div>
    <p><strong>Quantite :</strong>{{ $graine->quantite}}</p>
</div>
<div>
    <p><strong>cree le :</strong>{{  $graine->created_at}}</p>
</div>
<div>
    <p><strong>modifier le :</strong>{{ $graine->updated_at}}</p>
</div>
    <form action="{{route('graine.destroy',$graine->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <p><strong>Supprimer la graine :</strong></p>
            <button type="submit" name="delete" value="valide">Valide</button>
            <button type="submit" name="delete" value="annule">Annule</button>
        </div>
    </form>
    <div>
        <a href="{{route('graine.index')}}"><button>Retour à la liste</button></a>
    </div>

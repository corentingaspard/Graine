{{--
   messages d'erreurs dans la saisie du formulaire.
--}}
<a href="/graine">
    <button>Retour liste Graines</button>
</a>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
     formulaire de saisie d'une tâche
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}

<form action="{{route('graine.store')}}" method="post">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'une graine</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        <label for="nom"><strong>Nom de la graine : </strong></label>
        <input type="text" name="nom" id="nom"
               value="{{ old('nom') }}">
    </div>
    <div>
        {{-- la catégorie  --}}
        <label for="famille"><strong>Famille :</strong></label>
        <input type="text" class="form-control" id="famille" name="famille"
               value="{{ old('famille') }}">
    </div>
    <div>
        <label for="periode_plantation"><strong>periode plantation :</strong></label>
        <input type="text" class="form-control" id="periode_plantation" name="periode_plantation"
               value="{{ old('periode_plantation') }}">
    </div>
    <div>
        <label for="periode_recolte"><strong>periode recolte :</strong></label>
        <input type="text" class="form-control" id="periode_recolte" name="periode_recolte"
               value="{{ old('periode_recolte') }}">
    </div>
    <div>
        <label for="conseil"><strong>Conseil :</strong></label>
        <input type="text" class="form-control" id="conseil" name="conseil"
               value="{{ old('conseil') }}">
    </div>
    <div>
        <label for="visuel"><strong>Visuel (lien image) :</strong></label>
        <input type="text" class="form-control" id="visuel" name="visuel"
               value="{{ old('visuel') }}">
    </div>
    <div>
        <label for="quantite"><strong>Quantité :</strong></label>
        <input type="number" class="form-control" id="quantite" name="quantite"
               value="{{ old('quantite') }}">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>

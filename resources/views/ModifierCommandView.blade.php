<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Commande</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1>Modifier une Commande</h1>
        <form action="{{ route('showcommande', $commande->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_commande">ID commande:</label>
                <input type="number" class="form-control" name="id_commande" value="{{ $commande->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="date_commande">Date commande:</label>
                <input type="date" class="form-control" name="date_commande" value="{{ $commande->date_commande }}">
            </div>
            <div class="form-group">

                @php $count = 0; @endphp
                <div class="checkbox-row">
                    <label>Produits: </label>
                    @foreach($produits as $produit)
                    @if($count % 4 == 0)
                </div>
                <div class="checkbox-row">
                    @endif
                    @php $count++; @endphp
                    <div class="checkbox-container">
                        <input type="checkbox" id="checkbox{{ $produit->id }}">
                        <label class="checkbox-label" for="checkbox{{ $produit->id }}">{{ $produit->nom }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="id_commande">Prix total:</label>
                <input type="number" class="form-control" name="prix_total" value="{{ $commande->prix_total }}">

            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
    </div>

    
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
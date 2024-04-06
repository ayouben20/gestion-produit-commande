<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 style="display: inline-block;">Liste des Commandes</h1>
        <div style="float: right;">
            <a href="{{ route('commander') }}" class="btn btn-success">Nouvelle Commande</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="light-green">Commande ID</th>
                    <th class="light-green">Date commande</th>
                    <th class="light-green">Nombre de produits</th>
                    <th class="light-green">Prix total</th>
                    <th class="light-green">Opérations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->date_commande }}</td>
                    @foreach($)
                    <td></td>
                    <td>{{ $commande->prix_total }}</td>
                    <td>
                    <div class="d-flex justify-content-around">
    <div>
        <a href="{{ route('commande.supprimer', $commande->id) }}" class="btn btn-danger">Supprimer</a>
    </div>
    <div>
        <a href="{{ route('modifier.commande', $commande->id) }}" class="btn btn-primary">Modifier</a>
    </div>
</div>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

    </div>

    <div class="container">
        <h2 class="text-center">Commande Produits</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="light-green">Commande ID</th>
                    <th class="light-green">Produit ID</th>
                    <th class="light-green">Quantité</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandeProduits as $commandeProduit)
                <tr>
                    <td>{{ $commandeProduit->commande_id }}</td>
                    <td>{{ $commandeProduit->produit_id }}</td>
                    <td>{{ $commandeProduit->quantite }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
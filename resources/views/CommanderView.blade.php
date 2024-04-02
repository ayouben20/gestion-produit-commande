<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            width: 75%;
            max-width: 1000px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-top: 60px;
            margin-bottom: 3cm;
        }

        h1,
        h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .table th,
        .table td {
            padding: 0.3rem;
            font-size: 14px;
        }

        .btn-success {
            width: 100%;
            font-size: 14px;
        }

        .alert {
            margin-top: 10px;
            font-size: 14px;
        }

        .table-green {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .table-green th,
        .table-green td {
            color: #155724;
        }

        .table-green th {
            background-color: #c3e6cb;
            border-color: #b1dfbb;
        }

        .table-green-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nouvelle Commande</h1>
        <form action="{{ route('commande.process') }}" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Ajouter</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->prix }}€</td>
                            <td><input type="number" name="quantite[{{ $produit->id }}]" class="form-control" value="1" min="1"></td>
                            <td><input type="checkbox" name="ajouter[]" value="{{ $produit->id }}"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success">Commander</button>
        </form>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

    <div class="container">
        <h2>Commande Produits</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Commande ID</th>
                    <th>Produit ID</th>
                    <th>Quantité</th>
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

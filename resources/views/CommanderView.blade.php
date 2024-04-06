<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
   
   <div class="container">
   <h1 style="display: inline-block;">Nouvelle Commande</h1>
            <div style="float: right;">
                <a href="{{ route('showcommande') }}" class="btn btn-success">Afficher les Commandes</a> 
            </div>
        <div class="row">
            <div class="col-md-9">
                <form action="{{ route('commande.process') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="light-green">Nom</th>
                                    <th class="light-green">Description</th>
                                    <th class="light-green">Prix</th>
                                    <th class="light-green">Quantité</th>
                                    <th class="light-green">Ajouter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produits as $produit)
                                <tr>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->description }}</td>
                                    <td>{{ $produit->prix }}€</td>
                                    <td><input type="number" name="quantite[{{ $produit->id }}]" class="form-control quantite" value="1" min="1"></td>
                                    <td>
                                        <input type="checkbox" name="ajouter[]" value="{{ $produit->id }}" class="produit-checkbox" data-nom="{{ $produit->nom }}"></td>
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
            <div class="col-md-3">  
            <div id="panier">
                    <h2>Panier</h2>
                    <ul id="panier-list">
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

$(document).ready(function() {
            $('.produit-checkbox').change(function() {
                updatePanier();
            });

            $('.quantite').on('input', function() {
                updatePanier();
            });

            function updatePanier() {
                $('#panier-list').empty();
                $('.produit-checkbox:checked').each(function() {
                    var nom = $(this).data('nom');
                    var quantity = $(this).closest('tr').find('.quantite').val();
                    $('#panier-list').append('<li>' + nom + ' (Quantité: ' + quantity + ')</li>');
                });
            }
        });
    </script>
  
</body>

</html>


@extends ('sommaire')
    @section('contenu1')
    <h1>Liste des visiteurs</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>prenom</th>
                <th>adresse</th>
                <th>ville</th>
                <th>date d'embauche</th>
                <!-- ... autres colonnes -->
            </tr>
        </thead>
        <tbody>
            @foreach($visiteurs as $visitor)
                <tr>
                    <td>{{ $visitor['nom'] }}</td>
                    <td>{{ $visitor['prenom'] }}</td>
                    <td>{{ $visitor['adresse'] }}</td>
                    <td>{{ $visitor['ville'] }}</td>
                    <td>{{ $visitor['dateEmbauche'] }}</td>
                    <!-- ... autres données -->
                </tr>
            @endforeach
        </tbody>
    </table>
  @endsection 
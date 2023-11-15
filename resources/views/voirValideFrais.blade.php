@extends ('sommaire')
@section('contenu1')

<h3>Fiche de frais : </h3>
<div class="encadre">
  	<table class="listeLegere">
             <tr>
                <th class=''> Id:</th>  
                <th class=''> ETP</th>  
                <th class=''> KM </th>   
                <th class=''> NUI </th> 
                <th class=''> REP</th> 
           
             </tr>
               @foreach ( $frais as $unMontant )
            <tr>
              
              <td><?=$unMontant['idVisiteur']?></td>
              <td><?=$unMontant['ETP']?></td>
              <td><?=$unMontant['KM']?></td>
              <td><?=$unMontant['NUI']?></td>
              <td><?=$unMontant['REP']?></td>
           </tr>
           @endforeach
          
    </table>
  </div>
@endsection
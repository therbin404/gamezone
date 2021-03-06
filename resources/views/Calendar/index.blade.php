@extends('layouts.app')

@section('title', 'Tous les utilisateurs')

@section('content')

<div class="calendar-page">

<section class="header-bottom">
        <h1>GAME ZONE</h1>
        <p>Le calendrier</p>
    </section>

<div class="calendarContainer">
  <div class="calendar">
    <h2>DATE DU JOUR</h2>
    <table>
      <th>L</th>
      <th>M</th>
      <th>M</th>
      <th>J</th>
      <th>V</th>
      <th>S</th>
      <th>D</th>
      <tr>
        @for ($j = 0; $j < $monthOffset; $j++) <!-- On ajoute autant de case que necessaire pour combler la première semaine -->
        <td>
        </td>
        @endfor
        @for ($i = 0; $i < $days; $i++)
          @if ($i+1 == $firstTuesday) <!-- Si on est sur la case du premier mardi du mois -->
            <td class="closed">
              {{ $i+1 }}
            </td>
          @else
            @if (date('l', $first_day_timestamp+86400*$i) === 'Monday') <!-- Si on arrive à un Lundi, on change de ligne -->
              </tr>
              <tr>
            @endif
            @if (date('l', $first_day_timestamp+86400*$i) === 'Friday' || date('l', $first_day_timestamp+86400*$i) === 'Saturday') <!-- Si le jour est Vendredi ou Samedi -->
              <td class="byNight">
                {{ $i+1 }}
              </td>
            @else
              @if ($i+1 == $lastSunday)<!-- Si on arrive au dernier dimanche du mois -->
                <td class="special">
                  {{ $i+1 }}
                </td>
              @else <!-- Un jour normal -->
                <td class="ordinary">
                  {{ $i+1 }}
                </td>
              @endif
            @endif
          @endif
        @endfor
      </tr>
    </table>
  </div>
  <div class="day-open">
    <div class="day">
      <div class="square-close"></div>
      <p>Fermé</p>
    </div>
    <div class="day">
      <div class="square-open"></div>
      <p>Ouvert</p>
    </div>
    <div class="day">
      <div class="square-special"></div>
      <p>Journée spéciale</p>
    </div>
    <div class="day">
      <div class="square-night"></div>
      <p>Nocturne</p>
    </div>
  </div>

  <div class="days-special">
    <div class="day-special">
      <h3>Journée spéciale</h3>
      <p>Venez vivre une journée remplie d'evènements spéciaux, rien que pour vous !<br>
      Tous les derniers dimanches du mois !</p>
    </div>
    <div class="day-special">
      <h3>Nocturne</h3>
      <p>Profitez encore plus de votre journée !<br>
      Tous les Vendredi et Samedi, votre parc ferme plus tard !</p>
    </div>
  </div>
  <h2>Préparer sa visite</h2>
  <div class="preparation">
    <div>
      <p><a href="" title="Se rendre au parc">Se rendre au parc</a></p>
    </div>
    <div>
      <p><a href="{{ route('pricelist') }}">Tarif et billetterie</a></p>
    </div>
  </div>
</div>
</div>

@endsection
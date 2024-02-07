<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Time Table</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Alegreya:wght@900&family=Passion+One:wght@700&family=Roboto:ital,wght@1,900&family=Tourney:ital,wght@1,100&display=swap');

    body {
      margin: 0;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: auto;
      gap: 0px;
      padding: 0px;
      height: 100vh;
    }


    .grid-item {
                                             
      padding: 0px;
      margin: 0px;
      text-align: center;
    }

    .container-1,
    .container-4 {
      grid-row: span 4;
    }

    .slider-container {
      grid-column: 2 / span 2;
      grid-row: 4 / span 4;

    }

    .container-6 {
      grid-column: 2 / span 2;
      grid-row: 5;
    }

    .container-5,
    .container-7 {
      grid-row: 5;
    }

    .container-2 .container-3 {
      grid-column: 2 / span 2;
      grid-row: 1;
      height: 10px;
    }

    .slider-container {
      grid-column: 2 / span 2;
     
      grid-row: 2;
      

    }

    .container-6 {
      grid-column: 2 / span 2;
      
    }

    .slider {
      position: relative;
      overflow: hidden;

    }

    .slider-image {
      width: 100%;
      border-radius: 20px;
      display: none;
    }

    .slider-image:first-child {
      display: block;
    }

    thead {

      color: #fff;

    }

    tbody {
      color: #fff;
    }

    table {
      border-spacing: 15px;
    }

    
    table {
      font-size: 1vw;
     
    }

    
    table {
      width: 100%;
      table-layout: fixed;
    }

    
    th,
    td {
      text-align: center;
      padding: 0px;
      word-wrap: break-word;
    }

    th.heading {
      font-size: 1.3em;
    }

    .container-1,
    .container-2,
    .container-3,
    .container-4,
    .container-5,
    .container-6,
    .container-7 {
      border-radius: 20px;
      overflow: hidden;
    }

    .heading-title {
      color: white;
      text-align: end;
      padding-right: 20px;
      font-size: 25px;
    }

    .grid-item.container-1 {
      margin-right: 2px;
    }

    .grid-item.container-4 {
      margin-left: 2px;
    }

    .grid-item.container-5 {
      margin-right: 2px;
    }

    .grid-item.container-7.slider-container-2 {

      margin-left: 2px;
    }

    .grid-item.container-6 {
      margin-top: 1px;
    }

    .carousel-item.active {
      margin-top: 2px;
    }

    .grid-item.container-5 {
      margin-top: 1px;
    }

    .grid-item.container-7 {
      margin-top: 1px;
    }

    img.slider-image.d-block.rounded-4.w-100.imag {
      width: 100%;
      height: 84vh;
    }
/* For screens larger than 768px */
@media (min-width: 769px) {
  .container-3 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 100%; 
  }

  .clock {
    margin: auto; 
  }
}



/* For smaller screens */
@media (max-width: 768px) {
  .container-2 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-size: 14px; 
  }
}

/* For larger screens */
@media (min-width: 769px) {
  .container-2 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-size: 15px; 
}
#timeUntilNextJamat {
  margin-top: auto;
  margin-bottom: auto;
  padding-top: 5%;
  padding-bottom: 5%;
  font-size: 20px;
   font-weight: bold;
}
div#timeUntilNextJamat {
    color: white;

}

  </style>
</head>

<body>
@php
    $colors = explode(',', $side->theme ?? ''); 
    
    
    if(count($colors) >= 2) {
        $color1 = sscanf($colors[0], "#%02x%02x%02x");
        $color2 = sscanf($colors[1], "#%02x%02x%02x");

        if(count($color1) === 3 && count($color2) === 3) {
            $gradient = "linear-gradient(to right, rgb($color1[0], $color1[1], $color1[2]), rgb($color2[0], $color2[1], $color2[2]))";
        } else {
            $gradient = ''; // Set a default value if color conversion fails
        }
    } else {
        $gradient = ''; // Set a default value if colors array doesn't have two elements
    }
@endphp
    
    
  <div class="grid-container">
    <div class="grid-item container-1"
      style="background-image: url('/images/{{$side->image_name}}'); background-size: cover;">
      <h1 style="font-size: 1.7em;" class="heading-title">NAMAZ TIMING</h1>
      <table style="height: 80%;margin-left: auto;margin-right: 20px;">
        <thead>
          <tr style="font-size: 1.3em;">
            <th></th>
            <th class="heading">START TIME</th>
            <th class="heading">JAMAT TIME</th>
          </tr>
        </thead>
        <tbody>
          <tr style="font-size: 1.4em;">
            <td>FAJAR</td>
            <td>{{\Carbon\Carbon::parse($prayer->fajar_start)->format('h:i A')}}</td>
            <td>{{\Carbon\Carbon::parse($prayer->fajar_jamat)->format('h:i A')}}</td>
          </tr>
            @if ($prayer)
          <tr style="font-size: 1.4em;">
            <td>ZUHR</td>
            <td>{{\Carbon\Carbon::parse($prayer->zuhr_start)->format('h:i A')}}</td>
            <td>{{\Carbon\Carbon::parse($prayer->zuhr_jamat)->format('h:i A')}}</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ASR</td>
            <td>{{\Carbon\Carbon::parse($prayer->asr_start)->format('h:i A')}}</td>
            <td>{{\Carbon\Carbon::parse($prayer->asr_jamat)->format('h:i A')}}</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>MAGHRIB</td>
            <td>{{\Carbon\Carbon::parse($prayer->maghrib_start)->format('h:i A')}}</td>
            <td>{{\Carbon\Carbon::parse($prayer->maghrib_jamat)->format('h:i A')}}</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ISHA</td>
            <td>{{\Carbon\Carbon::parse($prayer->isha_start)->format('h:i A')}}</td>
            <td>{{\Carbon\Carbon::parse($prayer->Isha_jamat)->format('h:i A')}}</td>
            
          </tr>
          @else
          <tr style="font-size: 1.4em;">
            <td>FAJAR</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ZUHR</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ASR</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>MAGHRIB</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ISHA</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          @endif
        </tbody>

      </table>
    </div>
   <div class="grid-item container-2" style="background: {{ $gradient }};">
  <h1 style="color: white;">{{ \App\Models\Centre::where('id', $centre_id)->value('centre_name') }}</h1>
</div>
    <div class="grid-item slider-container slider-container-1">
        <div class="slider">
            @if($slider && count($slider) > 0)
                @foreach($slider as $slide)
                    <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                        <img src="/images/{{$slide->image_name}}" class="slider-image d-block rounded-4 w-100 imag"alt="Slide{{ $loop->index }}">
                    </div>
                @endforeach
            @else
              <img src="{{asset('images/slider.jpeg')}}" class="slider-image d-block rounded-4 w-100 imag" alt="">
            @endif
        </div>
    </div>

   <div class="grid-item container-3" style="background: {{ $gradient }};">
  <h1 style="color: white; text-align: center; font-size: 3.1rem; ">
    <div id="MyClockDisplay" class="clock"></div>
  </h1>
</div>

    <div class="grid-item container-4"
      style="background-image: url('/images/{{$side->image_name}}'); background-size: cover;">

      <table style="height: 90%;margin-left: auto;margin-right: auto;padding-top: 80px;">
        <tbody>
            @php
                $date = $hijri_date->date;
                $month = $hijri_date->month;                
            @endphp
            
            @if($prayer)
          
            <thead>
          <tr style="font-size: 1.2em;">
            <th></th>
            <th class="heading">{{ $date }} {{ $month}} <br> 1445</th>
            <th class="heading">{{$eng_date}}<br>{{ $year }}</th>
          </tr>
        </thead>
         
          <tr style="font-size: 1.4em;">
            <td>SUN RISE</td>
            <td>{{ \Carbon\Carbon::parse($prayer->sun_rise)->format('h:i A') }}</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ISHRAQ/<br>CHASHT</td>
            <td>{{ \Carbon\Carbon::parse($prayer->chaasht)->format('h:i A') }}</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ZAWAL</td>
            <td>{{ \Carbon\Carbon::parse($prayer->zawal)->format('h:i A') }} </td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>JUMMUA</td>
            <td>{{ \Carbon\Carbon::parse($prayer->jumua)->format('h:i A') }}</td>
            <td>{{ \Carbon\Carbon::parse($prayer->jumah_azan)->format('h:i A') }}</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>IJTIMA</td>
            <td>{{ \Carbon\Carbon::parse($prayer->jumma_ijtimah)->format('h:i A') }}</td>
          </tr>
          @else
          <tr style="font-size: 1.4em;">
            <td>FAJAR</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ZUHR</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ASR</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>MAGHRIB</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          <tr style="font-size: 1.4em;">
            <td>ISHA</td>
            <td>00:00:00</td>
            <td>00:00:00</td>
          </tr>
          @endif
        </tbody>

      </table>
    </div>
    <div class="grid-item container-5" style="background: {{ $gradient }};">
      <h1 style="color: white; font-size: 3rem; margin-top: -1rem;" id="timeUntilNextJamat"></h1>
    </div>
    <div class="grid-item container-6" style="background: {{ $gradient }};">
      @foreach ($new as $news)
      <marquee>
        <h1 style="color: #fff; font-size: 2.9rem; margin-top: 0.7rem;">{{$news->newi}} {{$news->newii}} {{$news->newiii}} {{$news->newiv}} {{$news->newv}}
        </h1>
      </marquee>
      @endforeach
    </div>
    
    <div class="grid-item container-7 slider-container-2" style="background: {{ $gradient }};">
      <div class="slider">
        @foreach($logos as $logo)
        <div class="slider-image">
          <img src="/logos/{{$logo->image_name}}" height="80px" alt="Slide{{ $loop->index }}">
        </div>
        @endforeach
      </div>
    </div>

    <script>
      const images1 = document.querySelectorAll('.slider-container-1 .slider-image');
      let index1 = 0;

      function changeImage1() {
        images1.forEach(image => image.style.display = 'none');
        index1 = (index1 + 1) % images1.length;
        images1[index1].style.display = 'block';
      }

      changeImage1(); 
      setInterval(changeImage1, 3000); 

      const images2 = document.querySelectorAll('.slider-container-2 .slider-image');
      let index2 = 0;

      function changeImage2() {
        images2.forEach(image => image.style.display = 'none');
        index2 = (index2 + 1) % images2.length;
        images2[index2].style.display = 'block';
      }

      changeImage2(); 
      setInterval(changeImage2, 3000); 

    </script>
  <script>
    var prayerTimes = {
        'Fajar': '@isset($prayer){{ $prayer->fajar_jamat }}@else{{ '00:00' }}@endisset',
        'ZOHAR': '@isset($prayer){{ $prayer->zuhr_jamat }}@else{{ '00:00' }}@endisset',
        'ASR': '@isset($prayer){{ $prayer->asr_jamat }}@else{{ '00:00' }}@endisset',
        'MAGHRIB': '@isset($prayer){{ $prayer->maghrib_jamat }}@else{{ '00:00' }}@endisset',
        'ISHA': '@isset($prayer){{ $prayer->Isha_jamat }}@else{{ '00:00' }}@endisset'
    };
function calculateTimeRemaining() {
    var currentTime = new Date();

    var nextJamat = getNextJamat(currentTime);

    if (!nextJamat || nextJamat.time.getTime() === Infinity) {
        // No valid prayer time found
        console.log("No valid prayer time found");
        document.getElementById("timeUntilNextJamat").innerText = "--:--:--";
        return;
    }

    var timeDifference = nextJamat.time - currentTime;

    if (timeDifference < 0) {
        currentTime = new Date();
        nextJamat = getNextJamat(currentTime);
        timeDifference = nextJamat.time - currentTime;
    }

    var hours = Math.floor(timeDifference / (1000 * 60 * 60));
    var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

    console.log("Hours: " + hours + ", Minutes: " + minutes + ", Seconds: " + seconds);

    var timeRemaining = hours + ":" + minutes + ":" + seconds;
  var displayText = "<span style='font-size: 25px; font-weight: bold;'>" + timeRemaining + "</span>" +
                  "<span style='font-size: 25px;'>  until " + nextJamat.prayerName + " jamat</span>";
document.getElementById("timeUntilNextJamat").innerHTML = displayText;


    setTimeout(calculateTimeRemaining, 1000);
}

function getNextJamat(currentTime) {
    var ishaTime = new Date(currentTime.toDateString() + ' ' + prayerTimes['ISHA']);

    if (currentTime > ishaTime) {
        var nextFajrTime = new Date(currentTime);
        nextFajrTime.setDate(currentTime.getDate() + 1); 
        nextFajrTime.setHours(0, 0, 0);
        var fajrTime = new Date(nextFajrTime.toDateString() + ' ' + prayerTimes['Fajar']);

        return { time: fajrTime, prayerName: 'Fajr' };
    }

    var nextJamatTime = new Date(8640000000000000);
    var nextJamatName = '';

    for (var prayer in prayerTimes) {
        var prayerTime = new Date(currentTime.toDateString() + ' ' + prayerTimes[prayer]);
        if (prayerTime > currentTime && prayerTime < nextJamatTime) {
            nextJamatTime = prayerTime;
            nextJamatName = prayer;
        }
    }

    if (nextJamatName === '') {
        return null;
    }

    return { time: nextJamatTime, prayerName: nextJamatName };
}

calculateTimeRemaining();

</script>

    <script>
      function showTime() {
        var date = new Date();
        var h = date.getHours(); 
        var m = date.getMinutes(); 
        var s = date.getSeconds(); 
        var session = "AM";

        if (h == 0) {
          h = 12;
        }

        if (h > 12) {
          h = h - 12;
          session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);

      }

      showTime();
    </script>
</body>

</html>
<div class="chartWrapper_for_archive md:mx-0 mx-auto">
    <canvas id="chartCharactersPerMonth" width="400px" height="400px"></canvas>
</div>

<script>
    //月ごとの合計文字数
    // 月ごとの1日記あたりの平均文字数
    const chartCharactersPerMonth_id = document.getElementById('chartCharactersPerMonth');
    var chartCharactersPerMonth = new Chart(chartCharactersPerMonth_id, {
      type: 'line',
      data: {
          labels: [
            @foreach( $word_counts as $word_count)
              "{{$word_count['day']}}",
              @endforeach],

          datasets: [
            {
              label: '文字数推移',
              data:  [
              @foreach( $word_counts as $word_count)
              {{$word_count['value']}},
              @endforeach],
              borderColor: "rgba(75,137,150,1)",
              backgroundColor: "rgba(0,0,0,0)"
            },
          ],
        },
      options:{
          responsive: true,
          plugins:{
      
      
          legend: {
              display: false,

          }
      
        }, 
      }
    });
</script>
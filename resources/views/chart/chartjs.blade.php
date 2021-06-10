@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">
        <div class="container">
            <div class="row">   
                <div class="col-md-6">
                    <h5>Kelurahan Manggar</h5>
                    <canvas id="myChart" width="100%" style="height: 80px;"></canvas>
                </div>
                <div class="col-md-6">
                  <h5>Kelurahan Lamaru</h5>
                  <canvas id="myChart2" width="100%" style="height: 80px;"></canvas>
              </div>
              <div class="col-md-6">
                <h5>Kelurahan Manggar Baru</h5>
                <canvas id="myChart3" width="100%" style="height: 80px;"></canvas>
            </div>
            <div class="col-md-6">
              <h5>Kelurahan Teritip</h5>
              <canvas id="myChart4" width="100%" style="height: 80px;"></canvas>
          </div>
            </div>
            
          </div>
    </div>

</div>
</div>  
    
@endsection

@push('scripts')
<?php 

for ($i=1; $i <= 12; $i++) { 
    $dataManggar[$i] = implode($getdatakelurahan["Manggar"][$i], ',');
    $dataLamaru[$i] = implode($getdatakelurahan["Lamaru"][$i], ',');
    $dataManggarBaru[$i] = implode($getdatakelurahan["Manggar Baru"][$i], ',');
    $dataTeritip[$i] = implode($getdatakelurahan["Teritip"][$i], ',');
}

?>
<script>
    var ctx = document.getElementById('myChart');

const labels = {!!json_encode($namakelurahan["Manggar"])!!};
const data = {
  labels: labels,
  datasets: [{
    label: 'Januari',
    data: [{{$dataManggar[1]}}],
    backgroundColor: 'red',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Februari',
    data: [{{$dataManggar[2]}}],
    backgroundColor: 'yellow',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Maret',
    data: [{{$dataManggar[3]}}],
    backgroundColor: 'green',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'April',
    data: [{{$dataManggar[4]}}],
    backgroundColor: 'blue',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Mei',
    data: [{{$dataManggar[5]}}],
    backgroundColor: 'orange',
    borderColor: 'red',
    borderWidth: 1
  },
  {
    label: 'Juni',
    data: [{{$dataManggar[6]}}],
    backgroundColor: 'purple',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Juli',
    data: [{{$dataManggar[7]}}],
    backgroundColor: 'brown',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Agustus',
    data: [{{$dataManggar[8]}}],
    backgroundColor: 'black',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'September',
    data: [{{$dataManggar[9]}}],
    backgroundColor: 'aqua',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Oktober',
    data: [{{$dataManggar[10]}}],
    backgroundColor: 'pink',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Nopember',
    data: [{{$dataManggar[11]}}],
    backgroundColor: 'lime',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Desemberr',
    data: [{{$dataManggar[12]}}],
    backgroundColor: 'lavender',
    borderColor: 'blue',
    borderWidth: 1
  }
  ]
  
};

var myCbart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    scales: {
      x: {
        stacked: true,
      },
      y: {
        min: 0,
        max: {!!json_encode($max)!!},
        stacked: true
      }
      
    }
  },
});

//--------------Chart2----------///////

var ctx_2 = document.getElementById('myChart2');

const labels_2 = {!!json_encode($namakelurahan["Lamaru"])!!};
const data_2 = {
  labels: labels_2,
  datasets: [{
    label: 'Januari',
    data: [{{$dataLamaru[1]}}],
    backgroundColor: 'red',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Februari',
    data: [{{$dataLamaru[2]}}],
    backgroundColor: 'yellow',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Maret',
    data: [{{$dataLamaru[3]}}],
    backgroundColor: 'green',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'April',
    data: [{{$dataLamaru[4]}}],
    backgroundColor: 'blue',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Mei',
    data: [{{$dataLamaru[5]}}],
    backgroundColor: 'orange',
    borderColor: 'red',
    borderWidth: 1
  },
  {
    label: 'Juni',
    data: [{{$dataLamaru[6]}}],
    backgroundColor: 'purple',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Juli',
    data: [{{$dataLamaru[7]}}],
    backgroundColor: 'brown',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Agustus',
    data: [{{$dataLamaru[8]}}],
    backgroundColor: 'black',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'September',
    data: [{{$dataLamaru[9]}}],
    backgroundColor: 'aqua',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Oktober',
    data: [{{$dataLamaru[10]}}],
    backgroundColor: 'pink',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Nopember',
    data: [{{$dataLamaru[11]}}],
    backgroundColor: 'lime',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Desemberr',
    data: [{{$dataLamaru[12]}}],
    backgroundColor: 'lavender',
    borderColor: 'blue',
    borderWidth: 1
  }
  ]
  
};

var myCbart_2 = new Chart(ctx_2, {
  type: 'bar',
  data: data_2,
  options: {
    scales: {
      x: {
        stacked: true,
      },
      y: {
        min: 0,
        max: {!!json_encode($max)!!},
        stacked: true
      }
    }
  },
});

//--------------Chart3----------///////

var ctx_3 = document.getElementById('myChart3');

const labels_3 = {!!json_encode($namakelurahan["Manggar Baru"])!!};
const data_3 = {
  labels: labels_3,
  datasets: [{
    label: 'Januari',
    data: [{{$dataManggarBaru[1]}}],
    backgroundColor: 'red',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Februari',
    data: [{{$dataManggarBaru[2]}}],
    backgroundColor: 'yellow',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Maret',
    data: [{{$dataManggarBaru[3]}}],
    backgroundColor: 'green',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'April',
    data: [{{$dataManggarBaru[4]}}],
    backgroundColor: 'blue',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Mei',
    data: [{{$dataManggarBaru[5]}}],
    backgroundColor: 'orange',
    borderColor: 'red',
    borderWidth: 1
  },
  {
    label: 'Juni',
    data: [{{$dataManggarBaru[6]}}],
    backgroundColor: 'purple',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Juli',
    data: [{{$dataManggarBaru[7]}}],
    backgroundColor: 'brown',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Agustus',
    data: [{{$dataManggarBaru[8]}}],
    backgroundColor: 'black',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'September',
    data: [{{$dataManggarBaru[9]}}],
    backgroundColor: 'aqua',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Oktober',
    data: [{{$dataManggarBaru[10]}}],
    backgroundColor: 'pink',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Nopember',
    data: [{{$dataManggarBaru[11]}}],
    backgroundColor: 'lime',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Desemberr',
    data: [{{$dataManggarBaru[12]}}],
    backgroundColor: 'lavender',
    borderColor: 'blue',
    borderWidth: 1
  }
  ]
  
};

var myCbart_3 = new Chart(ctx_3, {
  type: 'bar',
  data: data_3,
  options: {
    scales: {
      x: {
        stacked: true,
      },
      y: {
        min: 0,
        max: {!!json_encode($max)!!},
        stacked: true
      }
    }
  },
});

//--------------Chart4----------///////

var ctx_4 = document.getElementById('myChart4');

const labels_4 = {!!json_encode($namakelurahan["Teritip"])!!};
const data_4 = {
  labels: labels_4,
  datasets: [{
    label: 'Januari',
    data: [{{$dataTeritip[1]}}],
    backgroundColor: 'red',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Februari',
    data: [{{$dataTeritip[2]}}],
    backgroundColor: 'yellow',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'Maret',
    data: [{{$dataTeritip[3]}}],
    backgroundColor: 'green',
    borderColor: 'blue',
    borderWidth: 1
  },
    {
    label: 'April',
    data: [{{$dataTeritip[4]}}],
    backgroundColor: 'blue',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Mei',
    data: [{{$dataTeritip[5]}}],
    backgroundColor: 'orange',
    borderColor: 'red',
    borderWidth: 1
  },
  {
    label: 'Juni',
    data: [{{$dataTeritip[6]}}],
    backgroundColor: 'purple',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Juli',
    data: [{{$dataTeritip[7]}}],
    backgroundColor: 'brown',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Agustus',
    data: [{{$dataTeritip[8]}}],
    backgroundColor: 'black',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'September',
    data: [{{$dataTeritip[9]}}],
    backgroundColor: 'aqua',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Oktober',
    data: [{{$dataTeritip[10]}}],
    backgroundColor: 'pink',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Nopember',
    data: [{{$dataTeritip[11]}}],
    backgroundColor: 'lime',
    borderColor: 'blue',
    borderWidth: 1
  },
  {
    label: 'Desemberr',
    data: [{{$dataTeritip[12]}}],
    backgroundColor: 'lavender',
    borderColor: 'blue',
    borderWidth: 1
  }
  ]
  
};

var myCbart_4 = new Chart(ctx_4, {
  type: 'bar',
  data: data_4,
  options: {
    scales: {
      x: {
        stacked: true,
      },
      y: {
        min: 0,
        max: {!!json_encode($max)!!},
        stacked: true
      }
    }
  },
});

</script>
@endpush
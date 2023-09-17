<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Statistik</h2>
                        <h5 class="text-white op-7 mb-2">Statistik</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Statistik Tamu</div>
                            <div class="row py-3">
                                <div class="col-md-4 d-flex flex-column justify-content-around">
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-success op-8">Kelurahan</h6>
                                        <h3 class="fw-bold"><?=$tamu?></h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-info op-8">Kecamatan</h6>
                                        <h3 class="fw-bold"><?=$tamu?></h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-warning op-8">Keperluan</h6>
                                        <h3 class="fw-bold"><?=$keperluan;?></h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-secondary op-8">Peta sebaran tamu</h6>
                                        <h3 class="fw-bold"><?=$tamu;?></h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-default op-8">Usia Ananda</h6>
                                        <h3 class="fw-bold"><?=$tamu?></h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="chart-container">
                                        <canvas id="totalIncomeChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>
<script>
    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

var mytotalIncomeChart = new Chart(totalIncomeChart, {
    type: 'bar',
    data: {
        labels: ["Kelurahan", "Kecamatan", "Keperluan", "Peta sebaran tamu", "Usia ananda"],
        datasets : [{
            label: "Total Statistik",
            backgroundColor: '#ff9e27',
            borderColor: 'rgb(23, 125, 255)',
            data: ['<?=$tamu?>', '<?=$tamu?>', '<?=$keperluan;?>', '<?=$tamu?>', '<?=$tamu?>'],
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        scales: {
            yAxes: [{
                ticks: {
                    display: false //this will remove only the label
                },
                gridLines : {
                    drawBorder: false,
                    display : false
                }
            }],
            xAxes : [ {
                gridLines : {
                    drawBorder: false,
                    display : false
                }
            }]
        },
    }
});
</script>
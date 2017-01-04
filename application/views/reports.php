<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>  

<script type="text/javascript">
$(document).ready(function(){
    var months =  <?php echo json_encode($months);?>;
    var items = <?php echo json_encode($eqpList);?>;
    var chart = {  
        chart: {
            width: '800',
            height: '250',
            backgroundColor:null
        },
        title: {
            text: 'Borrowed Items',
            x: -20 //center
        },
        xAxis: {
            categories: months
        },
        yAxis: {
            title: {
                text: 'Number of Items'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        // },
        },
        series: [{
            name: 'Equipment(s)',
            data: items
        },
        // {
        //     name: 'Components',
        //     data: items
        // }

        ]
    };

    $('#lineChartcontainer').highcharts(chart);

    // console.log(<?php echo json_encode($allItems); ?>)
    var damage = <?php echo $allItems; ?>;
    var added = <?php echo $totalItems; ?>;
    var moved = <?php echo $movedItems; ?>;
    
    var chart2 = {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            backgroundColor:null,
            height: '300',
            width: '500'
        },
        title: {
            text: '',
            style: {
                display: 'none'
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Average Number of Item(s)',
            colorByPoint: true,
            data: [{
                name: 'Damaged',
                y: damage
            }, {
                name: 'Added',
                y: added,
                sliced: true,
                selected: true
            }, {
                name: 'Moved',
                y: moved
            }]
        }]
    }    
    $('#pieChartcontainer').highcharts(chart2);
});
</script>
<div style="display: inline-block; height: 15em;">
        <span style="font-size: 90px; padding-left: 50px;" id="totalItems"><?php echo $totalItems;?></span><br>
        <span style="font-size: 20px;">equipments & components</span>
</div>

<div id='lineChartcontainer' style="float: right"></div><br><br>
<div style="float: right; margin: 0 5em 0 0">
    <br><br>
    <span style="color: red"><span style="font-size: 50px;font-weight: bold;"><?php echo $totalItems;?>   </span><span style="font-size: 20px">Added Items</span></span><br>
    <span style="color: red"><span style="font-size: 50px;font-weight: bold;"><?php echo $allItems;?>   </span><span style="font-size: 20px"> Damaged Items</span></span><br>
    <span style="color: red"><span style="font-size: 50px;font-weight: bold;"><?php echo $movedItems;?>  </span><span style="font-size: 20px"> Moved Items</span></span><br>
</div>
<div id='pieChartcontainer' style="float: right;"></div>

<div style="display: flex; background-color: #5daf98; width: 35%; height: 53%;">
    <span style="color: white;font-size: 25px;font-weight: bold;">Recent Actions</span>
    <div style="background-color: white; height: 100px; width: 100px">

    </div>
</div>

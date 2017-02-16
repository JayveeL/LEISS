<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>  

<style type="text/css">
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
    var data = <?php echo json_encode($logs);?>;
    var show = <?php echo json_encode($logShow);?>;
    console.log(show)

    generateLogs(data, show);

    var months =  <?php echo json_encode($months);?>;
    var items = <?php echo json_encode($eqpList);?>;

    generateLineGraph(months, items);
    

    // console.log(<?php echo json_encode($allItems); ?>)
    var damage = <?php echo $allItems; ?>;
    var added = <?php echo $totalItems; ?>;
    var moved = <?php echo $movedItems; ?>;

    generatePieChart(damage, added, moved);

    $("#filterReports").change(function(){
        // alert(<?php echo json_encode($labID); ?>)
        if($(this).val() == 'monthly'){
            $("#months").show();
            $("#year").hide();
        }else if ($(this).val() == 'yearly'){
            $("#year").show();
            $("#months").hide();
        }else{
            $("#months").hide();
            $("#year").hide();

            var source = "<?php echo site_url('Reports/loadReports/');?>";
            var url = source+<?php echo json_encode($labID); ?>+'/'+$(this).val();
            $.ajax({
                'url': url,
                'type': 'GET',
                'dataType': 'JSON',
                success: function(data){
                     generateLogs(data.logs, data.logShow);
                     generateLineGraph(data.months, data.eqpList);
                     generatePieChart(data.allItems, data.totalItems, data.movedItems);

                     $("#aItems, #totalItems").html(data.totalItems);
                     $("#mItems").html(data.movedItems);
                     $("#dItems").html(data.allItems);
                }
            })
        }
    });  

    $("#months").change(function(){
        var source = "<?php echo site_url('Reports/loadReports/');?>";
        var url = source+<?php echo json_encode($labID); ?>+'/'+$(this).val();
        $.ajax({
            'url': url,
            'type': 'GET',
            'dataType': 'JSON',
            success: function(data){
                generateLogs(data.logs, data.logShow);
                generateLineGraph(data.months, data.eqpList);
                generatePieChart(data.allItems, data.totalItems, data.movedItems);

                $("#aItems, #totalItems").html(data.totalItems);
                $("#mItems").html(data.movedItems);
                $("#dItems").html(data.allItems);
            }
        })
    });

    $("#year").change(function(){
        var source = "<?php echo site_url('Reports/loadReports/');?>";
        var url = source+<?php echo json_encode($labID); ?>+'/'+$(this).val();
        $.ajax({
            'url': url,
            'type': 'GET',
            'dataType': 'JSON',
            success: function(data){
                generateLogs(data.logs, data.logShow);
                generateLineGraph(data.months, data.eqpList);
                generatePieChart(data.allItems, data.totalItems, data.movedItems);

                $("#aItems, #totalItems").html(data.totalItems);
                $("#mItems").html(data.movedItems);
                $("#dItems").html(data.allItems);
            }
        })
    });
});
    
    function generateLogs(data, show){
        var history = '';
        var action = '';
        if(data.length != 0){
            history += "<table>";
            for(var i = 0; i < data.length; i++){
                history += "<tr>";
               
                switch(data[i].action){
                    case "borrow": action += "<td>"+data[i].studentName+" borrowed "+(data[i].eqpName || data[i].compName)+".</td>"; break;
                    case "return": action += "<td>"+data[i].studentName+" returned "+(data[i].eqpName || data[i].compName)+".</td>"; break;
                    case "damage": action += "<td>"+(data[i].eqpName || data[i].compName)+" filed as damage by "+data[i].studentName+".</td>"; break;
                    case "repair": action += "<td>"+(data[i].eqpName || data[i].compName)+" repaired.</td>"; break;
                    case "move": action += "<td>"+(data[i].eqpName || data[i].compName)+" moved to "+data[i].labID+".</td>"; break;
                    case "add": action += (show == 'All')?"<td>Added "+(data[i].eqpName || data[i].compName)+" to "+data[i].labID+".</td>": "<td>Added "+(data[i].eqpName || data[i].compName)+".</td>"; break;
                }
                history += action;
                history += "<td>"+data[i].date+"</td>";
                history += "</tr>";
                action = '';
            }
            history += "</table>";
            $("#recentActions").html(history);
        }else{
            $("#recentActions").html('No record(s) to display...');
        }
    }

    function generateLineGraph(months, items){
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
    }

    function generatePieChart(damage, added, moved){
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
    }
</script>
<div style="float: right">
    <select id="filterReports">
        <option value="juneOct">June - October</option>
        <option value="novMar" selected>November - March</option>
        <option value="monthly">Monthly</option>
        <option value="yearly">Yearly</option>
    </select>

    <select id="months" hidden>
        <?php
            for ($i = 0; $i < 12; $i++) {
                $date_str = date('M', strtotime("+$i months"));
                    echo "<option value=$date_str>".$date_str ."</option>";
            } 
        ?>
    </select>

     <select id="year" hidden>
        <option selected value="2017">2017</option>
        <option value="2016">2016</option>
        <option value="2015">2015</option>
     </select>

</div>
<div style="display: inline-block; height: 15em; margin-left: 80px;">
        <span style="font-size: 90px; padding-left: 50px;" id="totalItems"><?php echo $totalItems;?></span><br>
        <span style="font-size: 20px;">equipment(s) & component(s)</span>
</div>

<div id='lineChartcontainer' style="float: right"></div><br><br>
<div style="float: right; margin: 0 5em 0 0">
    <br><br>
    <span style="color: #5daf98"><span style="font-size: 50px;font-weight: bold;" id="aItems"><?php echo $totalItems;?>   </span><span style="font-size: 20px">Added Items</span></span><br>
    <span style="color: #5daf98"><span style="font-size: 50px;font-weight: bold;" id="dItems"><?php echo $allItems;?>   </span><span style="font-size: 20px"> Damaged Items</span></span><br>
    <span style="color: #5daf98"><span style="font-size: 50px;font-weight: bold;" id="mItems"><?php echo $movedItems;?>  </span><span style="font-size: 20px"> Moved Items</span></span><br>
</div>
<div id='pieChartcontainer' style="float: right;"></div>
<div><span style="color: #5daf98;font-size: 25px;font-weight: bold;">Recent Actions</span>
<div style="display: flex; width: 35%; height: 53%;">
   <!--  <div style="width: 100%; height: 15%;"><span style="color: white;font-size: 25px;font-weight: bold;">Recent Actions</span></div>
    <br> -->
    <div style="background-color: white; width: 100%; height: 85%; overflow-y: scroll;" id="recentActions"></div>
</div>
</div>

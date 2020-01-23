@extends('layouts.dashboard')
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
    <h5 style="font-size:1em">My Expenses <span class="float-right"><a href="#">Dashboard</a></span></h5>
    </div>    
</div> 
<div class="row mt-5" >
    <div class="col-md-5">
        <table class="table table-sm table-stripped">
            <thead>
                <tr>
                    <th>Expenses Categories</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cols as $col)
                
                 @php
                  $columns = explode(" ",$col);
                     
                 @endphp

                    <tr>
                        <td>{{$columns[0]}}</td>
                         
                        <td>{{$columns[1]}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="col-md-7 ">   
        @php
        $dataPoints = array();
        foreach($cols as $col){
            $columns = explode(" ",$col);
            array_push($dataPoints,array("label"=>$columns[0], "y"=>$columns[1]));
        }
        @endphp
        <div id="chartContainer"></div>
    </div>
</div>
<script src="js/canvasjs.min.js"></script>
<script>
window.onload = function() { 
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1",
	animationEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\" PHP\"",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000000",
		indexLabelFontSize: 15,
		indexLabelFontWeight: "bolder",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

@endsection

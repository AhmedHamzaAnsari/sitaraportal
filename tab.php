<?php 
include_once("config_indemnifier.php");


// $currnt_date = date('Y/m/d');

$currnt_date =$_GET['date'];

$next_date = new dateTime($currnt_date);
$next_date -> modify('+1 day');
$tommorrow = $next_date->format('Y-m-d');

// $currnt_date = '21/10/22';
// $category_sql = "SELECT tm.trip_count as trip ,dv.name as vehiclename ,dv.uniqueId as gari_id, geo.consignee_name as depot , tm.id as tid,tm.without_tracker FROM trip_main as tm join devices as dv on dv.uniqueId = tm.lorry_no join geofenceing as geo on geo.id = tm. base join trip_sub as ts on ts.main_id=tm.id join users_devices as ud on ud.devices_id=ts.vehicle_id join users as ur on ud.users_id=ur.id where ud.users_id='$user_id' and ts.start_time>'$currnt_date' and ts.start_time<='$tommorrow' group by dv.name order by ts.id desc;";
// echo $category_sql;

if($_SESSION['prive']==='Depot'){
 
    $user_id=1;
    $depot_id=$_SESSION['depot_id'];
    $depot_name=$_SESSION['depot_name'];

    $category_sql="SELECT tm.trip_count as trip ,ts.vehicle_name as vehiclename ,ts.vehicle_id as gari_id, geo.consignee_name as depot , tm.id as tid,tm.without_tracker,tm.create_time,tm.user_id FROM trip_main as tm 
left join geofenceing as geo on geo.id = tm. base  
join trip_sub as ts on ts.main_id=tm.id left join users_devices as ud on ud.devices_id=ts.vehicle_id 
left join users as ur on ud.users_id=ur.id where tm.user_id='$user_id' and tm.create_time>'$currnt_date' and tm.create_time<='$tommorrow' and geo.id='$depot_id' group by tm.lorry_no order by ts.id desc;";

}
else{ 
    $user_id=$_SESSION['userid'];
    $category_sql="SELECT tm.trip_count as trip ,ts.vehicle_name as vehiclename ,ts.vehicle_id as gari_id, geo.consignee_name as depot , tm.id as tid,tm.without_tracker,tm.create_time,tm.user_id FROM trip_main as tm 
left join geofenceing as geo on geo.id = tm. base  
join trip_sub as ts on ts.main_id=tm.id left join users_devices as ud on ud.devices_id=ts.vehicle_id 
left join users as ur on ud.users_id=ur.id where tm.user_id='$user_id' and tm.create_time>'$currnt_date' and tm.create_time<='$tommorrow' group by tm.lorry_no order by ts.id desc;";

}


// echo $category_sql;
$resultset = mysqli_query($db, $category_sql) or die("database error:". mysqli_error($db));
$active_class = 0 ;
$category_html = '';
$product_html = '';	
$modal_zoom = '';	
while( $category = mysqli_fetch_assoc($resultset) ) {
	$current_tab = "";
	$current_content = "";
	if(!$active_class) {
		$active_class = 1;
		$current_tab = 'active';
		$current_content = 'in active';
	}	
    $vname = $category['vehiclename'];
    
	$category_html.= '<a class="nav-link '.$current_tab.'  mb-3" id="v-line-pills-home-tab'.$category['vehiclename'].'"
    data-toggle="pill" href="#v-line-pills-home'.$category['vehiclename'].'" role="tab"
    aria-controls="v-line-pills-home'.$category['vehiclename'].'" aria-selected="true">
    <div class="container-fluid my-3">
	<div class="row  mb-3">
            <div class="col-md-3" style="">
                <i class="far fa-file-excel" style="font-size:20px"></i>
            </div>
            <div class="col-md-9 text-left " style="margin: auto;">Trip # '.$category['tid'].'
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3" style="">
                <i class="fa fas fa-truck-moving"
                    style="font-size:18px"></i>
            </div>
            <div class="col-md-5 text-left "
                style="margin: auto;font-weight: bold;color:#3e3ea7;">
                '.$category['vehiclename'].'</div>
            <div class="col-md-4 " style="margin: auto; font-size: 10px;">
                Depot # <span style="font-weight: bold">'.$category['depot'].'</span></div>
        </div>
        <div class="row  mb-3">
            <div class="col-md-3" style="">
                <i class="fa fas fa-route" style="font-size:20px"></i>
            </div>
            <div class="col-md-5 text-left " style="margin: auto;">'.$category['trip'].' Trips
            </div>
            <div class="col-md-4 " style="margin: auto; font-size: 10px;">
            <script>
                        var vehicle_name'.$category["gari_id"].' = "'.$category["gari_id"].'";
                        var trip_iid'.$category["tid"].' = "'.$category["tid"].'";
                        
                        </script>';


            if($category["without_tracker"]==='1'){
            $category_html .=' <span class="shadow-none badge outline-badge-primary" style="
            margin-left: -27px;
        ">
                Without Tracker
                </span>';
           
        }else{
            $category_html .=' <button class="shadow-none badge outline-badge-primary" 
            onclick="open_new_win(vehicle_name'.$category['gari_id'].',trip_iid'.$category['tid'].');">
                Live Track
                </button>';
        }
            
    $category_html .=' </div>
        </div>
        

        

		
        
    </div>

</a>';
$product_html .= '<div class="tab-pane fade show  '.$current_content.'" id="v-line-pills-home'.$category["vehiclename"].'" role="tabpanel" aria-labelledby="v-line-pills-home-tab'.$category["vehiclename"].'">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table mb-4" >
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th>Start Time</th>
                            <th>Consignee Name</th>
                            <th>Vehicle Name</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>On Map</th>
                            <th>Force Closed</th>
                            <th class="">Trip Status</th>
                        </tr>
                    </thead>
                    <tbody>';	
                    $cat_id=$category["tid"];
                    
                    $product_sql = "SELECT * FROM trip_sub where main_id='$cat_id';";

                    $product_results = mysqli_query($db, $product_sql) or die("database error:". mysqli_error($db));
                    if(!mysqli_num_rows($product_results)) {	
                        $product_html .=  '<tr >
                        <td class="text-center " colspan="9">No Trips Found</td></tr>';			
                    }
                    while( $product = mysqli_fetch_assoc($product_results) ) {
                        if($product["status"]==='0'){
                            $product_html .=' <tr style="background-color:#FFD700">
                            <td class="text-center">'.$product["id"].'</td>
                            <td >'.$product["start_time"].'</td>
                            <td>'.$product["consignee_name"].'</td>
                            <td>'.$vname.'</td>
                            <script>
                            var markering'.$product["id"].' = "'.$product["id"].'";
                            var congignee_name'.$product["id"].'="'.$product["consignee_name"].'";
                            </script>
                            <td>'.$product["products"].'</td>
                            <td>'.$product["quantity"].'</td>
                            <td><button class=" shadow-none badge outline-badge-primary" onclick="my_markers(markering'.$product["id"].',congignee_name'.$product["id"].');"> Focused
                                    On Map</button></td>
                            <td><button
                                    class=" shadow-none badge outline-badge-danger"
                                    data-toggle="modal" data-target="#zoomupModal'.$product["id"].'">Forced
                                    Cancel</button></td>
                                    <td class="">';
                                    if($product["status"]==='0'){
                                        $product_html .='<span class=" shadow-none badge outline-badge-primary">On Trip</span>';
                                    }
                                    else if($product["status"]==='1'){
                                        $product_html .='<span class=" shadow-none badge outline-badge-success">Complete</span>';
                                    }
                                    else if($product["status"]==='2'){
                                        $product_html .='<button class=" shadow-none badge outline-badge-danger" >Forced Stop</button>';
                                    }
                                        
                                    $product_html .='</td>
                                </tr>';
                               
                        }
                        else if($product["status"]==='1'){
                            $product_html .=' <tr style="background-color:#dcf9b0">
                            <td class="text-center">'.$product["id"].'</td>
                            <td >'.$product["start_time"].'</td>
                            <td>'.$product["consignee_name"].'</td>
                            <td>'.$vname.'</td>
                            <script>
                            var markering'.$product["id"].' = "'.$product["id"].'";
                            var congignee_name'.$product["id"].'="'.$product["consignee_name"].'";
                            </script>
                            <td>'.$product["products"].'</td>
                            <td>'.$product["quantity"].'</td>
                            <td><button class=" shadow-none badge outline-badge-primary" onclick="my_markers(markering'.$product["id"].',congignee_name'.$product["id"].');"> Focused
                                    On Map</button></td>
                                    <td><button
                                    class=" shadow-none badge outline-badge-danger"
                                    data-toggle="modal" data-target="#zoomupModal'.$product["id"].'">Forced
                                    Cancel</button></td>
                                    <td class="">';
                                    if($product["status"]==='0'){
                                        $product_html .='<span class=" shadow-none badge outline-badge-primary">On Trip</span>';
                                    }
                                    else if($product["status"]==='1'){
                                        $product_html .='<span class=" shadow-none badge outline-badge-success">Complete</span>';
                                    }
                                    else if($product["status"]==='2'){
                                        $product_html .='<span class=" shadow-none badge outline-badge-danger">Forced Stop</span>';
                                    }
                                        
                                    $product_html .='</td>
                                </tr>';
                               
                        }
                        else if($product["status"]==='2'){
                            $product_html .=' <tr style="background-color:#ffb37c">
                            <td class="text-center">'.$product["id"].'</td>
                            <td >'.$product["start_time"].'</td>
                            <td>'.$product["consignee_name"].'</td>
                            <td>'.$vname.'</td>
                            <script>
                            var markering'.$product["id"].' = "'.$product["id"].'";
                            var congignee_name'.$product["id"].'="'.$product["consignee_name"].'";
                            </script>
                            <td>'.$product["products"].'</td>
                            <td>'.$product["quantity"].'</td>
                            <td><button class=" shadow-none badge outline-badge-primary" onclick="my_markers(markering'.$product["id"].',congignee_name'.$product["id"].');"> Focused
                                    On Map</button></td>
                                    <td><button
                                    class=" shadow-none badge outline-badge-danger"
                                    data-toggle="modal" data-target="#zoomupModal'.$product["id"].'">Forced
                                    Cancel</button></td>
                            <td class="">';
                            if($product["status"]==='0'){
                                $product_html .='<span class=" shadow-none badge outline-badge-primary">On Trip</span>';
                            }
                            else if($product["status"]==='1'){
                                $product_html .='<span class=" shadow-none badge outline-badge-success">Complete</span>';
                            }
                            else if($product["status"]==='2'){
                                $product_html .='<span class=" shadow-none badge outline-badge-danger">Forced Stop</span>';
                            }
                                
                            $product_html .='</td>
                            </tr>';
                                
                        }

                        $modal_zoom .='<div id="zoomupModal'.$product["id"].'" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal Header</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <p class="modal-text">'.$product["id"].'</p>
                                        <div class="container my-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="forced_stop.php?trips__id='.$product["id"].'&comments=comments_add'.$product["id"].'&date='.$_GET['date'].'" method="post">
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <input type="hidden" class="form-control" id="trips__id'.$product["id"].'" name="trips__id'.$product["id"].'"
                                                                placeholder="Enter Your Comments" value="'.$product["id"].'" >
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Add Comments</label>
                                                            <input type="text" class="form-control" id="comments_add" name="comments_add'.$product["id"].'"
                                                                placeholder="Enter Your Comments" required>
                                                        </div>
                                                        
    
                                                       
    
                                                        
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button onclick="myFunction()" class="btn btn-primary  font-weight-bold mx-2" name="Forced__stop" type="submit"
                                                                        style="float: right; ">SAVE</button>
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>
                                                                
                                                        
                                                        
    
                                                        
    
                                                       
    
                                                        
    
                                                    </div>
    
                                                    
    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                        <div class="modal-footer md-button">
                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                            <script>
                                                    function myFunction() {
                                                    confirm("Are you Confirm to Stop this trip ?");
                                                    }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        
                    }
                    $product_html .=' 
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div><div class="clear_both"></div></div>';		
}


?>
    
<script type="text/javascript" src="module/sing_in/view/list_user/model/read_user.js">  </script>


    <div class="container">
        
        <div class="col-md-12">
        	<div class="row">
        			<div class="col-md-5">
                        <h2 class="aboutus-title">USER LIST</h2>
                    </div>
        	</div>
        	<div class="row">
                <div class="col-md-2 text-center">
                    <div class="form-group">
                        <p id="p_crear"><a href="index.php?page=sing_in&op=create"><img src="view/img/crud/usu_6.png" style="width: 80px;"></a></p>
                    </div>
                    
                    <div class="form-group">
                        <a href="index.php?page=sing_in&op=create" class="btn btn btn-success btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b>&nbsp;New User</b></a>
                    </div>

                </div>

                <div class="col-md-10 table-responsive">

                    <div class="form-group">	
                        <form action="#" method="get">
                            <div class="input-group">
                                <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                <input class="form-control" id="system-search" name="system-search" placeholder="Search for" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                		<table class="table table-hover">
                            <tr style="background: silver;" >
                                <td><b>USER</b></td>
                                <td><b>DNI</b></td>
                                <td><b>NAME</b></td>
                                <td class="text-center" ><b>SETTINGS&nbsp;</b><span class="glyphicon glyphicon-cog"></span></td>
                            </tr>
                            <?php
                                if ($rdo->num_rows === 0){
                                    echo '<tr>';
                                    echo '<td align="center"  colspan="3">NO HAY NINGUN USUARIO</td>';
                                    echo '</tr>';
                                }else{
                                    foreach ($rdo as $row) {
                                   		echo '<tr>';
                                    	   	echo '<td><span class="glyphicon glyphicon-user "></span>&nbsp;&nbsp;'. $row['user'] . '</td>';
                                    	   	echo '<td>'. $row['dni'] . '</td>';
                                    	   	echo '<td>'. $row['first_name'] . '</td>';
                                    	   	echo '<td  class="text-center" width=300>';
                                                    //index.php?page=controller_user&op=read&id='.$row['user'].'
                                                    //data-toggle="modal" data-target="#miModal"
                                        	   	echo '<a class="btn btn-primary btn-default user_read" id="'.$row['user'].'" href="#" data-toggle="modal" data-target="#miModal" title="READ USER"   ><span  class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>';

                                        	   	echo '&nbsp;';
                                        	   	echo '<a href="index.php?page=sing_in&op=update&id='.$row['user'].'" title="EDIT USER" class="btn btn-warning btn-default" ><span  class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>';

                                        	   	echo '&nbsp;';
                                        	   	echo '<a  class="btn btn-danger btn-default user_delete" id="'.$row['user'].'" data-toggle="modal" data-target="#myModal" title="DELETE USER"><span  class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';

                                    	   	echo '</td>';
                                	   	echo '</tr>';
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
        	</div>
        </div>
    </div>




<div class="modal fade"  id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" hidden>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><strong>USER: </strong><i id="user"></i> </h4>
            </div>
            <div class="modal-body" id="container">
                <div class="row">
                    <div class="col-md-12" ><!--  style="background:black" -->
                        <div class="col-md-5">
                            <div class="form-group ">
                                <p> <strong>Name:</strong> <i id="first_name"></i></p>
                                <p> <strong>Last name:</strong> <i id="last_name"></i></p>
                                <p> <strong>Dni:</strong> <i id="dni"></i></p>
                                <p> <strong>Date of Birth:</strong> <i id="birthdate"></i></p>
                                <p> <strong>Genere:</strong> <i id="genere"></i></p>
                                <p> <strong>Country:</strong> <i id="country"></i></p>
                            </div>
                        </div>

                        <div class="col-md-2"></div>
                        
                        <div class="col-md-5">
                                <p> <strong>Address:</strong> <i id="address"></i></p>
                                <p> <strong>Zip Code:</strong> <i id="zip"></i></p>
                                <p> <strong>Number Phone:</strong> <i id="phone"></i></p>
                                <p> <strong>Email:</strong> <i id="email"></i></p>
                                <p> <strong>Company:</strong> <i id="cmpy"></i></p>
                                <p> <strong>Hobbies:</strong> <i id="hobbies"></i></p>                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Launch demo modal</button>
 --><!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h4 class="modal-title" id="myModalLabel">DELETE:</h4>

                </div>
                <div class="modal-body">
                            <p class='text-center'>Are you sure want remove the user <strong id="user_delete_id"></strong>?</p>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary user_delete_ok" id="delete_ok">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
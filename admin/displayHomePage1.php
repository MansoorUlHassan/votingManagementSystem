<?php 
//Get data from table named election
$fetchingData = mysqli_query($db, 'SELECT * FROM `elections`') or die(mysqli_error($db));
//Check if data is present 
$isDataAvailable = mysqli_num_rows($fetchingData);
//Condition
if($isDataAvailable>0){
    //Maybe there are multiple elections are present
    $sno = 0;
    while($election = mysqli_fetch_assoc($fetchingData)){
        //get person name by running both quries at a time
        $fetchPerson = mysqli_fetch_assoc(mysqli_query($db,'SELECT `name` FROM `users` WHERE `s_no`="'.$election['user_no'].'"')) or die(mysqli_error($db));
        $PersonName = $fetchPerson['name'];
        //display
        ?> <tr class="text-white bg-dark">
    <th class="bg-red text-black"> <?php echo ++$sno;?> </th>
    <td><?php echo $election['election_topic'];?> </td>
    <td><?php echo $election['no_of_canidates'];?> </td>
    <td><?php echo $election['starting_date'];?> </td>
    <td><?php echo $election['ending_date'];?> </td>
    <td><?php echo $election['status'];?> </td>
    <td><?php echo $PersonName;?> </td>
    <td>
        <a href="#" class="btn btn-sm btn-warning">Edit</a>
        <a href="#" class="btn btn-sm btn-danger">Delete</a>
    </td>
</tr> <?php
    } 
} 
//Otherwise display no election is added 
else {?><tr>
    <th class="btn-success text-center text-yellow" colspan="8">No Data Found</th>
</tr>
<tr>
    <th class="bg-yellow text-center text-white" colspan="8"><a href="index.php?AddElection#name"
            class="btn btn-success">Start Adding Values</a>
    </th>
</tr><?php
}?>
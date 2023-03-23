<!--Upcoming elections showing-->
<div class="row">
    <div class="col-12 my-3">
        <h3>Upcoming Elections</h3>
        <table class="table">
            <thead>
                <tr class="bg-red">
                    <th scope="col">S.No </th>
                    <th scope="col">Election Name</th>
                    <th scope="col">Candidates </th>
                    <th scope="col">Starting Date</th>
                    <th scope="col">Ending Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Added By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody> <?php require_once('displayHomePage1.php');?> </tbody>
        </table>
    </div>
</div>
<!--Candidate List Showing-->
<div class="row">
    <div class="col-12 my-3">
        <h3>Candidates List</h3>
        <table class="table">
            <thead>
                <tr class="col-12 bg-red">
                    <th scope="col">S.No </th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name </th>
                    <th scope="col" colspan="6"> Details</th>
                    <th scope="col"> Election </th>
                    <th scope="col"> Action</th>
                </tr>
            </thead>
            <tbody> <?php require_once('displayHomePage2.php');?> </tbody>
        </table>
    </div>
</div>
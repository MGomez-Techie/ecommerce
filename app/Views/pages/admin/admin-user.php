
<div class="card p-3">
    <table class="table">
        <thead>
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Date Joined</th>
                <th>User Type</th>
            </tr>
        </thead>
        <tbody>


            <?php foreach($admin_details as $data):?>
                <tr>
                    <td><?php echo $data["first_name"];?></td>
                    <td><?php echo $data["last_name"];?></td>
                    <td><?php echo $data["email"];?></td>
                    <td><?php echo $data["user_created"];?></td>
                    <td><?php echo $data["user_type"];?></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>

<div id="deleteuser_<?= $rows['userid'] ?>"  class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
        <form method="POST" action="./php/deleteUser.php">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Are you sure?</h4>	
                <input type="hidden" name="id" value="<?php echo $rows['userid'] ?>" />
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete <?= $rows['first_name'], " " ,$rows['last_name']  ?>'s records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button name="deleteuser" class="btn btn-danger">Delete User</button>
               
			</div>
            </form>
		</div>
	</div>
</div> 
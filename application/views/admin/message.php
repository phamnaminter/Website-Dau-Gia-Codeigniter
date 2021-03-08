
<?php
	if($this->session->userdata('message')){
		echo '<div class="nNote nInformation hideit">';
		echo $this->session->userdata('message');
		echo '</div>';
		$this->session->unset_userdata('message');
	}
 ?>

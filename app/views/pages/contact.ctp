
<div class="page">
	<h1>Contact</h1>

        <div class="contact">
			<font size=-1>
          <?php echo $form->create("Contact",array('name' => 'Contact', 'type' => 'post','action' => 'contact'));  ?>
		  <?php 
					if ( !empty($_GET["c_url"]) ) {
						$last_url = $_GET["c_url"];
					} else {
						$last_url = "nowhere";
					}
		 ?>
          <?php echo 
					 $form->input("name", array('div' => false,'label' => 'Name: ','alt'=>'()'))." ".
					 $form->input("email", array('div' => false,'label' => 'Email: ','alt'=>'()'))." ".
					 #$form->input('c_url',array('div'=>false,'label'=>false,'value'=>$last_url.""))." ".
					 $form->hidden('c_url',array('div'=>false,'label'=>'false','value'=>$last_url."",'hiddenField' => true))." ".
					 $form->input("title", array('div' => false,'label' => 'Title: ','alt'=>'()'))." ".
					 $form->label("l_suggestions", 'Suggestions/Problems/Critics/Improvements: ')." ".
                     $form->textarea("suggestions", array('rows'=>10,'div' => false,'label' => 'Suggestions: ','alt'=>'()'))." <br><br><div align='right'>".
                     $form->button('Submit',array('name' => 'Submit','class'=>'button search_active','div' => false,'type' => 'submit'))." ".
                     $form->button('Clear', array( 'name' => 'Clear', 'type'=>'reset','class'=>'button reset_button','onClick' => "document.getElementById('data[Retrogenes][specie_id]').value='';"))."</div> ".
                     $form->end();  
          ?>
        </div>
			</font>
	<br><font size=-2>
	<tex>
		For more extensive contacts and collaborations please mail: <?php echo $this->Html->image('email.jpg'); ?>
	</tex>
	</font>
</div>

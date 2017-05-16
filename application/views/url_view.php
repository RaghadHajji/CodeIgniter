<!DOCTYPE html>
 <html lang="en"> 
<head>
	<meta charset="utf-8">
</head>
<body>
<fieldset>
	<div>    
		<h1>CodeIgniter Example for Shorten Url</h1>
		<section>
		<?php

$this->load->helper('form'); //The Form Helper file contains functions that assist in working with forms.

echo form_open(); //Creates an opening form tag with a base URL
echo form_label('enter the Url to be shorten');
echo form_input('url');
echo form_submit('shorty','Get the Shorten Url'); // name then value 
echo form_close();

if(isset($short_url))
{
	echo '<a href="'.base_url().$short_url.'" target="_blank">'.base_url().$short_url.'</a>'; //URL access to a resource (such as css, js, image), use base_url() 
//	or i can use it without base url 
	// echo '<a href=".$short_url.'" target="_blank">'.$short_url.'</a>';
}

if(isset($error))
{
	echo "it doesn't work ... Try another Url";
}
?>

		</section>
	</div>
	</fieldset>
</body>
</html>
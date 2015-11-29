<?php
include_once 'databae_connect.php';
if(isset($_POST['btn-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
   	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file)){
		$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
		$from=$_REQUEST["from"];
		   $emaila=$_REQUEST["emaila"];
		   $filea=$_REQUEST["filea"];
		   exec("testone.exe 125 70 ", $out);
			echo ( $out);
		   if ($filea)
		   {
		      function mail_attachment ($from , $to, $subject, $message, $attachment){
			 $fileatt = $attachment; // Path to the file
			 $fileatt_type = "application/octet-stream"; // File Type 
			 
			 $start = strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
			 $fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the attachment 
			 
			 $email_from = $from; // Who the email is from
			 $subject = "New Attachment Message";
			 
			 $email_subject =  $subject; // The Subject of the email 
			 $email_txt = $message; // Message that the email has in it 
			 $email_to = $to; // Who the email is to
			 
			 $headers = "From: ".$email_from;
			 $file = fopen($fileatt,'rb'); 
			 $data = fread($file,filesize($fileatt)); 
			 fclose($file); 
			 
			 $msg_txt="\n\n You have recieved a new attachment message from $from";
			 $semi_rand = md5(time()); 
			 $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
			 $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
			 
			 $email_txt .= $msg_txt;
			 $email_message .= "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type:text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $email_txt . "\n\n";
			 $data = chunk_split(base64_encode($data));
			 
			 $email_message .= "--{$mime_boundary}\n" . "Content-Type: {$fileatt_type};\n" . " name=\"{$fileatt_name}\"\n" . //"Content-Disposition: attachment;\n" . //" filename=\"{$fileatt_name}\"\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
			 $ok = mail($email_to, $email_subject, $email_message, $headers);
			 
			 if($ok)
			 {
			    echo "File Sent Successfully.";
			    unlink($attachment); // delete a file after attachment sent.
			 }
			 
			 else
			 {
			    die("Sorry but the email could not be sent. Please go back and try again!");
			 }
		      }
		      move_uploaded_file($_FILES["filea"]["tmp_name"],'temp/'.basename($_FILES['filea']['name']));
		      mail_attachment("$from", "youremailaddress@gmail.com", "subject", "message", ("temp/".$_FILES["filea"]["name"]));
		   }
		alert('successfully uploaded');
        window.location.href='index.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='index.php?fail';
        </script>
		<?php
	}
}
?>

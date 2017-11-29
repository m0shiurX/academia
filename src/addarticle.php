<?php
	include("components/header.php");
	if (isset($_GET['sub']) && isset($_GET['chapter']) && isset($_GET['author'])) {
		$subject = $_GET['sub'];
		$chapter = $_GET['chapter'];
		$author = $_GET['author'];
	}
    if (isset($_POST['name']) && isset($_POST['data'])) {
        $name = $_POST['name'];
        $data = $_POST['data'];
        $subject = $_POST['subject'];
        $chapter = $_POST['chapter'];
        $author = $_POST['author'];
        require_once "libs/article.php";
        $article = new Article($dbh);
        if (!$article->addArticle($subject, $chapter, $author, $name, $data)) {
            echo "Sorry Post Failed !";
        }else{
			echo "Successfully done";
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/summernote.css" rel="stylesheet">
<body onunload="javascript:refreshParent()">
<div class="summernote container">
	
	<div class="row">
	    <div class="col-lg-12">
		<h3 style="text-align:center" >Add an article</h3>
		<form id="postForm" action="addarticle.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
			<b>Title</b>
			<input type="text" class="form-control" name="name">
			<input type="hidden" name="subject" value ="<?=isset($subject)? $subject:0?>">
			<input type="hidden" name="chapter" value = "<?=isset($chapter)? $chapter:0?>">
			<input type="hidden" name="author" value = "<?=isset($author)? $author:0?>">
			<br/>
			<textarea id="summernote" name="data" rows="10"></textarea>
			
			<br/>
			<button type="submit" class="btn btn-primary">Save</button>
			<button type="button" id="cancel" onclick="javascript:window.close()" class="btn btn-danger">Close</button>
		    
		</form>
		</div>
		</div>
		
	</div>
</div>

<!-- include libries(jQuery, bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/summernote.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote').summernote({
		height: "300px",
		styleWithSpan: false
	});
});
function postForm() {

	$('textarea[name="data"]').html($('#summernote').code());
}
function refreshParent(){
	window.opener.location.reload();
}
</script>
</body>
</html>
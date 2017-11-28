<?php
    include("components/header.php");
    if (isset($_POST['data'])) {
        $data = $_POST['data'];
        require_once "libs/question.php";
        $article = new Question($dbh);
        if (!$article->addQuestion($data)) {
            echo "Sorry Post Failed !";
        }
        echo "Successfully loaded";
    }
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/summernote.css" rel="stylesheet">
<body>
<div class="summernote container">
	
	<div class="row">
	    <div class="col-lg-12">
		<form id="postForm" action="askquestion.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
			
			<b>Ask Question</b>
			<br/>
			<textarea id="summernote" name="data" rows="10"></textarea>
			
			<br/>
			<button type="submit" class="btn btn-primary">Ask</button>
			<button type="button" id="cancel" class="btn">Cancel</button>
		    
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
		height: "80px",
		styleWithSpan: false
	});
});
function postForm() {

	$('textarea[name="data"]').html($('#summernote').code());
}
</script>
</body>
</html>
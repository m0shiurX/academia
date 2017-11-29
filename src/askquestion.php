<?php
	include("components/header.php");
    if (isset($_POST['data'])) {

        $data = $_POST['data'];
        $subject = $_POST['subject'];
        $chapter = $_POST['chapter'];
        $topic = $_POST['topic'];
        $questioned_by = $_POST['questioned_by'];
        $article_id = $_POST['article'];
        $data = $_POST['data'];
        require_once "libs/question.php";
        $article = new Question($dbh);
        if (!$article->addQuestion($subject, $chapter, $topic, $article_id, $questioned_by, $data)) {
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
<body onunload="javascript:refreshParent()">
<div class="summernote container">
	
	<div class="row">
	    <div class="col-lg-12">
			<h3>Ask Question</h3>
		<form id="postForm" action="askquestion.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                <?php 
                    require_once "libs/article.php";
                    $articles = new Article($dbh);
					if (isset($_GET['q_id'])) {
						$q_id = $_GET['q_id'];
                        // Article details to be loaded
                        $article = $articles->fetchArticleByID($q_id);
                        if (isset($article) && sizeof($article) > 0){?>
							<input type="hidden" name="subject" value ="<?=$article->subject_id?>">
							<input type="hidden" name="chapter" value ="<?=$article->chapter_id?>">
							<input type="hidden" name="topic" value ="<?=$article->topic_id?>">
							<input type="hidden" name="article" value ="<?=$q_id?>">
							<input type="hidden" name="questioned_by" value ="<?=$_SESSION['id']?>">
							<textarea id="summernote" name="data" rows="10"></textarea>
							<br/>
							<button type="submit" class="btn btn-primary">Ask</button>
                        <?php
                        }
                    }
					?>
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
		height: "120px",
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
<?php
    if(isset($_POST['searchModel'])){    
        SearchRedirect($_POST['searched_text']);
    }
    if(isset($_POST['littleSearchModel'])){    
        SearchRedirect($_POST['littleSearchedText']);
    }
    function SearchRedirect($research){
        header('Location: search.php?model='.$research);
    }
?>
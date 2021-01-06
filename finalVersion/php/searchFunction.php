<?php
/*
    ETML
    By : Manuel Oro
    Date : 16.12.2020
    Desc : Search function (used to search from any page)
*/
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
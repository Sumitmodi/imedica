<?php if ($found == false) {
    load_page("e404");
} else {
    load_page_part($page, $action, "news");
}
?>



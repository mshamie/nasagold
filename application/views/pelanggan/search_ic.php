<?php
if (isset($message)) {
    echo $message;
}
echo form_open('pelanggan/search_ic');
echo form_input('search');
echo form_submit();
echo form_close();
?>

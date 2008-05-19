<?php
function openFileUrl($file, $dir){
    return "open.php?file=$file&dir=$dir";
}
$currentDir = str_replace('apps/', '', getcwd()).'/';
?>
<table style="width:60%;">
    <caption><%= text('Current dir:'). $currentDir %></caption>
    <tr>
        <th><%= text('Type') %></th>
        <th><%= text('File') %></th>
        <th><%= text('Size') %></th>
    </tr><?php
foreach($files as $file){
    if (($file != 'xn_private') || ($isOwner)){
        $filename = $path.'/'.$file;
    ?>
    <tr>
        <td><%= filetype($filename) %></td>
        <td><a class="<%= filetype($filename) %>" href="<%= openFileUrl($file, $path) %>"><%= $file %></a></td>
        <td><%= (filetype($filename)=='dir') ? '' : filesize($filename) %></td>
    </tr>
<?php
    }
} ?>
</table>
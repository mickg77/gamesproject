

<?php require('header.php');?>

<script type="text/javascript">

function showText(str){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        
    document.getElementById("result").innerHTML=this.responseText;
    
    }
    xmlhttp.open('GET','',true)
    xmlhttp.send();
}
    
    
</script>

<form name="form1" method="POST" action="">
    
    <input name="myname" type="text" onkeyup="showText(this.value)">
    <input type="submit" name="submit">
    
    
</form>

<p id="result"></p>

<?php require('footer.php');?>
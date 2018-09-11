<script type="text/javascript">
<!--
function validate(){
    if ((document.example2.naming.value>=2)){
        alert("You must fill in all of the required fields!")
        return false
    }
    else
        return true
}
//-->
</script>
 
<form name="example2" onsubmit="return validate()">
<input type="text" size="20" name="naming">
<strong>Feedback please: (*required)</strong>
<textarea name="feed" rows="3" cols="25"></textarea>
<strong>Your home address (*NOT required)</strong>
<input type="text" size="35" name="address">
<input type="submit" name="B1" value="Submit">
</form>
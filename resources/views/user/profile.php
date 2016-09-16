<!doctype html>
<html>
<head>
    <title>profile--test页面</title>
</head>
<body>
<h1>Hello, <?php echo $user; ?></h1>
<input name="name" type="text" value="profileInput" id="profile"/>
<input type="button" value="submit" id="subBtn"/>
<script type="text/javascript">
    var btn = document.getElementById('subBtn');
    var name = document.getElementById('profile').value;
    btn.addEventListener('click', function(){
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function(){
            if(ajax.readyState == 4){
                if(ajax.status >= 200 && ajax.status < 300 || ajax.status == 304){
                    alert(ajax.responseText);
                }else{
                    alert("Request was unsuccessful: " + ajax.status);
                }
            }
        };
        ajax.open("post", "/user/store", false);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("name=" + name + "&greeting=Hello World!");
    }, false);

</script>
</body>
</html>
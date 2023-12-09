<!DOCTYPE html>
<html>
<body>

Select your favorite fruit:
<select id="mySelect" onchange="myFunction()">
  <option value="apple">Apple</option>
  <option value="orange">Orange</option>
  <option value="pineapple">Pineapple</option>
  <option value="banana">Banana</option>
</select>

<p>Click the button to return the value of the selected fruit.</p>
<div id="myText"></div>
<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  document.getElementById("myText").innerHTML = x;
  // document.getElementsByTagName("option")[x].value;
}
</script>

</body>
</html>

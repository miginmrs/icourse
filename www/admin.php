<?php
session_start();
require('../include/pass.php');
if(isset($_POST['pwd']) and $_POST['pwd']==$pass) {
	$_SESSION['admin'] = true;
}
?>
<!Doctype html>
<html>
<head>
<meta charset="utf8">
<script src="js/codemirror.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/python.js"></script>
<script src="js/circles.min.js"></script>
<link rel="stylesheet" href="css/codemirror.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
textarea {width:100%; display:block; height:200px}
h1 {text-align:center; padding:30px; font-size: 48px; font-family: 'Rouge Script', cursive; font-weight: normal; text-shadow: 1px 1px 2px #D3B6C6; color: #4B253A}
header {margin: 10px; padding-right: 10px}
header div {float: right}
body{width:80%; margin:auto}
body.table{display: table}
section{width:50%; float: left; min-width:400px}
.CodeMirror{height:200px}
article{margin: 10px}
button {margin-right:10px}
button.end {
	background: none !important; 
	border: none !important; 
	opacity:1 !important; color: #286090 !important; 
	font-weight: bold; cursor:auto !important; 
	transition: color 0.5s, opacity 0.5s, background 0.5s
}
button.error{color: #a94442 !important; opacity:0 !important;font-weight: normal}
button.end span.glyphicon::before {content:"\e013";padding-right:8px}
button.end span.text::before {content:"selected"}
span.set::before {content:"select"}
button.shown {opacity: 1 !important}
html, body{height:100%}
ul {overflow: auto; word-break: break-all}
#formcontainer{
	width:200px;
	height:100%;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
form {
	width:200px;
	margin:auto;
}
input.footer {
	width:auto;
	display: inline-bloc;
	float: left;
	margin-left: 10px;
}
label.footer {
	display: inline-bloc;
	float: left;
	margin-left: 10px;
	margin-top: 4px;
}
input[disabled]{cursor: auto !important}
#outside div {font-family:monospace; height:200px; overflow: auto; white-space: pre;}

</style>
</head>
<?php
if(!isset($_SESSION['admin'])) {
?>
<body class="table">
<main id="formcontainer">
<form role="form" method="POST" action="admin.php">
<?php
if(isset($_POST['pwd'])) {
?>
  <div class="alert alert-danger">
    Erroned password
  </div>
<?php
} else {
?>
  <div class="alert alert-success">
    Connect to Server
  </div>
<?php
}
?>
  <div class="form-group">
    <label for="pwd">Password :</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>
</body>
<?php
} else {
?>
<body>
<header>
<div id="circle"></div><h1 id="title"></h1>
<script id="py" type="text/python"></script>
</header>

<main>
<article id="description"></article>
<section><article id="code1" class="well hidden"></article></section>
<section><article id="code2" class="well hidden"></article></section>
<section><article id="outside" class="well hidden"><div></div></article></section>
<div style="clear:both;"></div>
<article id="code" class="well hidden"></article>
<article id="out" class="well hidden"><div></div></article>
<button id="nx" class="btn btn-primary pull-right" onclick="next()"><span class="glyphicon"></span>next</button>
<button id="set" class="btn btn-primary pull-right" onclick="getcontent(1)"><span class="glyphicon"></span><span class="text set"></span></button>
<button id="pv" class="btn btn-primary pull-right hidden" onclick="previous()"><span class="glyphicon"></span>previous</button>
</main>

<script>
usersNumber = 1;
myCircle = Circles.create({
  id:                  'circle',
  radius:              60,
  value:               0,
  maxValue:            1,
  width:               10,
  text:                function(value){return value;},
  colors:              ['#D3B6C6', '#4B253A'],
  duration:            400,
  wrpClass:            'circles-wrp',
  textClass:           'circles-text',
  valueStrokeClass:    'circles-valueStroke',
  maxValueStrokeClass: 'circles-maxValueStroke',
  styleWrapper:        true,
  styleText:           true
});

hiddens = [document.getElementById('code1'), document.getElementById('code2'), document.getElementById('code'), document.getElementById('outside'), document.getElementById('out')];
timeout = undefined;

var p = CodeMirror(code, {
  value: "",
  mode:  "python"
});
p.setOption('readOnly', true);
code.firstChild.style.backgroundColor = "inherit";
var p1 = CodeMirror(code1, {
  value: "",
  mode:  "python"
});
p1.setOption('readOnly', true);
code1.firstChild.style.backgroundColor = "inherit";
var p2 = CodeMirror(code2, {
  value: "",
  mode:  "python"
});
p2.setOption('readOnly', true);
code2.firstChild.style.backgroundColor = "inherit";
server = {success:0};
curr = 0;
number = 9;
function next() {curr++; getcontent();}
function previous() {curr--; getcontent();}
function getcontent(select) {
	$.ajax({
        type: 'post',
        url: 'admin/api/getcontent.php', 
        data: 'curr='+curr+(select?'&select=1':''), 
        success: function(res) {
			var success = server.success;
			server = JSON.parse(res);
			myCircle._maxValue = server.access;
			if(server.access)
				myCircle.update(server.success);
			else
				myCircle.update(true);
			curr = server.curr;
			if(curr == server.id) {
				set.classList.add('end');
				set.disabled = 'disabled';
			} else {
				set.classList.remove('end');
				set.disabled = '';
			}
			if(curr < number) nx.classList.remove('hidden');
			else nx.classList.add('hidden');
			if(curr > 1) pv.classList.remove('hidden');
			else pv.classList.add('hidden');
			update();
		}
    })
}

getcontent();

function update() {
	var json = server;
	for(var i=0; i<hiddens.length; i++)
		hiddens[i].classList.add('hidden');
	document.getElementById('title').innerText = json.title;
	document.getElementById('description').innerHTML = json.description;
	if(json.p1) {
		code1.classList.remove('hidden');
		p1.setValue(json.p1)
	}
	if(json.p2) {
		code2.classList.remove('hidden');
		p2.setValue(json.p2)
	}
	if(json.p) {
		code.classList.remove('hidden');
		p.setValue(json.p)
	}
	if(json.outside) {
		outside.classList.remove('hidden');
		outside.firstChild.innerText=(json.outside);
	}
	if(json.out) {
		out.classList.remove('hidden');
		out.firstChild.innerText=(json.out);
	}
}

</script>
</body>
<?php
}
?>
</html>

<?php
$response = array(	
	'p'=><<<DD
def enc(data):
  s = 1
  out = list(data)
  for i in range(1, len(data)):
    s = -s
    out[i]=...
  return bytes(out)
DD
	,'description'=><<<DD
Completer le script suivant qui encode un text u(n) en un text v(n) telque <ul><li>v(0) = u(0)<li>v(2n+1) = u(2n+1) - v(2n) mod 256<li>et v(2n+2) = u(2n+2) + v(2n+1) mod 256</ul>
Exemple: <br/>
<ul>
<li> <b>entrée (hex):</b> 47A55D700857D4A6
<li> <b>résultat (hex):</b> 475EBBB5BD9A6E38

DD
	,'title'=>"Exemple d'encodage"
);
?>
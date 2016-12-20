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
Ecrire un script qui permet le décodage associé à cet encodage.<br/>
Exemple: <br/>
<ul>
<li> <b>entrée (hex):</b> 475EBBB5BD9A6E38
<li> <b>résultat (hex):</b> 47A55D700857D4A6

DD
	,'title'=>"Exemple de décodage"
);
?>
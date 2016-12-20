<?php
$response = array(	
	'p'=><<<DD
def enc(key, text):
  out = list(text)
  j = 0
  for i in range(len(out)):
    out[i] ^= key[j]
    j+=1
    if j==len(key): j=0
  return bytes(out)
DD
	,'description'=><<<DD
Calculer l'inverse de l'entrée chiffrée avec le clé b'netlinks' <br/>
Exemple: <br/>
<ul>
<li> <b>entrée (hex):</b> 3900540006180E532F09184C3A1A0A011D45370408020716000211 
<li> <b>résultat (ascii):</b> We love All Stars Challenge

DD
	,'title'=>"Exemple de chiffrement"
);
?>
<?php
$response = array(	
	'p'=><<<DD
from hashlib import md5, sha384
import random
def oaep(data):
  data = bytes([len(data)])+data
  data+=b'\\0'*(48-len(data))
  r = bytes([random.randrange(256) for i in range(16)])
  X = bytes([i^j for i,j in zip(data,sha384(r).digest())])
  Y = bytes([i^j for i,j in zip(r,md5(X).digest())])
  return X+Y
DD
	,'description'=><<<DD
Essayer de comprendre le principe du code suivant et implementer son inverse afin de donner le résultat de l'encodage de l'entrée<br/>
Exemple: <br/>
<ul>
<li> <b>entrée (hex):</b> 14B1B1044CF57A46F160C541F609F4B75231E5C6D49C50C6865B90B1353132D10DA07E09039F3EE44B678C125D831BA3F80C6967C8C1A3C43C979926F38089D4 
<li> <b>résultat (hex):</b> 061099F35027E0D3

DD
	,'title'=>"Test sur l'encodage"
);
?>
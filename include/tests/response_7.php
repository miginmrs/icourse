<?php
$response = array(	
	'p'=><<<DD
import random

def generateLargePrime(keysize=1024):
	# Return a random prime number of keysize bits in size.
	while True:
		num = random.randrange(2**(keysize-1), 2**(keysize))
		if isPrime(num):
			return num

DD
	,'description'=><<<DD
Ce code permet de trouver en une moyenne de 710 itérations un nombre premier de longueur 1024 bit
Aucune résultat n'est demandée
DD
	,'title'=>"Test probabilistique de primalité"
);
?>
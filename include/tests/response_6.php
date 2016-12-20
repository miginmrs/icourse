<?php
$response = array(	
	'p'=><<<DD
import random, sys

def isPrime(n, k = 7):
	if n < 6:  # assuming n >= 0 in all cases... shortcut small cases here
		return [False, False, True, True, False, True][n]
	elif n & 1 == 0:  # should be faster than n % 2
		return False
	else:
		s, d = 0, n - 1
		while d & 1 == 0:
			s, d = s + 1, d >> 1
		# Use random.randint(2, n-2) for very large numbers
		for a in random.sample(range(2, min(n - 2, sys.maxsize)), min(n - 4, k)):
			x = pow(a, d, n)
			if x != 1 and x + 1 != n:
				for r in range(1, s):
					x = pow(x, 2, n)
					if x == 1:
						return False  # composite for sure
					elif x == n - 1:
						a = 0  # so we know loop didn't continue to end
						break  # could be strong liar, try another a
				if a:
					return False  # composite if we reached end of this loop
		return True  # probably prime if reached end of outer loop

DD
	,'description'=><<<DD
Implimenter ce code et vérifier sa correction<br/>
Exemple: <br/>
<ul>
<li> <b>entrée (hex):</b> c84a13f11d497ac913a364204a0cc02f7b1dda17f76aae12af18667bbf36085b 
<li> <b>résultat (hex):</b> 1
</ul>
1 pour dire premier, 0 pour dire composé

DD
	,'title'=>"Test probabilistique de primalité"
);
?>
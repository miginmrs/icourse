<?php
$response = array(	
	'p1'=><<<DD
def egcd(a, b):
	x,y,ux,vx,uy,vy = a,b,1,0,0,1
	while y != 0:
		q = x//y
		y,x = x%y,y
		ux,uy=uy,ux-q*uy
		vx,vy=vy,vx-q*vy
	return (x,ux,vx)
DD
	,'p2'=><<<DD
n=int('0xceb7ec0dee00e48205cccab0708df86c9ade8b2f85d4f6bd693e0cff2b5302'+
'b04b841de98a1d572e008562c25f377eaa58447db75f4ed3cf9842172fe2df7e726a03'+
'71a3894262d9c12e5b61fe22ae711d74615aedcb3f688517e7f1b9cb7a3ae0cb33bc61'+
'519674b83049709fa3304bac990c30ced1bad5f525e641661fa4e5', 16)
DD
	,'description'=><<<DD
Ceci est l'algorithme d'Euclude étendue. Utiliser le afin de trouver l'inverse de l'entrée modulo n <br/>
Exemple: <br/>
<ul>
<li> <b>entrée (hex):</b> a78738dbc4e07cb2641840e0a0ba62efaf2af3c7e58b675c235074541ad981a0 
<li> <b>résultat (ascii):</b> 980a07b549b92d0e1727508d957dd7dbe35af5297effa2b541678dee3d81586919f5f1431a5617968f25c10aaee66ebc8e83568b8b11e7c1415a9ef503e38b8851723860b4580433ca20edf9968dbdfbabe96d5a2b6a91ac3c2003a4e0d0a0dfbebb1238df802724bc89d0f1a8297f16889f88c951a884b6f217c84f07f756f

DD
	,'title'=>"Calcul d'inverse"
);
?>
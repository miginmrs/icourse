<?php
$response = array(	
	'p1'=><<<DD
def fromint(i):
	if i==0 : return ""
	return chr((i-1)%256)+fromint((i-1)//256)

def toint(str):
	if str=='' : return 0
	return 1+ord(str[0])+256*toint(str[1:])

def ElGamalEnc(msg,g,y,n):
	r=random.randrange(2,n-1)
	enc=0
	val=toint(msg)
	while val!=0:
		enc+=(pow(y,r,n)*(val%n))%n
		enc*=n
		val//=n
	return enc+pow(g,r,n)

DD
	,'p2'=><<<DD
n=int('0xceb7ec0dee00e48205cccab0708df86c9ade8b2f85d4f6bd693e0cff2b5302'+
'b04b841de98a1d572e008562c25f377eaa58447db75f4ed3cf9842172fe2df7e726a03'+
'71a3894262d9c12e5b61fe22ae711d74615aedcb3f688517e7f1b9cb7a3ae0cb33bc61'+
'519674b83049709fa3304bac990c30ced1bad5f525e641661fa4e5', 16)
g=11587895479976600692
x=int('54078059418052052480211090903146784190375336700737285669385062171772575'+
'33951443269521645759008529999356459106430824135523161042795327524295291474019'+
'04839110978261662056584753459905085707009827610855247273313880088141358481604'+
'91335455958900122816627181837712521811112116553800048550914037341787680899935'+
'373392')
y=pow(g,x,n)

DD
	,'description'=><<<DD
Ceci est l'algorithme de chiffrement. Essayer de le comprendre et de trouver son inverse afin de déchiffrer le message donné: <br/>
Exemple: <br/>
<ul>
<li> <b>entrée (hex):</b> 77d67c08a4ea38c6c152b9b3e2efb2214bf1e3f4652a26dff7032696df32ddd13b9be3a75c4a1e965732f60a719b625d5b9842cc04de88f365ee6083af59bd7b26e26f75ab6341a39f00e98a4f5ce3340f4ff7710f18c341f9e7f4e807f6933dcbe12d2fcc417072e0a8fb6366303a17c25a6c67bbaf8e220c55fcede4a8b95fc8cd5ac5bbaa478f3bea8e7aa28407ac70a113c86f7dc352fa4dcc9198d145e0eef307ec54af93e33b3b42ea9c36ab4c756b1f86ea4d6eca5701f43518b01dc58e3bd988f05aa0ef7a55b7f4c391e805285b7c6d07b0c2fdfe4844f2085cd1bd0810d492bdc3136707b6f605c57499a28ff4bac439d890bbcf1e7142f028c51 
<li> <b>résultat (ascii):</b> 68656C6C6F
DD
	,'title'=>"Déchiffrement ElGamal"
);
?>
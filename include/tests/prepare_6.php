<?php
$data = array(
'ec01bc560bc05cd68ab56a1301b6300e218d0f2a36e1591175ec89c2f6ee03eb',
'e3e444a847ca26543546a92993a1a8bd4d70b76f94d634ad381b9c1a9be049b5',
'd91ee20ec10b561fcba081105f14a6da39f2fc70c28f890be9e7932d7f8e9ff2',
'a3e479391ffa7877f262e2b791f640d48ee49dae7a0562d35819e28a5918adf1',
'968fa39f44e154cb6806e23ceba79144e7f86a99470fd262c0eec52bc6ed5b4f',
'cadc91ab1f1528683af34cc44078315560ad04b6a017da567458bd5d5e6f42ea',
'd4321d6fc1ec4bd4a3b25f38531e9910d2efddc5597722960e7fd2e01a9763e5',
'acfb95efd24b99ac86e1c11eb1db8c0f66d55b7fbe2643cbfd61e5efd2b8bc31',
'd3869e32948b888c7b07ec143bcfe8794349757867241608c798efa20a2f0123',
'82802092eb382b25cc7707690a536271f1d4c6fad247b6d15a82d7ad79466b37',
'b06a5d47ab79d16e8f369345998d8dfb123fc7e0a89cd3dce3d831cb5a2d595b',
'e2d135cbc313cb09692da2dba2a84d67f9049036889efd8f8b8a134fb0da2220',
'e05489b494198c0894eff0e3d27d33ae143cb649d8aa111c447ba4b0616a1547',
'ef62f64c3a1039159f29e201d84b6143f996f2ff507dcec0503e4741a29524e0',
'8eebd6fb3af302f49a36e323c6cb8d9446772c672e89ca2495da09e8be420db7',
'bbc9c1ca9461f190e27a4e3a45f5b1551139b78024f5911fc86ce844dfff11fc',
'e9a616dbf66224562feba75d9e73628f24347855afda31575fb94e234b539b7e',
'897bf098e34b8ba46ed95570acff29c876f2407df92cbc20d44723e9d4790b0d',
'de1430be1489d5832e165f7057249dcbfa3be6618a49bc87116a7692af0cf79f',
'febf4d36e7467282f9b7585b7a53432f0da5bb5b3c2bbf983ee9abdde9b9b705',
'a5570b1a70dcda1246d41c37f0a3b173c7d85f5809336510a3f49900237ab8e1',
'9a96759ee276f65fba9023c06d2012ebd67ebc40687d5b724c30f7582aa68387',
'fe17c0f4048dd4503d64b731ad4c3706d2b99ac840f8bd0d1edd8996afdc6dd7',
'b778b8ea31c0eb4af4a3b8b6e968736740e8a056c6c1e8cf2e02d2270208e04d'
);
$result = array('1','1','0','1','1','0','1','0','1','0','0','0','1','0','1','0','0','0','0','1','0','1','1','0');
$_SESSION['data'][$id] = $data[$_SESSION['user']-1];
$_SESSION['result'][$id] = $result[$_SESSION['user']-1];
?>
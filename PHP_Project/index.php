<?php
class Home
{
    public function in($data = [])
    {
        require "view\index.php";
    }
}
$data=[];
if (isset($_POST['gross'])&&$_POST['gross']>0) {
    $data['gross'] = $_POST['gross'];
    $data['bhxh'] = $_POST['gross'] * 0.08;
    $data['bhyt'] = $_POST['gross'] * 0.015;
    $data['bhtn'] = $_POST['gross'] * 0.01;
    $data['tntt'] = $_POST['gross'] * 0.895;
    $data['giambt'] = 11000000;
    $data['giampt'] = $_POST['so_nguoi'] > 0 ? 4400000 * $_POST['so_nguoi'] : 0;
    $data['tnct'] = $data['tntt'] - $data['giambt'] - $data['giampt'];
    if ($data['tnct'] < 0) $data['tnct'] = 0;
    if ($data['tnct'] > 0 && $data['tnct'] <= 5000000) $data['thue'] = $data['tnct'] * 0.05;
    else if ($data['tnct'] <= 10000000) $data['thue'] = $data['tnct'] * 0.1;
    else if ($data['tnct'] <= 18000000) $data['thue'] = $data['tnct'] * 0.15;
    else if ($data['tnct'] <= 32000000) $data['thue'] = $data['tnct'] * 0.2;
    else if ($data['tnct'] <= 80000000) $data['thue'] = $data['tnct'] * 0.3;
    else $data['thue'] = $data['tnct'] * 0.35;
}
$h = new Home();
$h->in($data);

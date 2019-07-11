
<!-- En son derlenmiş ve minimize edilmiş CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Opsiyonel tema -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<!-- En son derlenmiş ve minimize edilmiş JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors',1);
set_time_limit(0);
require __DIR__.'/vendor/autoload.php';
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk=true;
$ig = new \InstagramAPI\Instagram();




    $username = '';
    $password = '';
    try {
        $ig->login($username, $password);

    } catch (Exception $e) {

    }
    if ($_POST) {
        if ($_POST["PK"]) {

            echo '<script>alert("' . $_POST['message'] . $_POST['PK'] . '")</script>';

            //$ig->media->like($_POST["PK"]);


            //$ig->media->comment($_POST["PK"],$_POST["message"]);


        }

    }

try {
    //echo $ig->media->unlike(1903869768432591816);
    //echo $ig->media->like(1903869768432591816);
    //echo $ig->media->edit(1903869768432591816,"Instagram API İle düzenlenmiştir");
    //echo $ig->media->comment(1903869768432591816,"Instagram API İle Gönderildi");
    //echo $ig->discover->getExploreFeed();
    //echo $ig->media->getInfo(1966032395213566833);
    //echo $ig->media->getComments(1903869768432591816);
    $degisken = json_decode($ig->discover->getExploreFeed(),true);
    echo '<form action="" method="post">
    <input class="form-control" type="text" name="message" id="message" /><table class="table"><th>Medya İD</th><th>Medya</th><tr>';

    foreach ($degisken as $a => $key) {
        if ($a=='items') {
            foreach ($key as $b => $key1) {
                foreach ($key1 as $c => $key2) {

                    foreach ($key2 as $d => $key3) {
                        if($d=='pk'){
                            echo '<td>'.$key3.'<input type="submit" value="'.$key3.'" name="PK"/></td>';
                        }
                        $kontroll;
                        if($d=='media_type')
                        {
                            $kontroll=$key3;
                        }
                        if($kontroll==2){
                            foreach ($key3 as $e => $key4) {
                                //echo $e;
                                if($e=='candidates'){


                                    foreach ($key4 as $f => $key5) {

                                        if($f=='url'){
                                            if(strstr($key5,'mp4')){
                                                echo '<td><video width="400" controls>
                                        <source src="'.$key5.'" type="video/mp4">
                                        <source src="'.$key5.'" type="video/ogg">
                                        Your browser does not support HTML5 video.
                                      </video></td>';
                                            }
                                            elseif(strstr($key5,'jpg')){
                                                echo '<img src="'.$key5.'"/>
                                        
                                      ';
                                            }
                                        }

                                    }
                                }

                            }}
                        else if($kontroll==1){foreach ($key3 as $e => $key4) {
                            //echo $e;
                            if($e=='candidates'){


                                foreach ($key4 as $f => $key5) {

                                    if($f=='url'){

                                        foreach($key5 as $g=>$key6)
                                        {

                                            if($g=='url'){
                                                if(strstr($key6,'https')){
                                                    echo '<td><img src="'.$key6.'"style="width:200px;"/></td>';

                                                }
                                            }


                                        }

                                    }

                                }
                            }

                        }}


                    }
                    echo '</tr>';
                }
            }


        }
    }
    echo '</table></form>';
}
catch (\Exception $e){

}
//echo $ig->timeline->getSelfUserFeed();
if($_POST)
{
//$kullaniciara=$_POST['kullanici'];
    echo $ig->discover->search($kullaniciara);


}

//echo $ig->discover->search("3582889132");
//echo $ig->hashtag->search("mehmet");

?>

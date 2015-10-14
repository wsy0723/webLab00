<!DOCTYPE html>
<html>
<head>
    <title>Dictionary</title>
    <meta charset="utf-8" />
    <link href="dictionary.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="header">
    <h1>My Dictionary</h1>
<!-- Ex. 1: File of Dictionary -->
    <p>
        <?
        $filename = file("dictionary.tsv");
        $lines = array();
       
        foreach($filename as $line){
       
            $lines[] = $line;
            
        }
        ?>
        My dictionary has <?= count($lines) ?> total words
        and
        size of <?= (int)(filesize("dictionary.tsv"));?> bytes.
    </p>
</div>
<div class="article">
    <div class="section">
        <h2>Today's words</h2>
<!-- Ex. 2: Today’s Words & Ex 6: Query Parameters -->
        <?php
            function getWordsByNumber($listOfWords, $numberOfWords){
                $resultArray = array();
                shuffle($listOfWords);
                for($i=0;$i<$numberOfWords ; $i++){
                    $resultArray[] = $listOfWords[$i];
                }
                
                return $resultArray;
            }
        ?>
        <ol>
            <?
            
            if(empty($_GET['number_of_words'])){
                $numberOfWords = 3;
            }else{
            $numberOfWords = $_GET['number_of_words'];
        }
            foreach(getWordsByNumber($lines,$numberOfWords) as $liness){?>
            <li><?
            $lineArr = explode("\t",$liness);?>
             <?= $lines[$i]?></li>
            <?}?>
        </ol>
    </div>
    <div class="section">
        <h2>Searching Words</h2>
<!-- Ex. 3: Searching Words & Ex 6: Query Parameters -->
        <?php
            function getWordsByCharacter($listOfWords, $startCharacter){
                $resultArray = array();
                foreach($listOfWords as $wordLine){
                    if($wordLine[0]==$startCharacter){
                        $resultArray[] = $wordLine;
                    }
                
                }
                return $resultArray;
            }
        ?>
        <p>
            <?
            if(empty($_GET['character'])){
                $character = 'C';
            }else{
                $character = $_GET['character'];
            }?>
            Words that started by <strong>'<?=$character?>'</strong> are followings :
        </p>
        <ol>
            
            <?foreach(getWordsByCharacter($lines,$character) as $selectedWord){?>
                <li><?=$selectedWord; ?></li>
            
                <?}?>
        </ol>
    </div>
    <div class="section">
        <h2>List of Words</h2>
        <?
        if(empty($_GET['orderby'])){
            $orderby = '0';
        }else{
            $orderby = $_GET['orderby'];
        }
        ?>
<!-- Ex. 4: List of Words & Ex 6: Query Parameters -->
        <?php
            function getWordsByOrder($listOfWords, $orderby){
                
                if($orderby=='0'){
                    sort($listOfWords);
                }
                elseif($orderby=='1'){
                    rsort($listOfWords);
                }
                $resultArray = $listOfWords;
                return $resultArray;
            }
        ?>
        <p>
            All of words ordered by <strong>alphabetical order</strong> are followings :
        </p>
        <ol>
            <?
            foreach(getWordsByOrder($lines,$orderby) as $orderedline){
               
                ?>
                <li <?if(strlen(explode("\t",$orderedline)[0])>6){

                    echo 'class="long"';
                }?>>
                <?=$orderedline;?>
                </li>
                <?}?>
            
        </ol>
    </div>
    <div class="section">
        <h2>Adding Words</h2>
<!-- Ex. 5: Adding Words & Ex 6: Query Parameters -->
        
        <?
        if(isset($_GET['new_word'])&isset($_GET['meaning'])){
            file_put_contents("dictionary.tsv","\n".( $_GET['new_word'])."\t".($_GET['meaning']),FILE_APPEND);?>
             <?="Adding a word is success!"?>
        <? }else{?>
            <?= "Input word doesn't exist"?>
        <? }?>
        

        
    </div>
</div>
<div id="footer">
    <a href="http://validator.w3.org/check/referer">
        <img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-html.png" alt="Valid HTML5" />
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-css.png" alt="Valid CSS" />
    </a>
</div>
</body>
</html>